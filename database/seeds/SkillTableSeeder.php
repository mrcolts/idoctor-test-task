<?php

use App\Core\Facades\IDoctorFacade;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillTableSeeder extends Seeder
{
    private IDoctorFacade $facade;

    public function __construct(IDoctorFacade $facade)
    {
        $this->facade = $facade;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = $this->facade->getAllSkills();

        foreach ($skills as $skill) {
            Skill::create([
                'name' => $skill['name'],
            ]);
        }
    }
}
