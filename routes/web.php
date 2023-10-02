<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Users\UsersController;
use App\Http\Controllers\Ticket\TicketController;
use App\Http\Controllers\Notification\NotificationController;

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
    return view('login');
});

Route::post('login',[LoginController::class,'login'])->name('login');

Route::group(['middleware' => ['auth']], function () {

    Route::get('logout',[LoginController::class,'logout']);

    Route::get('dashboard',[HomeController::class,'index']);
    Route::get('profile',[HomeController::class,'profile']);
    Route::post('edit-profile',[HomeController::class,'edit_profile'])->name('edit-profile');

    // user
    Route::get('users',[UsersController::class,'index']);
    Route::get('create',[UsersController::class,'create']);
    Route::post('users',[UsersController::class,'store']);
    Route::get('users/edit/{id}',[UsersController::class,'edit']);
    Route::get('users/delete/{id}',[UsersController::class,'delete']);
    Route::post('update',[UsersController::class,'update']);

    // ticket
    Route::get('ticket',[TicketController::class,'index']);
    Route::get('create-ticket',[TicketController::class,'create']);
    Route::post('ticket',[TicketController::class,'store']);
    Route::get('ticket/view/{id}',[TicketController::class,'view']);
    Route::post('status-change',[TicketController::class,'status_change']);

    // notification
    Route::get('notification', [NotificationController::class,'index']);
    Route::get('notification-read/{id}',[NotificationController::class,'markNotification']);

    
});




