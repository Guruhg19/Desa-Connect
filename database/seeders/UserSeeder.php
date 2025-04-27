<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456789'),
        ])->assignRole('admin');

        User::create([
            'name' => 'Kepala Keluarga',
            'email' => 'headoffamily@app.com',
            'password' => bcrypt('123456789'),
        ])->assignRole('head-of-family');

        UserFactory::new()->count(15)->create();
    }
}
