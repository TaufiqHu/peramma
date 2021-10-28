<?php

use App\ClassRoom;
use Illuminate\Database\Seeder;

class ClassRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['name' => 'IX-A', 'grade' => '9'],
            ['name' => 'IX-B', 'grade' => '9'],
            ['name' => 'IX-C', 'grade' => '9'],
            ['name' => 'IX-D', 'grade' => '9'],
            ['name' => 'IX-E', 'grade' => '9'],
            ['name' => 'IX-F', 'grade' => '9'],
            ['name' => 'IX-G', 'grade' => '9'],
            ['name' => 'IX-H', 'grade' => '9'],
            ['name' => 'IX-I', 'grade' => '9'],
            ['name' => 'IX-J', 'grade' => '9'],
        ];

        foreach ($items as $item) {
            ClassRoom::firstOrCreate($item);
        }
    }
}
