<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\pending_manager;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class CreatePending_Manager extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        pending_manager::factory(10)->create();

        // DB::table('pending_manager')->insert([
        //     'first_name' => 'houssame',
        //     'last_name' => 'sbitti',
        //     'email' => 'hSbitti@hikma.com',
        //     'password' => Hash::make('Password2024'),
        //     'number' => '1234567890',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);
    }
}
