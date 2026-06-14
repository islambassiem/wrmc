<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            PostSeeder::class,
            DoctorSeeder::class,
        ]);

        /** @var Role $role */
        $role = Role::query()->where('name', 'admin')->firstOrFail();

        /** @var Role $role */
        $user = User::query()->where('name', 'admin')->firstOrFail();

        $permissions = Permission::all();

        foreach ($permissions as $permission) {
            $role->givePermissionTo($permission->name);
        }

        $user->assignRole($role->name);
    }
}
