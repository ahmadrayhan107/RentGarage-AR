<?php

namespace App\Http\Controllers;

use App\Models\Renter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('backend.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'isAdmin' => 'required'
        ]);

        $validateData['password'] = Hash::make($request->password);
        $validateData['remember_token'] = Str::random(10);
        $validateData['email_verified_at'] = now();

        User::create($validateData);
        return redirect('/user-backend')->with('pesan', 'Data saved successfully');
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
        $user = User::find($id);
        return view('backend.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'isAdmin' => 'required'
        ]);

        if ($request->filled('password')) {
            $validateData['password'] = Hash::make($request->password);
        }
        
        User::where('id', $id)->update($validateData);
        return redirect('/user-backend')->with('pesan', 'Data edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect('/user-backend')->with('pesan', 'Data deleted successfully');
    }
}
