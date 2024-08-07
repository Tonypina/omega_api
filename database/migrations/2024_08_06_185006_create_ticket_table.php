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
        Schema::create('ticket', function (Blueprint $table) {
            $table->id();
            $table->string('folio', length: 50);
            $table->decimal('monto_ticket', places: 2);
            $table->decimal('monto_servicio', places: 2);
            $table->dateTime('fecha_asignacion');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_check_in');
            $table->dateTime('fecha_fin');
            $table->string('comentario', length: 250);
            $table->char('criticidad', length: 1);
            $table->string('orden_servicio', length: 500);
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('equipo_id');
            $table->unsignedBigInteger('ticket_padre_id')->nullable()->default(null);
            $table->unsignedBigInteger('tecnico_id');
            $table->timestamps();
            $table->dateTime('deleted_at');

            $table->foreign('status_id')->references('id')->on('catalogo_status');
            $table->foreign('equipo_id')->references('id')->on('equipo');
            $table->foreign('tecnico_id')->references('id')->on('tecnico');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ticket');
    }
};
