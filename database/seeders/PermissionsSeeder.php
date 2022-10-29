<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create student role and assign existing permissions
        Permission::create(['name' => 'Page no assignment']);

        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'general']);
        $userRole->givePermissionTo($currentPermissions);

        // Create student role and assign existing permissions
        Permission::create(['name' => 'List assistances']);
        Permission::create(['name' => 'View assistance']);
        Permission::create(['name' => 'Create assistance']);
        Permission::create(['name' => 'Update assistance']);
        Permission::create(['name' => 'Delete assistance']);

        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'student']);
        $userRole->givePermissionTo($currentPermissions);

        // Create teacher role and assign existing permissions
        Permission::create(['name' => 'Dashboard']);

        Permission::create(['name' => 'List students']);
        Permission::create(['name' => 'View student']);
        Permission::create(['name' => 'Create student']);
        Permission::create(['name' => 'Update student']);
        Permission::create(['name' => 'Delete student']);
        Permission::create(['name' => 'Assign student to center and career']);

        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'teacher']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'List roles']);
        Permission::create(['name' => 'View roles']);
        Permission::create(['name' => 'Create roles']);
        Permission::create(['name' => 'Update roles']);
        Permission::create(['name' => 'Delete roles']);

        Permission::create(['name' => 'List permissions']);
        Permission::create(['name' => 'View permissions']);
        Permission::create(['name' => 'Create permissions']);
        Permission::create(['name' => 'Update permissions']);
        Permission::create(['name' => 'Delete permissions']);

        Permission::create(['name' => 'List permission and roles']);
        Permission::create(['name' => 'View permission and role']);
        Permission::create(['name' => 'Create permission and role']);
        Permission::create(['name' => 'Update permission and role']);
        Permission::create(['name' => 'Delete permission and role']);

        Permission::create(['name' => 'List centers']);
        Permission::create(['name' => 'View center']);
        Permission::create(['name' => 'Create center']);
        Permission::create(['name' => 'Update center']);
        Permission::create(['name' => 'Delete center']);

        Permission::create(['name' => 'List careers']);
        Permission::create(['name' => 'View career']);
        Permission::create(['name' => 'Create career']);
        Permission::create(['name' => 'Update career']);
        Permission::create(['name' => 'Delete career']);

        Permission::create(['name' => 'List career and centers']);
        Permission::create(['name' => 'View career and center']);
        Permission::create(['name' => 'Create career and center']);
        Permission::create(['name' => 'Update career and center']);
        Permission::create(['name' => 'Delete career and center']);

        Permission::create(['name' => 'List semesters']);
        Permission::create(['name' => 'View semester']);
        Permission::create(['name' => 'Create semester']);
        Permission::create(['name' => 'Update semester']);
        Permission::create(['name' => 'Delete semester']);

        Permission::create(['name' => 'List courses']);
        Permission::create(['name' => 'View courses']);
        Permission::create(['name' => 'Create courses']);
        Permission::create(['name' => 'Update courses']);
        Permission::create(['name' => 'Delete courses']);

        Permission::create(['name' => 'List teachers']);
        Permission::create(['name' => 'View teacher']);
        Permission::create(['name' => 'Create teacher']);
        Permission::create(['name' => 'Update teacher']);
        Permission::create(['name' => 'Delete teacher']);

        Permission::create(['name' => 'List sections']);
        Permission::create(['name' => 'View section']);
        Permission::create(['name' => 'Create section']);
        Permission::create(['name' => 'Update section']);
        Permission::create(['name' => 'Delete section']);
        Permission::create(['name' => 'Assign student to section']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $users = User::get();
        $users->each(function ($user) use ($adminRole) {
            $user->assignRole($adminRole);
        });
    }
}
