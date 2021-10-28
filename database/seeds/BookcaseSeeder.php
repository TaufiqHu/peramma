<?php

use App\Bookcase;
use Illuminate\Database\Seeder;

class BookcaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['name' => 'A1'],
            ['name' => 'A2'],
            ['name' => 'A3'],
            ['name' => 'A4'],
            ['name' => 'A5'],
            ['name' => 'B1'],
            ['name' => 'B2'],
            ['name' => 'B3'],
            ['name' => 'B4'],
            ['name' => 'B5'],
        ];

        foreach ($items as $item) {
            Bookcase::firstOrCreate($item);
        }
    }
}
