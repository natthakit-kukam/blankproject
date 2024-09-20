<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Create the role if it doesn't exist
        $developerRole = Role::firstOrCreate(['name' => 'developer']);
        $developerPermission = Permission::firstOrCreate(['name' => 'setting']);

        // Create a user
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('12345678'),  // Hash the password
        ]);

        // Assign the developer role and permission to the user
        $user->assignRole($developerRole);
        $user->givePermissionTo($developerPermission);  // Assuming you use a package like Spatie's Permission
    }
}
