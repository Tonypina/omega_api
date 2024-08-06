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
        Schema::create('vendedor_poliza', function (Blueprint $table) {
            $table->id();
            $table->double('comision');
            $table->unsignedBigInteger('vendedor_id');
            $table->unsignedBigInteger('poliza_id');
            $table->timestamps();

            $table->foreign('vendedor_id')->references('id')->on('vendedor');
            $table->foreign('poliza_id')->references('id')->on('poliza');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendedor_poliza');
    }
};
