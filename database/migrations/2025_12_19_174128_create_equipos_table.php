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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_equipo');
            $table->string('marca_modelo');
            $table->text('problema_reportado');
            $table->string('nombre_cliente');
            $table->string('telefono');
            $table->string('estado'); // recibido, diagnosticando, reparando, listo, entregado
            $table->timestamps(); // created_at = fecha de ingreso automática

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
