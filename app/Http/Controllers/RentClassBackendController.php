<?php

namespace App\Http\Controllers;

use App\Models\RentClass;
use Illuminate\Http\Request;

class RentClassBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rentClasses = RentClass::latest()->paginate(10);
        return view('backend.rent-classes.index', ['rentClasses' => $rentClasses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.rent-classes.create',);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'type' => 'required|min:3',
            'cost' => 'numeric',
        ]);

        RentClass::create($validateData);
        return redirect('/rentClass-backend')->with('pesan', 'Data saved successfully');
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
        $rentClass = RentClass::find($id);
        return view('backend.rent-classes.edit', ['rentClass' => $rentClass]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'type' => 'required|min:3',
            'cost' => 'numeric',
        ]);

        RentClass::where('id', $id)->update($validateData);
        return redirect('/rentClass-backend')->with('pesan', 'Data edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        RentClass::destroy($id);
        return redirect('/rentClass-backend')->with('pesan', 'Data deleted successfully');
    }
}
