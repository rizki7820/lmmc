<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = [
            [
               'name'=>'Admin User',
               'email'=>'ikiahoy@gmail.com',
               'type'=>'perawat',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'Manager User',
               'email'=>'dokteriskandar@gmail.com',
               'type'=> 'dokter',
               'password'=> bcrypt('123456'),
            ],
            [
               'name'=>'User',
               'email'=>'mispusari@gmail.com',
               'type'=>'user',
               'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
