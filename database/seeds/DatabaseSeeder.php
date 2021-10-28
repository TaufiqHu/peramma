<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BookTypeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(BookcaseSeeder::class);
        $this->call(ClassRoomSeeder::class);
        $this->call(SettingSeeder::class);
        $this->call(BookSeeder::class);
        $this->call(StudentSeeder::class);
    }
}
