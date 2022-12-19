<?php declare(strict_types=1);

$id = $id ?? 79;

$blocks = parse_blocks('<!-- wp:navigation {"ref":79,"layout":{"type":"flex","orientation":"vertical"}} /-->');
foreach ($blocks as $block) {
    echo render_block($block);
}
