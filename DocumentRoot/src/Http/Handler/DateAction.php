<?php
namespace usuyuki\MyPsr\Http\Handler;


use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;


/**
 * 宣言したインターフェイス(interface hoge)を実装したクラスがDataActions 
 * implementsの後にあるのがインターフェイスで、それをDataActionというクラスで実装している
 * この書き方のクラスではRequestHandlerInterfaceのメソッドを全部実装しないとエラー出す
 */
class DataAction implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface{
        $psr17Factory=new \Nyholm\Psr7\Factory\Psr17Factory();
        $response=$psr17Factory->createResponse(200)->withBody($psr17Factory->createStream(date('Y年m月d日 H時i分s秒')));
        return $response;
    }

}