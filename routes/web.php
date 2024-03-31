<?php

use App\Http\Controllers\JuridicalPersonController;
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
Route::get('/get-school/{id}', [SchoolController::class, 'getSchool']);

Route::post('/update-school/{id}', [SchoolController::class, 'updateSchool']);
Route::post('/create-school', [SchoolController::class, 'createSchool']);

Route::delete('/delete-school/{id}', [SchoolController::class, 'deleteSchool']);

Route::get('/get-juridical-persons', [JuridicalPersonController::class, 'getJuridicalPersons']);


Route::post('/update-juridical-person{id}', [JuridicalPersonController::class, 'updateJuridicalPerson']);


Route::delete('/delete-juridical-person{id}', [JuridicalPersonController::class, 'deleteJuridicalPerson']);
