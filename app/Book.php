<?php

namespace App;

use App\Bookcase;
use App\BookType;
use App\LendBook;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public $timestamps = false;

    /**
     * Get the bookType that owns the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bookType()
    {
        return $this->belongsTo(BookType::class, 'book_type_id', 'id'); //hubungan dengan table lainnya (ModelName, nama foreign key, nama kolom reference key)
    }

    /**
     * Get the bookcase that owns the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bookcase()
    {
        return $this->belongsTo(Bookcase::class, 'bookcase_id', 'id'); //hubungan dengan table lainnya (ModelName, nama foreign key, nama kolom reference key)
    }

    /**
     * Get all of the lendBooks for the Book
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lendBooks()
    {
        return $this->hasMany(LendBook::class);
    }
}
