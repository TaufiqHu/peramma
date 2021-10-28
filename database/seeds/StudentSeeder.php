<?php

use App\ClassRoom;
use App\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Student::class, 20)->make()->each(function ($student) {
            $classRoom = ClassRoom::inRandomOrder()->first();
            $student->class_room_id = $classRoom->id;
            $student->save();
        });
    }
}
