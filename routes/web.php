<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\EventController as AdminEventController;

Route::get('/', fn() => to_route('events.index'));

require __DIR__.'/auth.php'; // rotas do Breeze

Route::middleware('auth')->group(function () {
    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    // Público (logado): listar e ver eventos
    Route::get('/eventos', [EventController::class, 'index'])->name('events.index');
    Route::get('/eventos/{event}', [EventController::class, 'show'])->name('events.show');

    // Inscrições
    Route::post('/eventos/{event}/inscrever', [EnrollmentController::class, 'store'])->name('events.enroll');
    Route::delete('/eventos/{event}/cancelar', [EnrollmentController::class, 'destroy'])->name('events.cancel');

    // Meus eventos
    Route::get('/meus-eventos', [EnrollmentController::class, 'myEvents'])->name('my.events');

    // ADMIN
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/eventos/criar', [AdminEventController::class, 'create'])->name('events.create');
        Route::post('/eventos', [AdminEventController::class, 'store'])->name('events.store');
        Route::get('/eventos/{event}/editar', [AdminEventController::class, 'edit'])->name('events.edit');
        Route::patch('/eventos/{event}', [AdminEventController::class, 'update'])->name('events.update');
        Route::delete('/eventos/{event}', [AdminEventController::class, 'destroy'])->name('events.destroy');

        Route::get('/eventos/{event}/inscritos', [AdminEventController::class, 'participants'])->name('events.participants');
    });
});