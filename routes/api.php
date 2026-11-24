<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

Route::post('/login', function (Request $request) {
	$request->validate([
		'email' => 'required|email',
		'password' => 'required',
	]);

	$user = User::where('email', $request->email)->first();

	if (! $user || ! Hash::check($request->password, $user->password)) {
		return response()->json(['message' => 'Неверные учетные данные'], 401);
	}

	// Создаём токен для этого пользователя
	$token = $user->createToken('api-token')->plainTextToken;

	return response()->json(['token' => $token]);
});

// Защищённые маршруты
Route::middleware('auth:sanctum')->group(function () {
	Route::apiResource('categories', CategoryController::class);
	Route::put('/categories/{category}/', [CategoryController::class, 'update']);
	// другие защищённые маршруты...
});


Route::get('/test/', [UserController::class, 'test']);
Route::get('/categories/user/{user_id}', [CategoryController::class, 'index']);
Route::post('/categories/add/', [CategoryController::class, 'store']);
