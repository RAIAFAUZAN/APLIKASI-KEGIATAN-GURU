<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Administration\AdministrationController;


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// contoh halaman setelah login
Route::get('/administration', [AdministrationController::class, 'index'])
    ->middleware('auth')
    ->name('administration');
Route::get('/administration.create', [AdministrationController::class, 'create'])
    ->middleware('auth')
    ->name('administration.create');
Route::post('/administration/insert', [AdministrationController::class, 'insert'])
    ->middleware('auth')
    ->name('administration.insert');    
Route::get('/administration/edit/{id}', [AdministrationController::class, 'edit'])
    ->middleware('auth')
    ->name('administration.edit');
Route::put('/administration/update/{id}', [AdministrationController::class, 'update'])
    ->middleware('auth')
    ->name('administration.update');
Route::delete('/administration/delete/{id}', [AdministrationController::class, 'delete'])
    ->middleware('auth')
    ->name('administration.delete');



Route::get('/', function () {
    return view('welcome');
});
