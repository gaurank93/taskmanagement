<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [LoginController::class, 'loginForm'])->name('login');
Auth::routes();
require_once __DIR__ . '/web/admin/routes.php';
require_once __DIR__ . '/web/manager/routes.php';
require_once __DIR__ . '/web/user/routes.php';
