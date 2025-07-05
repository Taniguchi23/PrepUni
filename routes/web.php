<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\Estudiante\ExamenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Estudiante\CursoController;

Route::controller(WebController::class)->group(function () {
    Route::get('/', 'index')->name('web.index');
});

Route::prefix('service')->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('estudiante/skill', 'skill');
        Route::get('estudiante/cursos', 'cursos');
        Route::get('prediccion/nota', 'predecirNota');

    });
});



Route::prefix('estudiante')->group(function () {
    Route::controller(ExamenController::class)->group(function () {
        Route::prefix('examen')->group(function () {
            Route::get('historial', 'historial')->name('estudiante.examen.historial');
            Route::get('lista', 'lista');


        });
        Route::prefix('cursos')->group(function () {
            Route::controller(CursoController::class)->group(function () {
                Route::get('lista','lista')->name('estudiante.cursos.lista');
                Route::get('ver/{id}','ver')->name('estudiante.cursos.ver');
                Route::get('examen/ver/{id}','verExamen')->name('estudiante.cursos.examen.ver');
                Route::post('exportar-examen/{id}','exportarPdf')->name('estudiante.cursos.examen.exportar');
                Route::get('evaluar/{id}', 'crearExamen')->name('estudiante.examen.crear');
                Route::post('examen/evaluar/{id}', 'guardarExamen')->name('estudiante.examen.guardar');
            });

        });
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
