<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Coordinador']);
        $role3 = Role::create(['name' => 'Promotor']);

        Permission::create(
            [
                'name' => 'admin.home',
                'description' => 'Acceder al panel administrativo'
            ]
        )->syncRoles([$role1]);

        Permission::create(
            [
                'name' => 'admin.users.index',
                'description' => 'Ver listado de usuarios'
            ]
        )->syncRoles([$role1]);
        Permission::create(
            [
                'name' => 'admin.users.edit',
                'description' => 'Asignar un rol'
            ]
        )->syncRoles([$role1]);


        Permission::create(
            [
                'name' => 'home',
                'description' => 'Ver el dashboard'
            ]
        )->syncRoles([$role1, $role2, $role3]);
        Permission::create(
            [
                'name' => 'encuesta.diageo.index',
                'description' => 'Listar las encuestas Diageo'
            ]
        )->syncRoles([$role1, $role2, $role3]);
        Permission::create(
            [
                'name' => 'encuesta.diageo.create',
                'description' => 'Crear una encuesta Diageo'
            ]
        )->syncRoles([$role1, $role2, $role3]);
        Permission::create(
            [
                'name' => 'encuesta.diageo.edit',
                'description' => 'Modificar una encuesta Diageo'
            ]
        )->syncRoles([$role1, $role2]);
        Permission::create(
            [
                'name' => 'encuesta.diageo.destroy',
                'description' => 'Eliminar una encuesta Diageo'
            ]
        )->syncRoles([$role1, $role2]);


        //Permission::create(['name' => 'encuesta.diageo.index']);
        //Permission::create(['name' => 'encuesta.diageo.create']);
        //Permission::create(['name' => 'encuesta.diageo.edit']);
        //Permission::create(['name' => 'encuesta.diageo.destroy']);



    }
}
