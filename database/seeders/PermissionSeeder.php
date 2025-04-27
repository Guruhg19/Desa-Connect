<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $permissions = [
        'dashboard' => [
            'menu'
        ],
        'head-of-family' => [
            'menu',
            'list',
            'create',
            'edit',
            'delete',
        ],
        'family-member' => [
            'menu',
            'list',
            'create',
            'edit',
            'delete',
        ],
        'social-assistance' => [
            'menu',
            'list',
            'create',
            'edit',
            'delete',
        ],
        'social-assistance-recipient' => [
            'menu',
            'list',
            'create',
            'edit',
            'delete',
        ],
        'event' => [
            'menu',
            'list',
            'create',
            'edit',
            'delete',
        ],
        'event-participant' => [
            'menu',
            'list',
            'create',
            'edit',
            'delete',
        ],
        'development' => [
            'menu',
            'list',
            'create',
            'edit',
            'delete',
        ],
        'development-applicant' => [
            'menu',
            'list',
            'create',
            'edit',
            'delete',
        ],
        'profile' => [
            'menu',
            'create',
            'edit',
        ],

    ];
    public function run(): void
    {
        foreach($this->permissions as $key => $permission) {
            foreach($permission as $value) {
                Permission::firstOrCreate([
                    'name' => $key . '-' . $value,
                    'guard_name' => 'sanctum',
                ]);
            }
        }
    }
}
