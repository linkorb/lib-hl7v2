<?php

namespace Hl7v2\Meta;

require __DIR__.'/../vendor/autoload.php';

use Memio\Memio\Config\Build;
use Memio\Model\Argument;
use Memio\Model\Constant;
use Memio\Model\File;
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
use Symfony\Component\Yaml\Yaml;
use Twig_Environment;
use Twig_Loader_Filesystem;

use Hl7v2\Meta\Generator\DataType\ComponentDataTypeGenerator;
use Hl7v2\Meta\Generator\DataType\InheritedDataTypeGenerator;
use Hl7v2\Meta\Generator\DataType\SimpleDataTypeGenerator;
use Hl7v2\Meta\Helper\DataTypeContext;
use Hl7v2\Meta\Helper\DataTypeResolver;
use Hl7v2\Meta\Helper\Util;

$prettyPrinter = Build::prettyPrinter()
    ->addTemplatePath(__DIR__.'/template')
;
$twig = new Twig_Environment(new Twig_Loader_Filesystem(__DIR__.'/template'));

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

    $g->setTemplating($twig);

    $classDoc = new StructurePhpdoc();
    $classDoc->setDescription(new Description($g->getDescription()));

    $structure = (new Objekt($g->getClass()))
        ->setPhpdoc($classDoc)
        ->extend(new Objekt($g->getInheritanceClass()))
    ;

    foreach ($g->getConstants() as $c) {
        list($constName, $constVal) = $c;
        $structure->addConstant(new Constant($constName, $constVal));
    }

    if ($g instanceof ComponentDataTypeGenerator) {
        foreach ($g->getProperties() as list($name, $type)) {
            $propDoc = (new PropertyPhpdoc())
                ->setVariableTag(new VariableTag("\\{$type}"))
            ;
            $property = (new Property($name))->setPhpdoc($propDoc);
            $structure->addProperty($property);
        }
        foreach ($g->getMutators() as list($methodName, $args, $body)) {
            $mutator = new Method($methodName);
            $mutatorDoc = new MethodPhpdoc;
            foreach ($args as list($argName, $argType, $argMandatory)) {
                $argument = new Argument($argType, $argName);
                $argument->setDefaultValue('null');
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
                ->setBody($body)
            ;
            $structure->addMethod($accessor);
        }
    }

    $structure->addMethod(
        $g->getMethodToString(new Method('__toString'), new MethodPhpdoc)
    );

    $file = (new File($outDir . DIRECTORY_SEPARATOR . $context->dataTypeIdToClassName($typeId) . '.php'))
        ->setStructure($structure)
    ;
    $generatedCode = $prettyPrinter->generateCode($file);
    file_put_contents($file->getFilename(), $generatedCode);
}
