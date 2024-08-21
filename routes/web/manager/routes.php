<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Manager\HomeController;

Route::group(['middleware' => ['role:manager', 'auth'], 'prefix' => 'manager'], function () {
    // Manager home
    Route::get('task/getData', [HomeController::class, 'getData'])->name('manager-task.getData');
    Route::get('task/{id}', [HomeController::class, 'show'])->name('manager-task.show');
    Route::get('task', [HomeController::class, 'index'])->name('manager-task.index');
});
