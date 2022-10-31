<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'status' => true,
            'role_id' => 2,
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456789'),
        ]);
    }
}
