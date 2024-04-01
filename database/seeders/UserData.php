<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserData extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user =[
            [
                'name'=> 'Administrator',
                'username'=>'admin',
                'password'=>bcrypt('123456'),
                'level'=>1,
                'email'=>'kangmas@gmail.com',

            ],
            [
                'name'=> 'Kasir',
                'username'=>'kasir',
                'password'=>bcrypt('123456'),
                'level'=>2,
                'email'=>'kasir@gmail.com',
                
            ],
            [
                'name'=> 'Pimpinan',
                'username'=>'bos',
                'password'=>bcrypt('123456'),
                'level'=>1,
                'email'=>'bos@gmail.com',
                
            ],

        ];

            foreach ($user as $key => $value) {
                User::create($value);
            }

    }
}
