<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'      => 'Super-admin',
            'slug'      => 'super-admin',
            'special'   => 'all-access'
        ]);
         Role::create([
            'name'      => 'Admin',
            'slug'      => 'admin',
            'special'   => ''
        ]);
          Role::create([
            'name'      => 'Profesor',
            'slug'      => 'profesor',
            'special'   => ''
        ]);
           Role::create([
            'name'      => 'Alumno',
            'slug'      => 'alumno',
            'special'   => ''
        ]);
            Role::create([
            'name'      => 'Suspendido',
            'slug'      => 'suspendido',
            'special'   => 'no-access'
        ]);
    }
}
