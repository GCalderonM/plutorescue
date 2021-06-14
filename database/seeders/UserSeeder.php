<?php

namespace Database\Seeders;

use App\Models\Community;
use App\Models\Province;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reseteamos la cache sobre los permisos y roles
        app()['cache']->forget('spatie.permission.cache');

        // Roles
        $admin = Role::create([
            'name' => 'Admin'
        ]);

        Role::create([
            'name' => 'Usuario'
        ]);

        // Cuenta administrador
        $administrador = User::create([
            'username' => 'admin',
            'name' => 'admin',
            'surname' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('GuillermoAdmin2808@'),
            'remember_token' => Str::random(10),
        ]);

        // Asignamos el rol Admin a dicho usuario
        $administrador->assignRole($admin);

        // Usuarios fake
        User::factory(5)->create()->each(function ($user) {
            $user->assignRole('usuario');
        });
    }
}
