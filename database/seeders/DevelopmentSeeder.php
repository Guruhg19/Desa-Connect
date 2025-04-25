<?php

namespace Database\Seeders;

use Database\Factories\DevelopmentFactory;
use Database\Factories\EventFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DevelopmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DevelopmentFactory::new()->count(10)->create();
    }
}
