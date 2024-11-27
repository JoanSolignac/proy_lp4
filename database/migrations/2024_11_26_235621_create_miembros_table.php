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
        Schema::create('miembros', function (Blueprint $table) {
            $table->id(); //Crea un campo id autoincremental.
            $table->string("nombre_apellido", 255); //Crea un campo nombre_apellido de tipo string con longitud 200.
            $table->string("direccion", 255); //Crea un campo direccion de tipo string con longitud 200.
            $table->string("telefono", 100)->unique(); //Crea un campo telefono de tipo string con longitud 100 y unico.
            $table->string("fecha_nacimiento", 100); //Crea un campo fecha_nacimiento de tipo string con longitud 100.
            $table->string("genero", 50); //Crea un campo genero de tipo string con longitud 50.
            $table->string("email", 255)->unique(); //Crea un campo email de tipo string con longitud 255 y unico.
            $table->string("estado", 5); //Crea un campo estado de tipo string con longitud 5.
            $table->string("ministerio", 255); //Crea un campo ministerio de tipo string con longitud 255.
            $table->timestamps(); //Crea dos campos created_at y updated_at de tipo timestamp.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('miembros');
    }
};
