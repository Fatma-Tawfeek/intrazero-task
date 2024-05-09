<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view-users',
            'create-users',
            'edit-users',
            'delete-users',
            'view-categories',
            'create-categories',
            'edit-categories',
            'delete-categories',
            'view-diplomas',
            'create-diplomas',
            'edit-diplomas',
            'delete-diplomas',
            'view-roles',
            'create-roles',
            'edit-roles',
            'delete-roles',
            'view-study-plans',
            'create-study-plans',
            'edit-study-plans',
            'delete-study-plans',
            'view-subjects',
            'create-subjects',
            'edit-subjects',
            'delete-subjects',
            'view-courses',
            'create-courses',
            'edit-courses',
            'delete-courses'
        ];

        foreach ($permissions as $permission) {
            \App\Models\Permission::create([
                'name' => $permission
            ]);
        }

        $adminRole = \App\Models\Role::where('name', 'admin')->first();
        $adminRole->permissions()->attach(\Illuminate\Support\Arr::pluck(\App\Models\Permission::all(), 'id'));

        $tutorRole = \App\Models\Role::where('name', 'tutor')->first();
        $tutorRole->permissions()->attach([9, 10, 11, 12, 17, 21, 25, 26, 27, 28]);

        $studentRole = \App\Models\Role::where('name', 'student')->first();
        $studentRole->permissions()->attach([9, 17, 25]);
    }
}
