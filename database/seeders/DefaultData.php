<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DefaultData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'fname' => 'Super',
                'lname' => 'Admin',
                'dob' => date('1980-11-04'),
                'gender' => 'male',
                'marital_status' => 'divorced',
                'email' => 'admin@mail.com',
                'password' => bcrypt('password'),
                'user_type' => 1
            ],
            [
                'fname' => 'francis',
                'lname' => 'bennett',
                'dob' => date('1980-11-04'),
                'gender' => 'male',
                'marital_status' => 'divorced',
                'email' => 'francisbennett@mail.com',
                'password' => bcrypt('password'),
                'user_type' => 0
            ]
        ];

        foreach ($users as $key => $user){
            User::create($user);
        }

    }
}
