<?php

namespace App;

use App\Book;
use Illuminate\Database\Eloquent\Model;

class BookType extends Model
{
    public $timestamps = false;

    /**
     * Get all of the books for the Bookcase
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books()
    {
        return $this->hasMany(Book::class, 'book_type_id', 'id');
    }
}
