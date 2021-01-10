<?php


namespace App\Core\Utils;


use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class HttpUtils
{
    private static $instance;

    public static function get(string $uri): ResponseInterface
    {
        return self::getInstance()->request('GET', $uri);
    }

    private static function getInstance(): Client
    {
        if (self::$instance === null) {
            self::$instance = new Client([
                'base_uri' => config('common.idoctor.url')
            ]);
        }
        return self::$instance;
    }

    public static function post(string $uri, ?array $body): ResponseInterface
    {
        return self::getInstance()->request('POST', $uri, [
                'form_params' => $body
            ]
        );
    }
}
