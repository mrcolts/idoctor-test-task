<?php


namespace App\Core\HttpClient;


use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class HttpClient
{
    private ?string $base_url;

    private ?string $access_token = '';

    final public function get(string $uri, array $options = []): HttpClientDTO
    {
        $response = $this->getClient()->request('GET', $uri, $options);
//        dd($response->getBody()->getContents());

        return $this->formatResponse($response);
    }

    private function getClient(): Client
    {
        return new Client([
            'base_uri' => $this->base_url,
            'headers' => [
                'Authorization' => "Bearer $this->access_token"
            ]
        ]);
    }

    private function formatResponse(ResponseInterface $response): HttpClientDTO
    {
        return (new HttpClientDTO())
            ->setStatusCode($response->getStatusCode())
            ->setHeaders($response->getHeaders())
            ->setContent($response->getBody()->getContents());
    }

    final public function post(string $uri, array $options = []): HttpClientDTO
    {
        $response = $this->getClient()->request('POST', $uri, $options);

        return $this->formatResponse($response);
    }

    /**
     * @param string|null $access_token
     */
    final public function setAccessToken(?string $access_token): void
    {
        $this->access_token = $access_token;
    }

    /**
     * @param string|null $base_url
     */
    final public function setBaseUrl(?string $base_url): void
    {
        $this->base_url = $base_url;
    }
}
