<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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




Route::get('/admin-panel',[AdminController::class, 'showUsers']);
Route::post('/admin/users-import', [AdminController::class, 'import'])->name('admin.users.import');
Route::get('/admin/users-export', [AdminController::class, 'export'])->name('admin.users.export');
