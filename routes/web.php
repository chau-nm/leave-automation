<?php

use App\Http\Controllers\Leave\ViewLeaveController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', ViewLeaveController::class)->name('home');
    Route::get('/leave/create', '\App\Http\Controllers\Leave\CreateLeaveController@view')->name('leave.create');
    Route::post('/leave/store', '\App\Http\Controllers\Leave\CreateLeaveController@store')->name('leave.store');
});
