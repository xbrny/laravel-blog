<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
        	'site_name' => 'Laravel\'s Blog',
        	'address' => 'Kuala Lumpur Malaysia',
        	'contact_number' => '012345678',
        	'contact_email' => 'info@laravel_kl.my'
        ]);
    }
}
