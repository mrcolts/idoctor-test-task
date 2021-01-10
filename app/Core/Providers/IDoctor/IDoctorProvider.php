<?php


namespace App\Core\Providers\IDoctor;


use App\Core\HttpClient\HttpClient;
use App\Core\Providers\IDoctor\DTOs\IDoctorLoginRequestDTO;
use App\Core\Providers\IDoctor\DTOs\IDoctorLoginResponseDTO;

class IDoctorProvider
{
    private HttpClient $http_client;

    public function __construct(HttpClient $http_client)
    {
        $this->http_client = $http_client;
        $http_client->setBaseUrl(config('common.idoctor.url'));
    }

    public function setAccessToken(string $access_token)
    {
        $this->http_client->setAccessToken($access_token);
    }

    public function login(IDoctorLoginRequestDTO $dto): ?IDoctorLoginResponseDTO
    {
        $response = $this->http_client->post('oauth/token', [
            'form_params' => [
                'grant_type' => $dto->getGrandType(),
                'client_id' => $dto->getClientId(),
                'client_secret' => $dto->getClientSecret(),
                'scope' => $dto->getScope(),
                'username' => $dto->getUsername(),
                'password' => $dto->getPassword()
            ]
        ]);

        if ($response->getStatusCode() === 200) {
            $response = $response->getContentAsArray();

            return (new IDoctorLoginResponseDTO())
                ->setTokenType($response['token_type'])
                ->setExpiresIn($response['expires_in'])
                ->setAccessToken($response['access_token'])
                ->setRefreshToken($response['refresh_token']);
        }

        return null;
    }

    public function getDoctors(int $page = 1)
    {
        $response = $this->http_client->get('api/doctors', [
            'query' => [
                'page' => $page
            ]
        ]);

        if ($response->getStatusCode() === 200) {
            return $response->getContentAsArray();
        }

        return null;
    }

    public function getSkills(int $page = 1)
    {
        $response = $this->http_client->get('api/skills', [
            'query' => [
                'page' => $page
            ]
        ]);

        if ($response->getStatusCode() === 200) {
            return $response->getContentAsArray();
        }

        return null;
    }
}
