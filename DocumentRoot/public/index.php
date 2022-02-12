<?php

require __DIR__ . '/../vendor/autoload.php';

$psr17Factory = new \Nyholm\Psr7\Factory\Psr17Factory();

//エラー時にかっこいい表示をする
error_reporting(-1);
$whoops = new \Whoops\Run();
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
$whoops->register();

//意図的なエラー
// echo $aa;

$creator = new \Nyholm\Psr7Server\ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$serverRequest = $creator->fromGlobals();

$path=$serverRequest->getUri()->getPath();

// dd($path);

if ($path==='/now') {
    echo date('Y年m月d日 H時i分s秒');
}
