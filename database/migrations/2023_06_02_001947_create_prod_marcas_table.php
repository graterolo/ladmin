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
        Schema::create('prod_marcas', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->tinyInteger('supervisado')->default(0);
            $table->string('descripcion');
            $table->foreignId('empresa_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->unique(['empresa_id', 'name']);
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prod_marcas');
    }
};
