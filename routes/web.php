<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRecordController;
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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', [UserRecordController::class, 'index'])->name('home');
Route::post('/add_users',[UserRecordController::class, 'store']);
Route::get('/delete/{id}',[UserRecordController::class, 'destroy'] );