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
    $response=$psr17Factory->createResponse(200)->withBody($psr17Factory->createStream(date('Y年m月d日 H時i分s秒') ));
}

// echo (string)$response->getBody();
//emitterを使った描き方↓
(new \Laminas\HttpHandlerRunner\Emitter\SapiEmitter())->emit($response);
/**
 * laminas-httphandlerrunner
 * はEmitting PSR-7 responsesするもの
 * emit、そのままの意味通りだと思われる。
 */