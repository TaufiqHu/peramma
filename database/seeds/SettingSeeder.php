<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = Setting::first();

        if (!$setting) {
            $setting = new Setting();
            $setting->save(); //Buat Default
        }
    }
}
