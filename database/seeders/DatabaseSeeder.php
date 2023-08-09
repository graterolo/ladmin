<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(3)->create()->each(function($user){
        //     $user->assignRole('vendedor');
        // }); 
        
        \App\Models\Empresa::factory(2)->create();
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);       
        \App\Models\ProdCategoria::factory(3)->create();
        \App\Models\ProdMarca::factory(3)->create();
        \App\Models\ProdUnidad::factory(3)->create();
        \App\Models\Producto::factory(10)->create();
        \App\Models\Tasa::factory(3)->create();
        \App\Models\InvDeposito::factory(3)->create();
        \App\Models\Inventario::factory(3)->create();
        \App\Models\InventarioDet::factory(3)->create();
        
        // de esta forma crea tres usuarios con permisos basicos

        //  \App\Models\User::factory(3)->create([
        //      'name' => 'Test User',
        //      'email' => 'test@example.com',
        //  ]);
    }
}
