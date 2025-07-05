<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\Estudiante\ExamenController;
use App\Http\Controllers\DashboardController;

Route::controller(WebController::class)->group(function () {
    Route::get('/', 'index')->name('web.index');
});

Route::prefix('service')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('estudiante/skill', 'skill');
        Route::get('estudiante/cursos', 'cursos');
    });
});



Route::prefix('estudiante')->group(function () {
    Route::controller(ExamenController::class)->group(function () {
        Route::prefix('examen')->group(function () {
            Route::get('historial', 'historial')->name('estudiante.examen.historial');
            Route::get('lista', 'lista');
        });
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
