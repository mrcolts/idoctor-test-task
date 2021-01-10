<?php


namespace App\Core\Providers\IDoctor\DTOs;


class IDoctorLoginResponseDTO
{
    private string $token_type;

    private string $expires_in;

    private string $access_token;

    private string $refresh_token;

    /**
     * @return string
     */
    public function getTokenType(): string
    {
        return $this->token_type;
    }

    /**
     * @param string $token_type
     * @return IDoctorLoginResponseDTO
     */
    public function setTokenType(string $token_type): IDoctorLoginResponseDTO
    {
        $this->token_type = $token_type;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpiresIn(): string
    {
        return $this->expires_in;
    }

    /**
     * @param string $expires_in
     * @return IDoctorLoginResponseDTO
     */
    public function setExpiresIn(string $expires_in): IDoctorLoginResponseDTO
    {
        $this->expires_in = $expires_in;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->access_token;
    }

    /**
     * @param string $access_token
     * @return IDoctorLoginResponseDTO
     */
    public function setAccessToken(string $access_token): IDoctorLoginResponseDTO
    {
        $this->access_token = $access_token;
        return $this;
    }

    /**
     * @return string
     */
    public function getRefreshToken(): string
    {
        return $this->refresh_token;
    }

    /**
     * @param string $refresh_token
     * @return IDoctorLoginResponseDTO
     */
    public function setRefreshToken(string $refresh_token): IDoctorLoginResponseDTO
    {
        $this->refresh_token = $refresh_token;
        return $this;
    }


}
