<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
           // $table->string('name', 50);
            $table->foreignId('empresa_id');
            $table->foreignId('deposito_id');
            $table->foreignId('producto_id');
            $table->Integer('cantidad');
            $table->tinyInteger('activo')->default(1);
            $table->Integer('limite_stock');   
            $table->unsignedBigInteger('user_id');

            $table->unique(['empresa_id', 'deposito_id', 'producto_id']);
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('deposito_id')->references('id')->on('inv_depositos');
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
};
