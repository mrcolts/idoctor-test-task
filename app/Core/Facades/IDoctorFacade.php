<?php


namespace App\Core\Facades;


use App\Core\Providers\IDoctor\DTOs\IDoctorLoginRequestDTO;
use App\Core\Providers\IDoctor\DTOs\IDoctorLoginResponseDTO;
use App\Core\Providers\IDoctor\IDoctorProvider;

class IDoctorFacade
{
    private IDoctorProvider $provider;

    public function __construct(IDoctorProvider $provider)
    {
        $this->provider = $provider;
    }

    public function getDoctors(): array
    {
        $this->provider->setAccessToken($this->auth()->getAccessToken());

        $all_doctors = [];
        foreach (range(1, 5) as $page) {
            $raw_skills = $this->provider->getDoctors($page);
            $skills = $raw_skills['data'];
            foreach ($skills as $skill) {
                $all_doctors[] = $skill;
            }
        }

        return $all_doctors;
    }

    private function auth(): IDoctorLoginResponseDTO
    {
        $auth_request_data = (new IDoctorLoginRequestDTO())
            ->setGrandType(config('common.idoctor.oauth.grand_type'))
            ->setClientId(config('common.idoctor.oauth.client_id'))
            ->setClientSecret(config('common.idoctor.oauth.client_secret'))
            ->setScope(config('common.idoctor.oauth.scope'))
            ->setUsername(config('common.idoctor.oauth.username'))
            ->setPassword(config('common.idoctor.oauth.password'));
        return $this->provider->login($auth_request_data);
    }

    public function getAllSkills(): array
    {
        $this->provider->setAccessToken($this->auth()->getAccessToken());

        $raw_skills = $this->provider->getSkills();
        $last_page = $raw_skills['meta']['last_page'];

        $all_skills = [];
        foreach (range(1, $last_page) as $page) {
            $raw_skills = $this->provider->getSkills($page);
            $skills = $raw_skills['data'];
            foreach ($skills as $skill) {
                $all_skills[] = $skill;
            }
        }

        return $all_skills;
    }
}
