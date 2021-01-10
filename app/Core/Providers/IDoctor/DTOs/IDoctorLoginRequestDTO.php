<?php


namespace App\Core\Providers\IDoctor\DTOs;


class IDoctorLoginRequestDTO
{
    private string $grand_type;

    private string $client_id;

    private string $client_secret;

    private string $scope;

    private string $username;

    private string $password;

    /**
     * @return string
     */
    public function getGrandType(): string
    {
        return $this->grand_type;
    }

    /**
     * @param string $grand_type
     * @return IDoctorLoginRequestDTO
     */
    public function setGrandType(string $grand_type): IDoctorLoginRequestDTO
    {
        $this->grand_type = $grand_type;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->client_id;
    }

    /**
     * @param string $client_id
     * @return IDoctorLoginRequestDTO
     */
    public function setClientId(string $client_id): IDoctorLoginRequestDTO
    {
        $this->client_id = $client_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientSecret(): string
    {
        return $this->client_secret;
    }

    /**
     * @param string $client_secret
     * @return IDoctorLoginRequestDTO
     */
    public function setClientSecret(string $client_secret): IDoctorLoginRequestDTO
    {
        $this->client_secret = $client_secret;
        return $this;
    }

    /**
     * @return string
     */
    public function getScope(): string
    {
        return $this->scope;
    }

    /**
     * @param string $scope
     * @return IDoctorLoginRequestDTO
     */
    public function setScope(string $scope): IDoctorLoginRequestDTO
    {
        $this->scope = $scope;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return IDoctorLoginRequestDTO
     */
    public function setUsername(string $username): IDoctorLoginRequestDTO
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return IDoctorLoginRequestDTO
     */
    public function setPassword(string $password): IDoctorLoginRequestDTO
    {
        $this->password = $password;
        return $this;
    }

}
