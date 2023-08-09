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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('serial', 20);
            $table->foreignId('categoria_id')->constrained('prod_categorias')->cascadeOnDelete('restrict');
            $table->foreignId('unidad_id')->constrained('prod_unidads')->cascadeOnDelete('restrict');
            $table->foreignId('marca_id')->constrained('prod_marcas')->cascadeOnDelete('restrict');
            $table->tinyInteger('activo')->default(1);
            $table->float('costo');
            $table->float('utilidad1');
            $table->float('utilidad2');
            $table->float('utilidad3');
            $table->float('utilidad4');
            $table->float('precio1');
            $table->float('precio2');
            $table->float('precio3');
            $table->float('precio4');
            $table->tinyInteger('exento')->default(0);
            $table->string('descripcion');
            $table->foreignId('empresa_id');
            $table->string('url_img', 200)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->unique(['empresa_id', 'name']);
            $table->unique(['empresa_id', 'serial']);
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
