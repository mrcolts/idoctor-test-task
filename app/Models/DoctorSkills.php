<?php

namespace App\Models;

use App\Core\Traits\Uuid;
use Illuminate\Database\Eloquent\Relations\Pivot;

class DoctorSkills extends Pivot
{
    use Uuid;

    public function doctors()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function skills()
    {
        return $this->belongsTo(Skill::class);
    }
}
