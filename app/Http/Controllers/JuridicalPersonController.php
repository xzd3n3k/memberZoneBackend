<?php

namespace App\Http\Controllers;

use App\Models\JuridicalPerson;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JuridicalPersonController extends Controller
{
    public function getJuridicalPersons() {
        return response()->json(JuridicalPerson::all());
    }

    public function getJuridicalPerson($id) {
        return response()->json(JuridicalPerson::where('id', $id)->first());
    }

    public function updateJuridicalPerson($id, Request $request) {
        $person = JuridicalPerson::where('id',$id)->first();
        $incomingFields = $request->validate([
            'registration_number' => ['required', Rule::unique('juridical_persons', 'registration_number')->ignore($person->id)],
            'company' => 'nullable',
            'active' => 'required',
            'payed' => 'required',
            'street' => 'nullable',
            'post_code' => 'nullable',
            'zip_code' => 'nullable',
            'city' => 'nullable',
            'country' => 'nullable',
            'province' => 'nullable',
            'email' => 'nullable',
            'contact_person' => 'nullable',
            'phone' => 'nullable',
            'ico' => 'nullable',
        ]);

        $person->update($incomingFields);

        return response()->json(['message' => 'Person updated successfully!']);
    }

    public function createJuridicalPerson(Request $request) {
        $incomingFields = $request->validate([
            'registration_number' => ['required', Rule::unique('juridical_persons', 'registration_number')],
            'company' => 'nullable',
            'active' => 'required',
            'payed' => 'required',
            'street' => 'nullable',
            'post_code' => 'nullable',
            'zip_code' => 'nullable',
            'city' => 'nullable',
            'country' => 'nullable',
            'province' => 'nullable',
            'email' => 'nullable',
            'contact_person' => 'nullable',
            'phone' => 'nullable',
            'ico' => 'nullable',
        ]);

        JuridicalPerson::create($incomingFields);
        return response()->json(['message' => 'Person created successfully!']);
    }

    public function deleteJuridicalPerson($id) {
        $person = JuridicalPerson::where('id',$id)->first();
        $person->delete();

        return response()->json(['message' => 'Person has been successfully deleted!']);
    }
}
