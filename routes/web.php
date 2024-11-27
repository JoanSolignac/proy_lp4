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
    Route::get("empleados", [EmpleadoController::class, "index"])->name("empleados.index");
    Route::get('empleados/create', [EmpleadoController::class, 'create'])->name('empleados.create');
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
