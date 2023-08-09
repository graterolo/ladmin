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
        Schema::create('inv_depositos', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('acronimo', 20);
            $table->tinyInteger('tipo');
            $table->tinyInteger('condicion');
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
        Schema::dropIfExists('inv_depositos');
    }
};
