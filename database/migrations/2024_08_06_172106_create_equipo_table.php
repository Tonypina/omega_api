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
        Schema::create('equipo', function (Blueprint $table) {
            $table->id();
            $table->string('serie', length: 50);
            $table->string('marca', length: 50);
            $table->string('modelo', length: 50);
            $table->decimal('costo_poliza', places: 2);
            $table->unsignedBigInteger('catalogo_tipo_equipo_id');
            $table->unsignedBigInteger('sucursal_id');
            $table->timestamps();
            $table->dateTime('deleted_at');

            $table->foreign('catalogo_tipo_equipo_id')->references('id')->on('catalogo_tipo_equipo');
            $table->foreign('sucursal_id')->references('id')->on('sucursal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipo');
    }
};
