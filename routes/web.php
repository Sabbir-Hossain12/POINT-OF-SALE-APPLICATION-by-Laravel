<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\userController;
use App\Http\Middleware\tokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;


//******************************************************************************************************************************
//***************************************************** FrontEnd Pages**********************************************************
//******************************************************************************************************************************

Route::view('/registration','pages.auth.registration-page')->name('login.page');
Route::view('/login','pages.auth.login-page')->name('registration.page');


Route::view('/sendOtp','pages.auth.send-otp-page');
Route::view('/verifyOtp','pages.auth.verify-otp-page');
Route::view('/reset','pages.auth.reset-pass-page')->middleware([tokenVerificationMiddleware::class]);

Route::view('/dashboard','pages.dashboard.dashboard-page')->name('profile')->middleware([tokenVerificationMiddleware::class]);
Route::view('/profile','pages.dashboard.profile-page')->middleware([tokenVerificationMiddleware::class]);
Route::view('/category','pages.dashboard.category-page')->middleware([tokenVerificationMiddleware::class]);
Route::view('/customer','pages.dashboard.customer-page')->middleware([tokenVerificationMiddleware::class]);



//******************************************************************************************************************************
//***************************************************** BackEnd web api routes**************************************************
//******************************************************************************************************************************

Route::post('/userRegistration',[userController::class,'userRegistration']);
Route::post('/userLogin',[userController::class,'userLogin']);

Route::post('/otp',[userController::class,'sendOtp']);
Route::post('/verifyOtp',[userController::class,'verifyOtp']);


Route::middleware([tokenVerificationMiddleware::class])->group(function ()

{
    //token verify
    Route::post('/resetPassword',[userController::class,'resetPassword']);

//user logout
    Route::get('/userLogout',[userController::class,'userLogout']);

//profile backend
    Route::get('/getProfile',[userController::class,'getProfile']);
    Route::post('/updateProfile',[userController::class,'updateProfile']);

//category api
    Route::get('/getCategory',[categoryController::class,'getCategory']);
    Route::post('/createCategory',[categoryController::class,'createCategory']);
    Route::post('/deleteCategory',[categoryController::class,'deleteCategory']);
    Route::post('/updateCategory',[categoryController::class,'updateCategory']);

//Customer api

    Route::get('/get-customer',[CustomerController::class,'getCustomer']);
    Route::post('/customer-by-id',[CustomerController::class,'customerById']);
    Route::post('/create-customer',[CustomerController::class,'createCustomer']);
    Route::post('/update-customer',[CustomerController::class,'updateCustomer']);
    Route::post('/delete-customer',[CustomerController::class,'deleteCustomer']);

//    product api


});

