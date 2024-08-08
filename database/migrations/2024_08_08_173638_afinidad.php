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
        Schema::create('afinidad', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tecnico_id');
            $table->unsignedBigInteger('catalogo_tipo_equipo_id');
            $table->decimal('porcentaje', total: 2, places: 2)->default(0.00);
            $table->timestamps();
            $table->dateTime('deleted_at');

            $table->foreign('tecnico_id')->references('id')->on('tecnico');
            $table->foreign('catalogo_tipo_equipo_id')->references('id')->on('catalogo_tipo_equipo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('afinidad');
    }
};
