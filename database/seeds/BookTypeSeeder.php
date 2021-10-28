<?php

use App\BookType;
use Illuminate\Database\Seeder;

class BookTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['name' => 'Fiksi'],
            ['name' => 'Ilmiah'],
        ];

        foreach ($items as $item) {
            BookType::firstOrCreate($item);
        }
    }
}
