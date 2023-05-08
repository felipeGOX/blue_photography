<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->upsert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => Date::now(),
            'password' => Hash::make('admin123'),
        ], ['name' => 'Admin']
        );
    }
}
