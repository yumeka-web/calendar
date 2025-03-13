<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/schedule/create', [ScheduleController::class, 'create'])->name('schedule.create');
    Route::post('/schedule/store', [ScheduleController::class, 'store'])->name('schedule.store');
    Route::get('/schedule/{id}/edit', [ScheduleController::class, 'edit'])->name('schedule.edit');
    Route::patch('/schedule/{id}/update', [ScheduleController::class, 'update'])->name('schedule.update');
    Route::delete('/schedule/{id}/destroy', [ScheduleController::class, 'destroy'])->name('schedule.destroy');
    Route::get('/schedule/{id}/show', [ScheduleController::class, 'show'])->name('schedule.show');
    Route::patch('/schedule/{id}/update/status', [ScheduleController::class, 'updateStatus'])->name('schedule.update.status');
    Route::patch('/schedule/{id}/update/action', [ScheduleController::class, 'updateAction'])->name('schedule.update.action');
});
