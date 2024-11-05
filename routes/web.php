<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/road', [RoadController::class, 'index'])->name('road.index');

Route::get('/road/create', [RoadController::class, 'create'])->name('road.create');
Route::post('/road', [RoadController::class, 'store'])->name('road.store');  // Update this to store
Route::get('/road/gallery', [RoadController::class, 'gallery'])->name('road.gallery');  // This will display all roads
Route::get('road/admin-dashboard', [RoadController::class, 'adminDashboard'])->name('road.admin.dashboard');
Route::delete('/road/{id}', [RoadController::class, 'destroy'])->name('road.destroy');

// edit road in gallery
// In routes/web.php
Route::get('/road/edit/{id}', [RoadController::class, 'edit'])->name('road.edit');
Route::put('/road/update/{id}', [RoadController::class, 'update'])->name('road.update');


Route::get('road/admin-dashboard/user-management', [UserController::class, 'index'])->name('road.admin.users.index');


// User Management Routes


// Register and Login Routes
Route::get('road/register', [AuthController::class, 'showRegistrationForm'])->name('road.register');
Route::post('road/register', [AuthController::class, 'register']);

Route::get('road/login', [AuthController::class, 'showLoginForm'])->name('road.login');
Route::post('road/login', [AuthController::class, 'login']);

Route::post('road/logout', [AuthController::class, 'logout'])->name('logout');