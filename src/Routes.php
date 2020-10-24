<?php declare(strict_types = 1);

return [
    ['GET', '/', ['NoFramework\Controllers\Homepage', 'show']],
    ['GET', '/{slug}', ['NoFramework\Controllers\Page', 'show']]
];
