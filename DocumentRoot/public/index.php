<?php

require __DIR__ . '/../vendor/autoload.php';


//エラー時にかっこいい表示をする
error_reporting(E_ALL);
$whoops = new \Whoops\Run();
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
$whoops->register();

//意図的なエラー
// echo $aa;

$psr17Factory = new \Nyholm\Psr7\Factory\Psr17Factory();

$creator = new \Nyholm\Psr7Server\ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory  // StreamFactory
);

$serverRequest = $creator->fromGlobals();

$path=$serverRequest->getUri()->getPath();

// dd($path);

use Psr\Http\Server\RequestHamdlerInterface;

if ($path==='/') {
    // $response=$psr17Factory->createResponse(200)->withBody($psr17Factory->createStream(date('Y年m月d日 H時i分s秒') ));
    $handler=new \usuyuki\MyPsr\Http\Handler\DateAction();
    $response=$handler->handle($serverRequest);
}

// echo (string)$response->getBody();
//emitterを使った描き方↓
(new \Laminas\HttpHandlerRunner\Emitter\SapiEmitter())->emit($response);
/**
 * laminas-httphandlerrunner
 * はEmitting PSR-7 responsesするもの
 * emit、そのままの意味通りだと思われる。
 */