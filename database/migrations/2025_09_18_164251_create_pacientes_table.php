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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id('id_paciente');
            $table->string('nombre', 100);
            $table->string('especie', 50);
            $table->string('raza', 50)->nullable();
            $table->integer('edad')->nullable();
            $table->string('nombre_duenio', 100);
            $table->string('telefono_duenio', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
