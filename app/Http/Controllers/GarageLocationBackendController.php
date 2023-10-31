<?php

namespace App\Http\Controllers;

use App\Models\GarageLocation;
use Illuminate\Http\Request;

class GarageLocationBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $garageLocations = GarageLocation::latest()->paginate(10);
        return view('backend.garage-locations.index', ['garageLocations' => $garageLocations]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.garage-locations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'street_name' => 'required|min:3',
            'address_number' => 'required|numeric',
            'city' => 'required|min:3',
            'province' => 'required|min:3',
            'postal_code' => 'required|numeric'
        ]);

        GarageLocation::create($validateData);
        return redirect('/garageLocation-backend')->with('pesan', 'Data saved successfully');
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
        $garageLocation = GarageLocation::find($id);
        return view('backend.garage-locations.edit', ['garageLocation' => $garageLocation]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'street_name' => 'required|min:3',
            'address_number' => 'required|numeric',
            'city' => 'required|min:3',
            'province' => 'required|min:3',
            'postal_code' => 'required|numeric'
        ]);

        GarageLocation::where('id', $id)->update($validateData);
        return redirect('/garageLocation-backend')->with('pesan', 'Data edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        GarageLocation::destroy($id);
        return redirect('/garageLocation-backend')->with('pesan', 'Data deleted successfully');
    }
}
