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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->unique();
            $table->string('acronimo', 20);
            $table->string('rif', 12);
            $table->string('telef', 20);
            $table->string('direccion');
            $table->string('email', 80);
            $table->tinyInteger('tipo');
            $table->string('descripcion');
            $table->unsignedBigInteger('supempresa_id')->nullable();
            $table->timestamps();

            $table->foreign('supempresa_id')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
