<?php

use PhpCsFixer\Fixer\ArrayNotation\ArraySyntaxFixer;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\EasyCodingStandard\ValueObject\Option;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ContainerConfigurator $containerConfigurator): void {
    $parameters = $containerConfigurator->parameters();
    $parameters->set(Option::PATHS, [
        __DIR__ . '/app',
        __DIR__ . '/database',
        __DIR__ . '/tests',
    ]);

    // A. standalone rule
    $services = $containerConfigurator->services();
    $services->set(ArraySyntaxFixer::class)
        ->call('configure', [[
            'syntax' => 'short',
        ]]);

    // B. full sets
    $parameters = $containerConfigurator->parameters();
    $parameters->set(Option::SETS, [
        SetList::CLEAN_CODE,
        SetList::COMMENTS,
        SetList::COMMON,
        SetList::CONTROL_STRUCTURES,
        SetList::DOCBLOCK,
        SetList::NAMESPACES,
        SetList::PSR_12,
        SetList::SPACES,
        SetList::STRICT,
    ]);
};

