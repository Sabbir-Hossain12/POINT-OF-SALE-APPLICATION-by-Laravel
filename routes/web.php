<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\userController;
use App\Http\Middleware\tokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;


//pages
Route::view('/registration','pages.auth.registration-page')->name('login.page');
Route::view('/login','pages.auth.login-page')->name('registration.page');


Route::view('/sendOtp','pages.auth.send-otp-page')->name('');
Route::view('/verifyOtp','pages.auth.verify-otp-page')->name('');
Route::view('/reset','pages.auth.reset-pass-page')->name('')->middleware([tokenVerificationMiddleware::class]);

Route::view('/dashboard','pages.dashboard.dashboard-page')->name('profile')->middleware([tokenVerificationMiddleware::class]);
Route::view('/profile','pages.dashboard.profile-page')->middleware([tokenVerificationMiddleware::class]);
Route::view('/category','pages.dashboard.category-page')->middleware([tokenVerificationMiddleware::class]);





//***************************************************** BackEnd web api routes**************************************************
//backend web api route
Route::post('/userRegistration',[userController::class,'userRegistration']);
Route::post('/userLogin',[userController::class,'userLogin']);

Route::post('/otp',[userController::class,'sendOtp']);
Route::post('/verifyOtp',[userController::class,'verifyOtp']);

//token verify
Route::post('/resetPassword',[userController::class,'resetPassword'])->middleware([tokenVerificationMiddleware::class]);

//user logout
Route::get('/userLogout',[userController::class,'userLogout']);

//profile backend
Route::get('/getProfile',[userController::class,'getProfile'])->middleware([tokenVerificationMiddleware::class]);
Route::post('/updateProfile',[userController::class,'updateProfile'])->middleware([tokenVerificationMiddleware::class]);

//category api
Route::get('/getCategory',[categoryController::class,'getCategory'])->middleware([tokenVerificationMiddleware::class]);
Route::post('/createCategory',[categoryController::class,'createCategory'])->middleware([tokenVerificationMiddleware::class]);
Route::post('/deleteCategory',[categoryController::class,'deleteCategory'])->middleware([tokenVerificationMiddleware::class]);
Route::post('/updateCategory',[categoryController::class,'updateCategory'])->middleware([tokenVerificationMiddleware::class]);
