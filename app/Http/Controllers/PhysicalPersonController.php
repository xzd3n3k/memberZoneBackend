<?php

namespace App\Http\Controllers;

use App\Models\PhysicalPerson;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PhysicalPersonController extends Controller
{
    public function getPhysicalPersons() {
        return response()->json(PhysicalPerson::all());
    }

    public function getPhysicalPerson($id) {
        return response()->json(PhysicalPerson::where('id', $id)->first());
    }

    public function updatePhysicalPerson($id, Request $request) {
        $person = PhysicalPerson::where('id',$id)->first();
        $incomingFields = $request->validate([
            'registration_number' => ['required', Rule::unique('juridical_persons', 'registration_number')->ignore($person->id)],
            'title' => 'nullable',
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'ares' => 'nullable',
            'subject_of_business' => 'nullable',
            'street' => 'nullable',
            'post_code' => 'nullable',
            'zip_code' => 'nullable',
            'city' => 'nullable',
            'country' => 'nullable',
            'province' => 'nullable',
            'email' => 'nullable',
            'phone' => 'nullable',
            'active' => 'required',
            'payed' => 'required',
            'ico' => 'nullable',
        ]);

        $person->update($incomingFields);

        return response()->json(['message' => 'Person updated successfully!']);
    }

    public function createPhysicalPerson(Request $request) {
        $incomingFields = $request->validate([
            'registration_number' => ['required', Rule::unique('juridical_persons', 'registration_number')],
            'title' => 'nullable',
            'first_name' => 'nullable',
            'last_name' => 'nullable',
            'ares' => 'nullable',
            'subject_of_business' => 'nullable',
            'street' => 'nullable',
            'post_code' => 'nullable',
            'zip_code' => 'nullable',
            'city' => 'nullable',
            'country' => 'nullable',
            'province' => 'nullable',
            'email' => 'nullable',
            'phone' => 'nullable',
            'active' => 'required',
            'payed' => 'required',
            'ico' => 'nullable',
        ]);

        PhysicalPerson::create($incomingFields);
        return response()->json(['message' => 'Person created successfully!']);
    }

    public function deletePhysicalPerson($id) {
        $person = PhysicalPerson::where('id',$id)->first();
        $person->delete();

        return response()->json(['message' => 'Person has been successfully deleted!']);
    }
}
