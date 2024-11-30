<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Route;

/*Mis Rutas */

//Probando dashboard para usuarios autenticados
// Route::get("/dashboard", function () {
//     return view("dashboard");
// })->middleware(["auth", "verified"])->name("dashboard");


Route::middleware('auth')->group(function(){
    // Ruta para mostrar la lista de empleados
    Route::get("empleados", [EmpleadoController::class, "index"])->name("empleados.index");

    // Ruta para mostrar el formulario de creación de un nuevo empleado
    Route::get('empleados/create', [EmpleadoController::class, 'create'])->name('empleados.create');

    Route::post('empleados', [EmpleadoController::class, 'store'])->name('empleados.store');

    // Ruta para mostrar los detalles de un solo empleado
    Route::get('empleados/{empleado}', [EmpleadoController::class, 'show'])->name('empleados.show');

    // Ruta para mostrar el formulario de edición de un empleado
    Route::get('empleados/{empleado}/edit', [EmpleadoController::class, 'edit'])->name('empleados.edit');

    // Ruta para actualizar los datos de un empleado
    Route::put('empleados/{empleado}', [EmpleadoController::class, 'update'])->name('empleados.update');

    // Ruta para eliminar un empleado
    Route::delete('empleados/{empleado}', [EmpleadoController::class, 'destroy'])->name('empleados.destroy');
});





/*Rutas por defecto*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
