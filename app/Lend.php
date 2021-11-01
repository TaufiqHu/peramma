<?php

namespace App;

use App\Student;
use App\LendBook;
use Illuminate\Database\Eloquent\Model;

class Lend extends Model
{
    /**
     * Get the student that owns the Lend
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Get all of the lendBooks for the Lend
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lendBooks()
    {
        return $this->hasMany(LendBook::class);
    }
}
