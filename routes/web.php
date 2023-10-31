<?php

use App\Http\Controllers\Dashboard;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GarageBackendController;
use App\Http\Controllers\GarageController;
use App\Http\Controllers\GarageLocationBackendController;
use App\Http\Controllers\GarageRoomBackendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentBackendController;
use App\Http\Controllers\RentClassBackendController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\RenterBackendController;
use App\Http\Controllers\SimController;
use App\Http\Controllers\simListBackendController;
use App\Http\Controllers\UserBackendController;
use App\Http\Controllers\VehicleBackendController;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\VehicleTypeBackendController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [LoginController::class, 'register'])->name('register');

Route::post('/register', [LoginController::class, 'signUp']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/backend', [DashboardController::class, 'index'])->name('backend')->middleware('auth')->middleware('Admin');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::post('/profile', [ProfileController::class, 'store']);

Route::post('/profile/{id}', [ProfileController::class, 'update']);

Route::resource('vehicles', VehiclesController::class);
Route::resource('simLists', SimController::class);

Route::get('/garage-detail/{id}', [GarageController::class, 'index']);

Route::get('/rent/{id}', [RentController::class, 'create'])->middleware('notLogin');
Route::post('/rent', [RentController::class, 'store']);
Route::get('/rent', [RentController::class, 'index']);
Route::post('/end-rent/{id}', [RentController::class, 'update']);

Route::resource('user-backend', UserBackendController::class)->middleware('Admin');
Route::resource('renter-backend', RenterBackendController::class)->middleware('Admin');
Route::resource('vehicleType-backend', VehicleTypeBackendController::class)->middleware('Admin');
Route::resource('vehicle-backend', VehicleBackendController::class)->middleware('Admin');
Route::resource('simList-backend', simListBackendController::class)->middleware('Admin');
Route::resource('rentClass-backend', RentClassBackendController::class)->middleware('Admin');
Route::resource('garageLocation-backend', GarageLocationBackendController::class)->middleware('Admin');
Route::resource('garageRoom-backend', GarageRoomBackendController::class)->middleware('Admin');
Route::resource('garage-backend', GarageBackendController::class)->middleware('Admin');
Route::resource('rent-backend', RentBackendController::class)->middleware('Admin');
