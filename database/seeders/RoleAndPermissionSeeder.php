<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleAndPermissionSeeder extends Seeder
{
    public function run() {
        
        //Roles 
        $roleTendero = Role::where('name', 'tendero')->first();
        if(!$roleTendero){
            $roleTendero = Role::create(['name' => 'tendero']);
        }

        $roleVendedor = Role::where('name', 'vendedor')->first();
        if(!$roleVendedor){
            $roleVendedor = Role::create(['name' => 'vendedor']);
        }

        $roleAdmin = Role::where('name', 'admin')->first();
        if(!$roleAdmin){
            $roleAdmin = Role::create(['name' => 'admin']);
        }
    
        //Permisos
        $permisionTendero = Permission::where('name', 'vista.tendero')->first();
        if(!$permisionTendero){
            $permisionTendero = Permission::create(['name' => 'vista.tendero']);
        }

        $permisionVendedor = Permission::where('name', 'vista.vendedor')->first();
        if(!$permisionVendedor){
            $permisionVendedor = Permission::create(['name' => 'vista.vendedor']);
        }

        $permisionAdmin = Permission::where('name', 'vista.admin')->first();
        if(!$permisionAdmin){
            $permisionAdmin = Permission::create(['name' => 'vista.admin']);
        }


        //Asignar permisos a roles
        if(!$roleTendero->hasPermissionTo($permisionTendero)){
            $roleTendero->givePermissionTo($permisionTendero);
        }

        if(!$roleVendedor->hasPermissionTo($permisionVendedor)){
            $roleVendedor->givePermissionTo($permisionVendedor);
        }

        if(!$roleAdmin->hasPermissionTo($permisionAdmin)){
            $roleAdmin->givePermissionTo($permisionAdmin);
        }

        //Asignar roles a los usuarios
        $userAdmin = User::where('username', 'admin1')->first();
        if($userAdmin){
            $userAdmin->assignRole($roleAdmin);
        }

        $userVendedor = User::where('username', 'vendedor1')->first();
        if($userVendedor){
            $userVendedor->assignRole($roleVendedor);
        }

        $userT = User::where('username', 'tendero1')->first();
        if($userT){
            $userT->assignRole($roleTendero);
        }

    }
}