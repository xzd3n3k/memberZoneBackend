<?php

use App\Http\Controllers\SchoolController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/token', function (Request $request) {
    $token = $request->session()->token();
    $token = csrf_token();

    return response()->json($token);
});


Route::get('/get-schools', [SchoolController::class, 'getSchools']);
Route::get('/get-school/{registration_number}', [SchoolController::class, 'getSchool']);

Route::post('/update-school/{registration_number}', [SchoolController::class, 'updateSchool']);
Route::post('/create-school', [SchoolController::class, 'createSchool']);

Route::delete('/delete-school/{registration_number}', [SchoolController::class, 'deleteSchool']);
