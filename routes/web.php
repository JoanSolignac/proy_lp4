<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*Mis Rutas */

//Probando dashboard para usuarios autenticados
// Route::get("/dashboard", function () {
//     return view("dashboard");
// })->middleware(["auth", "verified"])->name("dashboard");

Route::get("miembros", function () {
    return view("miembros.index");
})->middleware(["auth", "verified"]);

Route::get("miembros/create", function(){
    return view("miembros.create");
})->middleware(["auth", "verified"]);



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
