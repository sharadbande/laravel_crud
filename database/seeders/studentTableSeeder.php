<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class studentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\student::create([
            'name' => 'Akash-from-seeder',
            'address' => 'Kolhapur-from-seeder',
            'mobile' => '9595057009',
            'fees' => '1977'
        ]);
    }
}
