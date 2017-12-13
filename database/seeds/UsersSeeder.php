<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Moderator',
        	'username' => 'moderator',
        	'email' => 'moderator@example.com',
        	'password' => 'moderator',
        	'role_id' => 1
        ]);
    }
}
