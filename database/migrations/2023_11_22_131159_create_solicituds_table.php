<?php

use DragonCode\Contracts\Cashier\Config\Queues\Unique;
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
        Schema::create('solicituds', function (Blueprint $table) {
            $table->id();
            $table->string('DNI',8)->unique();
            $table->string('Nombre');
            $table->string('Apellido');
            $table->string('Celular',9)->unique();
            $table->string('Correo');
            $table->string('Direccion');
            $table->string('TipoSol');
            $table->string('Curso');
            $table->string('Comentario',255);
            $table->dateTime('fechEnvi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicituds');
    }
};
