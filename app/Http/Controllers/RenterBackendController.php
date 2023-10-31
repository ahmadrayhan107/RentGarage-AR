<?php

namespace App\Http\Controllers;

use App\Models\Renter;
use App\Models\User;
use Illuminate\Http\Request;

class RenterBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $renters = Renter::latest()->paginate(10);
        return view('backend.renters.index', ['renters' => $renters]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.renters.create', ['users' => User::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'user_id' => 'required',
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'nik' => 'required|min:14',
            'phone_number' => 'required|min:12',
            'gender' => 'required',
            'address' => 'required',
        ]);

        Renter::create($validateData);
        return redirect('/renter-backend')->with('pesan', 'Data saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $renter = Renter::find($id);
        $users = User::all();
        return view('backend.renters.edit', ['renter' => $renter, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'user_id' => 'required',
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'nik' => 'required',
            'phone_number' => 'required|min:12',
            'gender' => 'required',
            'address' => 'required',
        ]);

        Renter::where('id', $id)->update($validateData);
        return redirect('/renter-backend')->with('pesan', 'Data edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Renter::destroy($id);
        return redirect('/renter-backend')->with('pesan', 'Data deleted successfully');
    }
}
