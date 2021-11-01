<?php

namespace App;

use App\Lend;
use App\ClassRoom;

use function PHPUnit\Framework\isNull;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{

    use SoftDeletes;

    /**
     * Get all of the lends for the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lends()
    {
        return $this->hasMany(Lend::class);
    }

    /**
     * Get the classRoom that owns the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function classRoom()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function getPhotoAttribute($value)
    {
        // jika kolom photo null, return photo default
        return isNull($value) ? 'no-photo.png' : $value;
    }
}
