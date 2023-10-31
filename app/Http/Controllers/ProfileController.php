<?php

namespace App\Http\Controllers;

use App\Models\Renter;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Renter::where('user_id', Auth()->user()->id)->get();
        if ($profiles->isEmpty()) {
            return view('frontend.inner-page.content.profile-create');
        } else {
            return view('frontend.inner-page.content.profile-edit', ['profiles' => $profiles]);
        }
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'nik' => 'required|min:14',
            'phone_number' => 'required|min:12',
            'gender' => 'required',
            'address' => 'required',
            'user_id' => '',
        ]);

        $validateData['user_id'] = Auth()->user()->id;

        Renter::create($validateData);
        return redirect('/profile')->with('pesan', 'Data saved successfully');
    }

    public function update(Request $request, String $id)
    {
        $validateData = $request->validate([
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'nik' => 'required|min:14',
            'phone_number' => 'required|min:12',
            'gender' => 'required',
            'address' => 'required',
        ]);

        Renter::where('id', $id)->update($validateData);
        return redirect('/profile')->with('pesan', 'Data edited successfully');
    }
}
