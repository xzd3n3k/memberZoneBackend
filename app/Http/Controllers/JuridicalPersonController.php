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

    public function updateJuridicalPerson($id, Request $request) {
        $person = JuridicalPerson::where('id',$id)->first();
        $incomingFields = $request->validate([
            'registration_number' => ['required', Rule::unique('juridical_persons', 'registration_number')->ignore($person->id)],
            'company' => 'required',
            'street' => 'required',
            'post_code' => 'required',
            'zip_code' => 'required',
            'city' => 'required',
            'country' => 'required',
            'province' => 'required',
            'email' => 'required',
            'contact_person' => 'required',
            'phone' => 'required',
            'active' => 'required',
            'payed' => 'required',
        ]);

        $person->update($incomingFields);

        return response()->json(['message' => 'Person updated successfully!']);
    }

    public function deleteJuridicalPerson($id) {
        $person = JuridicalPerson::where('id',$id)->first();
        $person->delete();

        return response()->json(['message' => 'Person has been successfully deleted!']);
    }
}
