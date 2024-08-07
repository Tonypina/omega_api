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
        Schema::create('sucursal', function (Blueprint $table) {
            $table->id();
            $table->string('direccion', length: 100);
            $table->string('correo', length: 100);
            $table->string('contacto', length: 10);
            $table->dateTime('fecha_alta_contrato');
            $table->unsignedBigInteger('cliente_id');
            $table->timestamps();
            $table->dateTime('deleted_at');

            $table->foreign('cliente_id')->references('id')->on('cliente');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sucursal');
    }
};
