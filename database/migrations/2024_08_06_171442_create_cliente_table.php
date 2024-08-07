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
        Schema::create('cliente', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', length: 100);
            $table->string('contacto', length: 10);
            $table->char('tipo', length: 1)->default('M'); // M (Moral) / F (Física)
            $table->string('rfc', length: 20);
            $table->string('regimen_fiscal', length: 100);
            $table->string('cfdi', length: 100);
            $table->integer('codigo_postal');
            $table->string('correo', length: 100);
            $table->timestamps();
            $table->dateTime('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};
