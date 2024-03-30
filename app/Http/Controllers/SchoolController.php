<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SchoolController extends Controller
{

    public function getSchools() {
        return response()->json(School::all());
    }

    public function getSchool($registration_number) {
        return response() -> json(School::where('registration_number',$registration_number)->first());
    }

    public function updateSchool($registration_number, Request $request) {
        $school = School::where('registration_number',$registration_number)->first();
        $incomingFields = $request->validate([
            'registration_number' => ['required', Rule::unique('schools', 'registration_number')->ignore($school->id)],
            'name' => 'required',
            'principal' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'active' => 'required',
            'payed' => 'required',
            'street' => 'required',
            'post_code' => 'required',
            'zip_code' => 'required',
            'city' => 'required',
            'country' => 'required',
            'province' => 'required'
        ]);

        $school->update($incomingFields);

        return response()->json(['message' => 'School update successfully!']);
    }

    public function createSchool(Request $request) {

        $incomingFields = $request->validate([
            'registration_number' => ['required', Rule::unique('schools', 'registration_number')],
            'name' => 'required',
            'principal' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'active' => 'required',
            'payed' => 'required',
            'street' => 'required',
            'post_code' => 'required',
            'zip_code' => 'required',
            'city' => 'required',
            'country' => 'required',
            'province' => 'required'
        ]);

        School::create($incomingFields);
        return response()->json(['message' => 'School created successfully!']);
    }

    public function deleteSchool($registration_number) {
        $school = School::where('registration_number',$registration_number)->first();
        $school->delete();

        return response()->json(['message' => 'School has been successfully deleted!']);
    }

}
