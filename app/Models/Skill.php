<?php

namespace App\Models;

use App\Core\Traits\Uuid;
use App\ModelFilters\SkillFilter;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Skill
 * @package App\Models
 * @mixin Builder
 */
class Skill extends Model
{
    use Uuid, Filterable;

    protected $fillable = [
        'name'
    ];

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class,
            'doctor_skills', 'skill_id', 'doctor_id')
            ->using(DoctorSkills::class)
            ->withTimestamps();
    }

    public function modelFilter()
    {
        return $this->provideFilter(SkillFilter::class);
    }

}
