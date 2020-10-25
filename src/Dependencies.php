<?php declare(strict_types = 1);

$injector = new \Auryn\Injector;

$injector->alias('Http\Request', 'Http\HttpRequest');
$injector->share('Http\HttpRequest');
$injector->define('Http\HttpRequest', [
    ':get' => $_GET,
    ':post' => $_POST,
    ':cookies' => $_COOKIE,
    ':files' => $_FILES,
    ':server' => $_SERVER,
]);

$injector->alias('Http\Response', 'Http\HttpResponse');
$injector->share('Http\HttpResponse');

$injector->alias('NoFramework\Template\Renderer', 'NoFramework\Template\TwigRenderer');
$injector->alias('NoFramework\Template\FrontendRenderer', 'NoFramework\Template\FrontendTwigRenderer');

$injector->define('Mustache_Engine', [
    ':options' => [
        'loader' => new Mustache_Loader_FilesystemLoader(dirname(__DIR__) . '/templates', [
            'extension' => '.html',
        ]),
    ],
]);

$injector->define('NoFramework\Page\FilePageReader', [
    ':pageFolder' => __DIR__ . '/../pages',
]);

$injector->alias('NoFramework\Page\PageReader', 'NoFramework\Page\FilePageReader');
$injector->share('NoFramework\Page\FilePageReader');

$injector->delegate('Twig\Environment', function () use ($injector) {
    $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__) . '/templates');
    $twig = new \Twig\Environment($loader);
    return $twig;
});

$injector->alias('NoFramework\Menu\MenuReader', 'NoFramework\Menu\ArrayMenuReader');
$injector->share('NoFramework\Menu\ArrayMenuReader');

return $injector;
