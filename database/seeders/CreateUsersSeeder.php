<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $user=[
            [
                'name'=>'Sharad Bande',
                'email'=>'sharad@demo.com',
                'is_admin'=>'1',
                'password'=> '123456',
            ],
            [
                'name'=>'Admin',
                'email'=>'admin@demo.com',
                'is_admin'=>'1',
                'password'=> '123456',
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }


    }
}
