<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([
            'name'=>'Andrew Tiema',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('secret')
        ]);
    }
}
