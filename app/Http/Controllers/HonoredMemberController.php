<?php

namespace App\Http\Controllers;

use App\Models\HonoredMember;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HonoredMemberController extends Controller
{
    public function getHonoredMembers() {
        return response()->json(HonoredMember::all());
    }

    public function getHonoredMember($id) {
        return response()->json(HonoredMember::where('id', $id)->first());
    }

    public function updateHonoredMember($id, Request $request) {
        $person = HonoredMember::where('id',$id)->first();
        $incomingFields = $request->validate([
            'registration_number' => ['required', Rule::unique('honored_members', 'registration_number')->ignore($person->id)],
            'street' => 'nullable',
            'post_code' => 'nullable',
            'zip_code' => 'nullable',
            'city' => 'nullable',
            'country' => 'nullable',
            'province' => 'nullable',
            'email' => 'nullable',
            'phone' => 'nullable',
            'title' => 'nullable',
            'first_name' => 'nullable',
            'last_name' => 'nullable',
        ]);

        $person->update($incomingFields);

        return response()->json(['message' => 'Person updated successfully!']);
    }

    public function createHonoredMember(Request $request) {
        $incomingFields = $request->validate([
            'registration_number' => ['required', Rule::unique('honored_members', 'registration_number')],
            'street' => 'nullable',
            'post_code' => 'nullable',
            'zip_code' => 'nullable',
            'city' => 'nullable',
            'country' => 'nullable',
            'province' => 'nullable',
            'email' => 'nullable',
            'phone' => 'nullable',
            'title' => 'nullable',
            'first_name' => 'nullable',
            'last_name' => 'nullable',
        ]);

        HonoredMember::create($incomingFields);
        return response()->json(['message' => 'Person created successfully!']);
    }

    public function deleteHonoredMember($id) {
        $person = HonoredMember::where('id',$id)->first();
        $person->delete();

        return response()->json(['message' => 'Person has been successfully deleted!']);
    }
}
