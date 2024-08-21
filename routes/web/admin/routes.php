<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TaskController;

Route::group(['middleware' => ['role:admin', 'auth'], 'prefix' => 'admin'], function () {
    // user
    Route::get('user/getData', [UserController::class, 'getData'])->name('user.getData');
    Route::resource('user', UserController::class);
    // Task
    Route::post('task/upload-document', [TaskController::class, 'uploadDocument'])->name('task.upload-document');
    Route::get('task/getData', [TaskController::class, 'getData'])->name('task.getData');
    Route::resource('task', TaskController::class);
});
