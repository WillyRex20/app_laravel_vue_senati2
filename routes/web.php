<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\VProductoController;
use App\Http\Controllers\TipoDocumentoController;
use App\Http\Controllers\AsisLlaveController;
use App\Http\Controllers\UserController;





Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/menu', function () {
    return Inertia::render('Menu');
});

Route::get('/menu/submenucito', function () {
    return Inertia::render('Submenucito');
});

// Rutas de configuración agrupadas con middleware de autenticación
Route::prefix('configuration')
    ->middleware(['auth', 'verified']) // Protege todas las rutas con autenticación
    ->group(function () {
        Route::get('/tipo-documento', function () {
            return Inertia::render('configuration/tipo-documento/TipoDocumento');
        });
        
        // Aquí puedes añadir más rutas de configuración
    });
 

Route::get('/hola-mundo', function () {
    return Inertia::render('HolaMundo');
})->name('hola-mundo');

Route::get('/webtest', function () {
    return view('web.web'); // Asumiendo que tu vista está en resources/views/web/web.blade.php
})->name('webtest');


//Creando rutas en laravel
Route::get('/aplicaciones/actividades',function(){
    return Inertia::render('Actividades');
});

//Creando rutas en laravel
Route::get('/aplicaciones/yesno', function () {
    return Inertia::render('YesNo'); 
});

//Rutas de productos
Route::get('/senati/productos', [VProductoController::class,'ListarProductos']);

//Rutas de tipo documento
Route::get('/senati/tipo-documento', [TipoDocumentoController::class,'ListarProductos']);

//Rutas de llaves
Route::get('/configuracion/llaves', [AsisLlaveController::class,'index'])->name('configuracion.llaves');
Route::post('/configuracion/CrearLlave', [AsisLlaveController::class,'store'])->name('configuracion.CrearLlave');
Route::delete('/configuracion/EliminarLlave/{id_llave}', [AsisLlaveController::class,'destroy'])->name('configuracion.EliminarLlave');
Route::get('/configuracion/llaves-pdf', [AsisLlaveController::class,'llavepdf'])->name('configuracion.llaves-pdf');
Route::put('/configuracion/UpdateLlave/{id_llave}', [AsisLlaveController::class,'update'])->name('configuracion.UpdateLlave');

//Rutas de usuarios
Route::get('/configuracion/usuarios-listas', [UserController::class,'listar'])->name('configuracion.usuarios-listas');
Route::get('/configuracion/usuarios-buscar', [UserController::class,'buscar'])->name('configuracion.usuarios-buscar');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
