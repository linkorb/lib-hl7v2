<?php

require __DIR__.'/../vendor/autoload.php';

use Memio\Memio\Config\Build;
use Memio\Model\Argument;
use Memio\Model\Constant;
use Memio\Model\File;
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

use Hl7v2\Meta\Generator\DataType\ComponentDataTypeGenerator;
use Hl7v2\Meta\Generator\DataType\InheritedDataTypeGenerator;
use Hl7v2\Meta\Generator\DataType\SimpleDataTypeGenerator;
use Hl7v2\Meta\Helper\DataTypeContext;
use Hl7v2\Meta\Helper\DataTypeResolver;
use Hl7v2\Meta\Helper\Util;

$prettyPrinter = Build::prettyPrinter()
    ->addTemplatePath(__DIR__.'/template')
;

$types = Yaml::parse(file_get_contents(__DIR__ . '/data/dataTypes.yml'));

$outDir = __DIR__ . '/../lib/DataType';
$namespace = 'Hl7v2\\DataType';

$context = new DataTypeContext($namespace);
$typeResolver = new DataTypeResolver($context, $types);

foreach ($typeResolver->reseolveTypeDependencyGraph() as $typeId) {
    $typeInfo = $types[$typeId];
    if (array_key_exists('skip_generation', $typeInfo)
        && true === $typeInfo['skip_generation']
    ) {
        echo "Skipping generation of {$typeId}.\n";
        continue;
    }

    $g = null;

    if (isset($typeInfo['extends'])) {
        $g = new InheritedDataTypeGenerator($context, $typeId, $typeInfo);
        $g->setParentDataTypeId($typeInfo['extends']);
    } elseif (array_key_exists('components', $typeInfo)) {
        $g = new ComponentDataTypeGenerator($typeResolver, $context, $typeId, $typeInfo);
    } else {
        $g = new SimpleDataTypeGenerator($context, $typeId, $typeInfo);
    }

    $classDoc = new StructurePhpdoc();
    $classDoc->setDescription(Description::make($g->getDescription()));

    $structure = Object::make($g->getClass())
        ->setPhpdoc($classDoc)
        ->extend(new Object($g->getInheritanceClass()))
    ;

    foreach ($g->getConstants() as $c) {
        list($constName, $constVal) = $c;
        $structure->addConstant(new Constant($constName, $constVal));
    }

    if ($g instanceof ComponentDataTypeGenerator) {
        foreach ($g->getProperties() as list($name, $type)) {
            $propDoc = PropertyPhpdoc::make()
                ->setVariableTag(new VariableTag("\\{$type}"))
            ;
            $property = Property::make($name)->setPhpdoc($propDoc);
            $structure->addProperty($property);
        }
        foreach ($g->getMutators() as list($methodName, $args, $body)) {
            $mutator = Method::make($methodName);
            $mutatorDoc = MethodPhpdoc::make();
            foreach ($args as list($argName, $argType, $argMandatory)) {
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
                ->setBody($body)
            ;
            $structure->addMethod($accessor);
        }
    }

    $file = File::make($outDir . DIRECTORY_SEPARATOR . $context->dataTypeIdToClassName($typeId) . '.php')
        ->setStructure($structure)
    ;
    $generatedCode = $prettyPrinter->generateCode($file);
    file_put_contents($file->getFilename(), $generatedCode);
}
