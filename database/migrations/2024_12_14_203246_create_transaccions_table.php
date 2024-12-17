<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('transacciones', function (Blueprint $table) {
            $table->id(); // Clave primaria auto-incremental
            $table->foreignId('libro_id')->constrained('libros')->onDelete('cascade'); // FK a libros
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade'); // FK a clientes
            $table->enum('estado', ['rechazado', 'prestado', 'devuelto']); // Estado de la transacción
            $table->date('fecha_prestamo'); // Fecha de préstamo
            $table->date('fecha_devolucion')->nullable(); // Fecha de devolución (opcional)
            $table->timestamps(); // Columnas 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaccions');
    }
};
