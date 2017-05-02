<?php

namespace Hl7v2\Meta;

# TODO OBX.5 variable type and length field

require __DIR__.'/../vendor/autoload.php';

use Memio\Memio\Config\Build;
use Memio\Model\Argument;
use Memio\Model\File;
use Memio\Model\FullyQualifiedName;
use Memio\Model\Method;
use Memio\Model\Object;
use Memio\Model\Phpdoc\Description;
use Memio\Model\Phpdoc\MethodPhpdoc;
use Memio\Model\Phpdoc\ParameterTag;
use Memio\Model\Phpdoc\PropertyPhpdoc;
use Memio\Model\Phpdoc\ReturnTag;
use Memio\Model\Phpdoc\StructurePhpdoc;
use Memio\Model\Phpdoc\VariableTag;
use Memio\Model\Property;
use Symfony\Component\Yaml\Yaml;

use Hl7v2\Meta\Generator\Segment\SegmentGenerator;
use Hl7v2\Meta\Helper\DataTypeContext;
use Hl7v2\Meta\Helper\DataTypeResolver;
use Hl7v2\Meta\Helper\SegmentContext;
use Hl7v2\Meta\Helper\SegmentField;
use Hl7v2\Meta\Helper\Util;

$prettyPrinter = Build::prettyPrinter()
    ->addTemplatePath(__DIR__.'/template')
;

$segments = Yaml::parse(file_get_contents(__DIR__ . '/data/segments.yml'));
$dataTypes = Yaml::parse(file_get_contents(__DIR__ . '/data/dataTypes.yml'));

$outDir = __DIR__ . '/../lib/Segment';

$dataTypeContext = new DataTypeContext('Hl7v2\\DataType');
$segmentContext = new SegmentContext('Hl7v2\\Segment');
$typeResolver = new DataTypeResolver($dataTypeContext, $dataTypes);
#dump($typeResolver->getSubcomponentInfo('XPN')); die();


# Report missing DataType
$t = [];
foreach ($segments as $name => $attr) {
    foreach ($attr['fields'] as $field) {
        if (!isset($field['type']) || empty($field['type'])) {
            continue;
        }
        $t[$field['type']] = true;
    }
}
$missingTypes = [];
foreach (array_keys($t) as $id) {
    if (!class_exists($dataTypeContext->dataTypeIdToClass($id))) {
        $missingTypes[] = $id;
        continue;
    }
}
if (sizeof($missingTypes)) {
    echo "Missing types: " . implode(", ", $missingTypes) . ".\n";
    exit();
}


foreach ($segments as $segmentId => $segmentAttr) {
    if ($segmentAttr === null
        || (array_key_exists('skip_generation', $segmentAttr)
        && true === $segmentAttr['skip_generation'])
    ) {
        echo "Skipping generation of {$segmentId}.\n";
        continue;
    }

    $n = 0;
    $g = new SegmentGenerator(
        $segmentContext,
        $dataTypeContext,
        $segmentId,
        $segmentAttr,
        array_map(
            function ($x) use ($segmentId, &$n, $typeResolver) {
                ++$n;
                return new SegmentField("{$segmentId}.{$n}", $n, $typeResolver, $x);
            },
            $segmentAttr['fields']
        )
    );

    $classDoc = new StructurePhpdoc();
    $classDoc->setDescription(Description::make($g->getDescription()));

    $structure = Object::make($g->getClass())
        ->setPhpdoc($classDoc)
        ->extend(new Object($g->getInheritanceClass()))
    ;

    foreach ($g->getProperties() as list($pname, $ptype, $pdefault)) {
        $property = Property::make($pname);
        $structure->addProperty($property);
        if (false === $ptype) {
            continue;
        }
        $property->setPhpdoc(PropertyPhpdoc::make()->setVariableTag(new VariableTag($ptype)));
        if ($pdefault) {
            $property->setDefaultValue($pdefault);
        }
    }
    foreach ($g->getMutators() as list($methodName, $args, $body)) {
        $mutator = Method::make($methodName);
        $mutatorDoc = MethodPhpdoc::make();
        foreach ($args as list($argType, $argName, $argMandatory)) {
            $argument = new Argument($argType, $argName);
            if (!$argMandatory) {
                $argument->setDefaultValue('null');
            }
            $mutator->addArgument($argument);
            $mutatorDoc->addParameterTag(new ParameterTag($argType, $argName));
        }
        $mutator
            ->setPhpdoc($mutatorDoc)
            ->setBody(implode("\n", Util::indentBodyParts($body)))
        ;
        $structure->addMethod($mutator);
    }
    foreach ($g->getAccessors() as list($methodName, $returnType, $body)) {
        $accessor = Method::make($methodName)
            ->setPhpdoc(
                MethodPhpdoc::make()->setReturnTag(ReturnTag::make("\\{$returnType}"))
            )
            ->setBody(implode("\n", Util::indentBodyParts($body)))
        ;
        $structure->addMethod($accessor);
    }

    $fdgMethod = Method::make('fromDatagram')
        ->addArgument(new Argument('\\Hl7v2\\Encoding\\Datagram', 'data'))
        ->addArgument(new Argument('\\Hl7v2\\Encoding\\Codec', 'codec'))
        ->setBody(implode("\n", Util::indentBodyParts($g->getFromDatagramBody())))
    ;
    $structure->addMethod($fdgMethod);

    $file = File::make($outDir . DIRECTORY_SEPARATOR . $segmentContext->segmentIdToClassName($segmentId) . '.php')
        ->setStructure($structure)
        ->addFullyQualifiedName(new FullyQualifiedName('\\Hl7v2\\Encoding\\Datagram'))
        ->addFullyQualifiedName(new FullyQualifiedName('\\Hl7v2\\Encoding\\Codec'))
        ->addFullyQualifiedName(new FullyQualifiedName('\\Hl7v2\\Exception\\SegmentError'))
    ;

    $generatedCode = $prettyPrinter->generateCode($file);
    file_put_contents($file->getFilename(), $generatedCode);
}
