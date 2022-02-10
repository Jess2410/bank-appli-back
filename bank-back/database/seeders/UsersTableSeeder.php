<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'lastname' => 'nait',
            'firstname' => 'aziz',
            'birthday' => '01/01/2000',
            'email' => 'aziz@mail.com',
            'password' => Hash::make('password2'),
        ]);
    }
}
