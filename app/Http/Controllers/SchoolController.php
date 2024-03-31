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

    public function getSchool($id) {
        return response() -> json(School::where('id',$id)->first());
    }

    public function updateSchool($id, Request $request) {
        $school = School::where('id',$id)->first();
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

    public function deleteSchool($id) {
        $school = School::where('id',$id)->first();
        $school->delete();

        return response()->json(['message' => 'School has been successfully deleted!']);
    }

}
