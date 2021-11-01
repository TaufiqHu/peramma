<?php

namespace App;

use App\Book;
use App\Lend;
use Illuminate\Database\Eloquent\Model;

class LendBook extends Model
{
    /**
     * Get the book that owns the LendBook
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    /**
     * Get the lend that owns the LendBook
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lend()
    {
        return $this->belongsTo(Lend::class);
    }
}
