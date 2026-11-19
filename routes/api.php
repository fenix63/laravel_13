<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;

Route::get('/test/', [UserController::class, 'test']);
Route::post('/categories/add/', [CategoryController::class, 'store']);