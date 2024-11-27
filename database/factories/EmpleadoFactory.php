<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $roles = [
            "Seguridad", "Recepcionista", "Supervisor", "Cocinera", 
            "Contador", "Cajero", "Limpieza", "Mantenimiento", 
            "Almacenista", "Reposteros"
        ];

        return [
            "nombre_apellido" => $this->faker->name(), // Nombre aleatorio
            "dni" => $this->faker->unique()->randomNumber(8), // DNI de 8 dígitos
            "fecha_nacimiento" => $this->faker->date(), // Fecha aleatoria
            "email" => $this->faker->unique()->safeEmail(), // Email aleatorio
            "telefono" => '9' . $this->faker->numberBetween(10000000, 99999999), // Teléfono de 9 dígitos
            "direccion" => $this->faker->address(), // Dirección aleatoria
            "rol" => $this->faker->randomElement($roles), // Rol aleatorio de la lista
            "estado" => "activo", // Estado fijo como 'activo'
            "hora_entrada" => "09:00:00", // Hora de entrada fija
            "hora_salida" => "17:00:00", // Hora de salida fija
            "foto" => null, // Foto nula
            "created_at" => now(),
            "updated_at" => now(),
        ];
    }
}
