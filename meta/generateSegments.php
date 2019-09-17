<?php

namespace Hl7v2\Meta;

require __DIR__.'/../vendor/autoload.php';

use Memio\Memio\Config\Build;
use Memio\Model\Argument;
use Memio\Model\File;
use Memio\Model\FullyQualifiedName;
use Memio\Model\Method;
use Memio\Model\Objekt;
use Memio\Model\Phpdoc\Description;
use Memio\Model\Phpdoc\MethodPhpdoc;
use Memio\Model\Phpdoc\ParameterTag;
use Memio\Model\Phpdoc\PropertyPhpdoc;
use Memio\Model\Phpdoc\ReturnTag;
use Memio\Model\Phpdoc\StructurePhpdoc;
use Memio\Model\Phpdoc\VariableTag;
use Memio\Model\Property;
use Symfony\Component\Finder\Finder;
use Symfony\Component\Yaml\Yaml;
use Twig_Environment;
use Twig_Loader_Filesystem;

use Hl7v2\Meta\Generator\Segment\SegmentGenerator;
use Hl7v2\Meta\Helper\DataTypeContext;
use Hl7v2\Meta\Helper\DataTypeResolver;
use Hl7v2\Meta\Helper\SegmentContext;
use Hl7v2\Meta\Helper\SegmentField;
use Hl7v2\Meta\Helper\Util;

$prettyPrinter = Build::prettyPrinter()
    ->addTemplatePath(__DIR__.'/template')
;
$twig = new Twig_Environment(new Twig_Loader_Filesystem(__DIR__.'/template'));

// Process in turn each version of HL7
$finder = new Finder();
foreach ($finder->directories()->in(__DIR__ . '/data')->depth('== 0') as $versionedDir) {
    $segments = Yaml::parse(file_get_contents($versionedDir->getPathname() . '/segments.yml'));
    $dataTypes = Yaml::parse(file_get_contents($versionedDir->getPathname() . '/dataTypes.yml'));
    $subNamespace = 'V' . str_replace('.', '', $versionedDir->getBasename());
    $outDir = __DIR__ . '/../lib/Segment/' . $subNamespace;
    Util::mkOutDir($outDir);
    $dataTypeContext = new DataTypeContext('Hl7v2\\DataType', $subNamespace);
    $segmentContext = new SegmentContext('Hl7v2\\Segment', $subNamespace);
    $typeResolver = new DataTypeResolver($dataTypeContext, $dataTypes);

    # Report missing DataType
    $t = [];
    foreach ($segments as $name => $attr) {
        foreach ($attr['fields'] as $field) {
            if (!isset($field['type']) || empty($field['type'])) {
                continue;
            }
            if ($field['type'] === 'variable') {
                if (!isset($field['types']) || !is_array($field['types'])) {
                    continue;
                }
                foreach ($field['types'] as $typ) {
                    $t[$typ['type']] = true;
                }
            } else {
                $t[$field['type']] = true;
            }
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
        $g->setTemplating($twig);

        $classDoc = new StructurePhpdoc();
        $classDoc->setDescription(new Description($g->getDescription()));

        $structure = (new Objekt($g->getClass()))
            ->setPhpdoc($classDoc)
            ->extend(new Objekt($g->getInheritanceClass()))
        ;

        foreach ($g->getProperties() as list($pname, $ptype, $pdefault)) {
            $property = new Property($pname);
            $structure->addProperty($property);
            if (false === $ptype) {
                continue;
            }
            $property->setPhpdoc((new PropertyPhpdoc)->setVariableTag(new VariableTag($ptype)));
            if ($pdefault) {
                $property->setDefaultValue($pdefault);
            }
        }
        foreach ($g->getMutators() as list($methodName, $args, $body)) {
            $mutator = new Method($methodName);
            $mutatorDoc = new MethodPhpdoc();
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
            $accessor = (new Method($methodName))
                ->setPhpdoc(
                    (new MethodPhpdoc)->setReturnTag(new ReturnTag("\\{$returnType}"))
                )
                ->setBody(implode("\n", Util::indentBodyParts($body)))
            ;
            $structure->addMethod($accessor);
        }

        $fdgMethod = (new Method('fromDatagram'))
            ->addArgument(new Argument('\\Hl7v2\\Encoding\\Datagram', 'datagram'))
            ->addArgument(new Argument('\\Hl7v2\\Encoding\\Codec', 'codec'))
            ->setBody(implode("\n", Util::indentBodyParts($g->getFromDatagramBody())))
        ;
        $structure->addMethod($fdgMethod);

        $structure->addMethod(
            $g->getMethodToString(
                new Method('__toString'),
                new MethodPhpdoc(),
                $segmentId
            )
        );

        $file = (new File($outDir . DIRECTORY_SEPARATOR . $segmentContext->segmentIdToClassName($segmentId) . '.php'))
            ->setStructure($structure)
            ->addFullyQualifiedName(new FullyQualifiedName('\\Hl7v2\\Encoding\\Datagram'))
            ->addFullyQualifiedName(new FullyQualifiedName('\\Hl7v2\\Encoding\\Codec'))
            ->addFullyQualifiedName(new FullyQualifiedName('\\Hl7v2\\Exception\\SegmentError'))
        ;
        Util::insertUseStatements($file);

        $generatedCode = $prettyPrinter->generateCode($file);
        file_put_contents($file->getFilename(), $generatedCode);
    }
}
