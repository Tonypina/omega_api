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
        Schema::create('poliza', function (Blueprint $table) {
            $table->id();
            $table->dateTime('vigencia');
            $table->integer('periodicidad'); // Checar documentación para tipos de periodicidad
            $table->integer('eventualidades');
            $table->string('numero_poliza', length: 100);
            $table->decimal('costo', places: 2);
            $table->unsignedBigInteger('sucursal_id');
            $table->timestamps();

            $table->foreign('sucursal_id')->references('id')->on('sucursal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poliza');
    }
};
