<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;


Route::post('book/{book}/catalog',[Controllers\BookController::class,'postCatalog']);
Route::post('book/{book}/catalog/{catalog_id}/detach',[Controllers\BookController::class,'detachCatalog']);
Route::post('book/{book}/media',[Controllers\BookController::class,'postMedia']);
Route::post('book/{book}/file',[Controllers\BookController::class,'addFile']);
Route::get('parse/ozby',[Controllers\BookController::class,'getBooksOzby']);

Route::controller(Controllers\AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
    Route::any('/logout', 'logout')->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('book', Controllers\BookController::class)->except(['create', 'edit']);
    Route::get('/user',[Controllers\AuthController::class,'user']);
});

