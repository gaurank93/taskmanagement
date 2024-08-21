<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\TaskController;

Route::group(['middleware' => ['role:user', 'auth'], 'prefix' => 'user'], function () {
    // User task
    Route::post('task/upload-document', [TaskController::class, 'uploadDocument'])->name('user-task.upload-document');
    Route::get('task/getData', [TaskController::class, 'getData'])->name('user-task.getData');
    Route::resource('user-task', TaskController::class);
});
