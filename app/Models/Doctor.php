<?php

namespace App\Models;

use App\Core\Traits\Uuid;
use App\ModelFilters\DoctorFilter;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Doctor
 *
 * @mixin Builder
 */
class Doctor extends Model
{
    use Uuid, Filterable;

    protected $fillable = [
        'first_name',
        'last_name',
        'city',
        'works_since_year',
    ];

    protected $with = [
        'skills'
    ];

    public function skills()
    {
        return $this->belongsToMany(Skill::class,
            'doctor_skills', 'doctor_id', 'skill_id')
            ->using(DoctorSkills::class)
            ->withTimestamps();
    }

    public function modelFilter()
    {
        return $this->provideFilter(DoctorFilter::class);
    }

}
