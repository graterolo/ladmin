<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'empresas.index']);
        Permission::create(['name' => 'empresas.create']);
        Permission::create(['name' => 'empresas.edit']);
        Permission::create(['name' => 'empresas.destroy']);

        Permission::create(['name' => 'users.index']);

        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo('empresas.index');
        $role1->givePermissionTo('empresas.create');
        $role1->givePermissionTo('empresas.edit');
        $role1->givePermissionTo('users.index');

        $role2 = Role::create(['name' => 'vendedor']);
        $role2->givePermissionTo('empresas.index');
        $role2->givePermissionTo('users.index');

        $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider
        
        
        //$usuario = Role::create(['name' => 'usuario']);
        
        // Permission::create(['name' => 'dashboard'])->syncRoles([$admin, $vendedor, $usuario]);
        // Permission::create(['name' => 'empresas.index'])->syncRoles([$admin, $vendedor, $usuario]);
        // Permission::create(['name' => 'empresas.create'])->assignRole($admin);
        // Permission::create(['name' => 'empresas.edit'])->assignRole($admin);
        // Permission::create(['name' => 'empresas.destroy'])->assignRole($admin);

        // Permission::create(['name' => 'users.index'])->assignRole([$admin]);

        // Permission::create(['name' => 'about']);
        // $permission1 = Permission::create(['name' => 'admin.dashboard']);
        // $permission2 = Permission::create(['name' => 'admin.empresa.index']);
        // $permission3 = Permission::create(['name' => 'admin.empresa.create']);
        // $permission4 = Permission::create(['name' => 'admin.empresa.edit']);
        // $permission5 = Permission::create(['name' => 'admin.empresa.destroy']);

        //$permission6 = Permission::create(['name' => 'admin.about.index']);
        //$permission7 = Permission::create(['name' => 'admin.about.create']);
        //$permission8 = Permission::create(['name' => 'admin.about.edit']);
        //$permission9 = Permission::create(['name' => 'admin.about.destroy']);
    }
}
