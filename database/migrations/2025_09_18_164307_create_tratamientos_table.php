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
        Schema::create('tratamientos', function (Blueprint $table) {
            $table->id('id_tratamiento');
            $table->unsignedBigInteger('id_paciente');
            $table->text('descripcion');
            $table->date('fecha');
            $table->string('veterinario', 100)->nullable();
            $table->decimal('costo', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('id_paciente')
                ->references('id_paciente')->on('pacientes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tratamientos');
    }
};
