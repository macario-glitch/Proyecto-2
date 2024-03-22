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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre',50);
            $table->string('Apellidos',150);
            $table->enum('Puesto',['Pastelero(a)','Panadero(a)','Decorador(a)','Cajero(a)','Asistente','Repartidor','Gerente'])->default('Asistente');
            $table->float('Sueldo');
            $table->string('Sucursal',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
