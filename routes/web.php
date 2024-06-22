<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LockScreenController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('cars.index', function () {
    return view('cars');
});

Route::get('lockscreen',function(){
    return view('lockscreen');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});




Route::middleware([ 'auth','lockscreen'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // Other protected routes
});



require __DIR__.'/auth.php';

Auth::routes(['verify' => true]);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/roles',[App\Http\Controllers\RoleController::class,'roles'])->name('roles');
Route::get('/cars',[App\Http\Controllers\CarController::class,'cars'])->name('cars');

Route::get('/lockscreen', [LockScreenController::class, 'show'])->name('lockscreen');
Route::post('/lockscreen', [LockScreenController::class, 'unlock'])->name('unlock');
Route::get('/unlock', [LockScreenController::class, 'unlock'])->name('unlock');
Route::post('/unlock', [LockScreenController::class, 'unlock'])->name('unlock');

Route::post('/lockscreen', function () {
    session(['locked' => true]);
    return redirect()->route('lockscreen');
})->name('lockscreen');


Route::resources([
    'roles' => RoleController::class,
    'users' => UserController::class, 
    'cars' => CarController::class,

]);

