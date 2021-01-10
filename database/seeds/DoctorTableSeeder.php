<?php

use App\Core\Facades\IDoctorFacade;
use App\Models\Doctor;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class DoctorTableSeeder extends Seeder
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
        $doctors = $this->facade->getDoctors();

        foreach ($doctors as $doctor) {
            $doc = Doctor::create([
                'first_name' => $doctor['firstname'],
                'last_name' => $doctor['lastname'],
                'city' => $doctor['city']['name'],
                'works_since_year' => $doctor['works_since_year'],
            ]);

            $doctor_skill_names = array_map(static fn($item) => $item['name'], $doctor['skills']);

            if (!empty($doctor_skill_names)) {
                $doctor_skills = Skill::whereIn('name', $doctor_skill_names)->get();
                $doc->skills()->attach($doctor_skills);
            }
        }
    }
}
