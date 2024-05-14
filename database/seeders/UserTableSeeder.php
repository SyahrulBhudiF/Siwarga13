<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'username' => 'admin',
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('Admin123'),
                'role' => 'RW'
            ], [
                'username' => 'ketuaRw',
                'name' => 'Ketua RW',
                'email' => 'ketuarw@gmail.com',
                'password' => Hash::make('Ketua123'),
                'role' => 'RW'
            ], [
                'username' => 'ketuaRt1',
                'name' => 'Ketua RT 1',
                'email' => 'ketuart1@gmail.com',
                'password' => Hash::make('Ketua123'),
                'role' => 'RT 1'
            ],
            [
                'username' => 'ketuaRt2',
                'name' => 'Ketua RT 2',
                'email' => 'ketuart2@gmail.com',
                'password' => Hash::make('Ketua123'),
                'role' => 'RT 2'
            ],
            [
                'username' => 'ketuaRt3',
                'name' => 'Ketua RT 3',
                'email' => 'ketuart3@gmail.com',
                'password' => Hash::make('Ketua123'),
                'role' => 'RT 3'
            ],
            [
                'username' => 'ketuaRt4',
                'name' => 'Ketua RT 4',
                'email' => 'ketuart4@gmail.com',
                'password' => Hash::make('Ketua123'),
                'role' => 'RT 4'
            ],
            [
                'username' => 'ketuaRt5',
                'name' => 'Ketua RT 5',
                'email' => 'ketuart5@gmail.com',
                'password' => Hash::make('Ketua123'),
                'role' => 'RT 5'
            ],
        ];

        DB::table('user')->insert($data);
    }
}
