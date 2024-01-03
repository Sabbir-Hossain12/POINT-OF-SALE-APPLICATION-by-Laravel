<?php

use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;


//pages
Route::view('/registration','pages.auth.registration-page')->name('login.page');
Route::view('/login','pages.auth.login-page')->name('registration.page');
Route::view('/customer','pages.dashboard.customer-page')->name('profile');

//backend
Route::post('/userRegistration',[userController::class,'userRegistration']);
Route::post('/userLogin',[userController::class,'userLogin']);

