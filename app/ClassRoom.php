<?php

namespace App;

use App\Student;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    public $timestamps = false;

    /**
     * Get all of the students for the ClassRoom
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
