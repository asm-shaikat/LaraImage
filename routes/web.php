<?php

use App\Http\Controllers\ImageController;
use App\Models\User;
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

Route::get('/', function () {
    $userData = User::all();
    return view('welcome',compact('userData'));
});

Route::post('/user-data',[ImageController::class,'store'])->name('user-data');
