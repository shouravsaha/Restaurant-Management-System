<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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
// This is admin controller
Route::get('/users', [AdminController::class, 'users']);
Route::get('/deleteUser/{id}', [AdminController::class, 'deleteUser']);
Route::get('/foodmenu', [AdminController::class, 'foodmenu']);
Route::post('/upload_food', [AdminController::class, 'upload_food']);
Route::get('/edit_food_menu/{id}', [AdminController::class, 'edit_food_menu']);
Route::post('/update_food/{id}', [AdminController::class, 'update_food']);
Route::get('/delete_food_menu/{id}', [AdminController::class, 'delete_food_menu']);
Route::post('/reservation', [AdminController::class, 'reservation']);
Route::get('/viewreservation', [AdminController::class, 'viewreservation']);
Route::get('/viewchef', [AdminController::class, 'viewchef']);
Route::post('/uploadchef', [AdminController::class, 'uploadchef']);
Route::get('/updatechef/{id}', [AdminController::class, 'updatechef']);
Route::post('/updatefoodchef/{id}', [AdminController::class, 'updatefoodchef']);
Route::get('/deletechef/{id}', [AdminController::class, 'deletechef']);


// This is home controller
Route::get('/', [HomeController::class, 'index']);
Route::get('/redirects', [HomeController::class, 'redirect']);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
