<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class SkillFilter extends ModelFilter
{
    public function name(string $name)
    {
        return $this->where('name', 'LIKE', "%$name%");
    }
}
