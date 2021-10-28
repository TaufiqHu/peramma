<?php

use App\Book;
use App\Bookcase;
use App\BookType;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bookTypes = BookType::all();
        $nBookType = count($bookTypes);
        $bookcases = Bookcase::all();
        $nBookcase = count($bookcases);

        factory(Book::class, 20)->make()->each(function ($book) use ($bookcases, $bookTypes, $nBookType, $nBookcase) {
            $book->book_type_id = $bookTypes[rand(0, $nBookType - 1)]->id;
            $book->bookcase_id = $bookcases[rand(0, $nBookcase - 1)]->id;
            $book->save();
        });
    }
}
