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
            $table->unsignedBigInteger('tipo_producto_id'); // Cambia 'tipo' por 'tipo_producto_id'
            $table->string('nombre');
            $table->decimal('precio_interior', 8, 2);
            $table->decimal('precio_terraza', 8, 2);
            $table->string('imagen')->nullable(); // Asume que vas a guardar la URL de la imagen
            $table->timestamps();
    
            $table->foreign('tipo_producto_id')->references('id')->on('tipo_producto')->onDelete('cascade');
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
