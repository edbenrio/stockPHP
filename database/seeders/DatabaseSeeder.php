<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /**crear usuario y asignar rol */
        /* super admin */
        /*$u = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
        ]);

        $roles = ["caja", "deposito", "admin"];
        foreach ($roles as $role) {
            Role::findOr(['name' => $role]);
            $u = User::factory()->create([
                'name' => $role,
                'email' => $role .'@example.com',
            ]);
            $u->assignRole($role);
        }*/

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            MovementSeeder::class,
        ]);

    }
}
