<?php

use App\Profile;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'Bani',
        	'email' => 'bani@example.com',
        	'password' => bcrypt('qweasd'),
        	'admin' => 1
        ]);

        Profile::create([
        	'avatar' => 'avatars/default.png',
        	'about' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi nobis quidem ab. Veniam, cumque nemo!',
        	'facebook' => 'http://www.facebook.com',
        	'youtube' => 'http://www.youtube.com',
        	'user_id' => $user->id
        ]);
    }
}
