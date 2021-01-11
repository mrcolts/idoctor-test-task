<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class DoctorFilter extends ModelFilter
{
    public function name(string $name)
    {
        return $this->where(function ($query) use ($name) {
            return $query->where('first_name', 'LIKE', "%$name%")
                ->orWhere('last_name', 'LIKE', "%$name%");
        });
    }

    public function firstName(string $first_name)
    {
        return $this->where(function ($query) use ($first_name) {
            return $query->where('first_name', 'LIKE', "%$first_name%");
        });
    }

    public function lastName(string $last_name)
    {
        return $this->where(function ($query) use ($last_name) {
            return $query->where('last_name', 'LIKE', "%$last_name%");
        });
    }

    public function city(string $city)
    {
        return $this->where('city', 'LIKE', "%$city%");
    }

    public function workSinceYear(string $work_since_year)
    {
        return $this->where('works_since_year', $work_since_year);
    }

    public function skill(string $skills)
    {
        return $this->related('skills', function ($query) use ($skills) {
            return $query->where('name', 'LIKE', "%$skills%");
        });
    }
}
