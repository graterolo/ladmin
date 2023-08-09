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
        Schema::create('inventario_dets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventario_id');
            $table->date('fvence');
            $table->bigInteger('lote');
            $table->Integer('cantidad');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('inventario_id')->references('id')->on('inventarios');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventario_dets');
    }
};
