<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'edit profile']);
        Permission::create(['name' => 'delete profile']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'freelancer']);
        $role1->givePermissionTo('edit profile');
        $role1->givePermissionTo('delete profile');

        $role2 = Role::create(['name' => 'student']);
        $role2->givePermissionTo('edit profile');
        $role2->givePermissionTo('delete profile');

        $role3 = Role::create(['name' => 'employer']);
        $role3->givePermissionTo('edit articles');
        $role3->givePermissionTo('delete articles');

        $superAdmin = Role::create(['name' => 'Super Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Freelancer',
            'email' => 'freelancer@example.com',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Student',
            'email' => 'student@example.com',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Employer',
            'email' => 'employere@example.com',
        ]);
        $user->assignRole($role3);

        
        
        


        
        // create super admin user
        $admin = \App\Models\User::factory()->create([
            'name' => 'MickeyBerg',
            'email' => 'mickeybrasmussen@gmail.com',
            'password' => Hash::make('30555944twr')
        ]);
        $admin->assignRole($superAdmin);
    }
}