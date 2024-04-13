<?php

use App\Http\Controllers\HonoredMemberController;
use App\Http\Controllers\JuridicalPersonController;
use App\Http\Controllers\PhysicalPersonController;
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
Route::get('/get-juridical-person/{id}', [JuridicalPersonController::class, 'getJuridicalPerson']);

Route::post('/update-juridical-person/{id}', [JuridicalPersonController::class, 'updateJuridicalPerson']);
Route::post('/create-juridical-person', [JuridicalPersonController::class, 'createJuridicalPerson']);

Route::delete('/delete-juridical-person/{id}', [JuridicalPersonController::class, 'deleteJuridicalPerson']);

Route::get('/get-physical-persons', [PhysicalPersonController::class, 'getPhysicalPersons']);
Route::get('/get-physical-person/{id}', [PhysicalPersonController::class, 'getPhysicalPerson']);

Route::post('/update-physical-person/{id}', [PhysicalPersonController::class, 'updatePhysicalPerson']);
Route::post('/create-physical-person', [PhysicalPersonController::class, 'createPhysicalPerson']);

Route::delete('/delete-physical-person/{id}', [PhysicalPersonController::class, 'deletePhysicalPerson']);

Route::get('/get-honored-members', [HonoredMemberController::class, 'getHonoredMembers']);
Route::get('/get-honored-member/{id}', [HonoredMemberController::class, 'getHonoredMember']);

Route::post('/update-physical-person/{id}', [HonoredMemberController::class, 'updateHonoredMember']);
Route::post('/create-physical-person', [HonoredMemberController::class, 'createHonoredMember']);

Route::delete('/delete-physical-person/{id}', [HonoredMemberController::class, 'deleteHonoredMember']);
