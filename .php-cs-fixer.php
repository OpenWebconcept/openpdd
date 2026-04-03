<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
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


return \Yard\PhpCsFixerRules\Config::create($finder);
