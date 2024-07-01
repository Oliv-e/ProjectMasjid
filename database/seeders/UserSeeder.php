<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Moderator',
                'email' => 'mods@gmail.com',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'role' => 'moderator',
                'password' => Hash::make('12341234'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'role' => 'admin',
                'password' => Hash::make('12341234'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'name' => 'super-admin',
                'email' => 'super@gmail.com',
                'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'role' => 'super_admin',
                'password' => Hash::make('12341234'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
