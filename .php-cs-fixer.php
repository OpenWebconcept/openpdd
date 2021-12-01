<?php

$finder = Symfony\Component\Finder\Finder::create()
    ->notPath('htdocs/wp')
    ->notPath('node_modules')
    ->notPath('storage')
    ->notPath('vendor')
    ->in(__DIR__)
    ->in(__DIR__ .'/config')
    ->in(__DIR__.'/htdocs/wp-content/themes')
    ->name('*.php')
    ->name('_ide_helper')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return (new PhpCsFixer\Config)
    ->setRules([
        '@PSR2'                  => true,
        'array_syntax'           => [
            'syntax' => 'short',
        ],
        'ordered_imports'        => [
            'sort_algorithm' => 'alpha',
        ],
        'no_unused_imports'      => true,
        'binary_operator_spaces' => [
            'default' => 'single_space',
            'operators' => [
                '=>' => null,
                '|' => 'no_space',
            ]
        ],
        'full_opening_tag'       => true,
        'yoda_style'             => [
            'always_move_variable' => true,
            'equal'                => true,
            'identical'            => true,
            'less_and_greater'     => true,
        ],
        'declare_strict_types' => true
    ])
    ->setRiskyAllowed(true)
    ->setFinder($finder);
