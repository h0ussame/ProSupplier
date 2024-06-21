<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {  
        DB::table('admin')->insert([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'number' => '1234567890',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
    }
    
}
