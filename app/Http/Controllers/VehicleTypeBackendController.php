<?php

namespace App\Http\Controllers;

use App\Models\VehicleType;
use Illuminate\Http\Request;

class VehicleTypeBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicleTypes = VehicleType::latest()->paginate(10);
        return view('backend.vehicle-types.index', ['vehicleTypes' => $vehicleTypes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.vehicle-types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
        ]);

        VehicleType::create($validateData);
        return redirect('/vehicleType-backend')->with('pesan', 'Data saved successfully');
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
        $vehicleType = VehicleType::find($id);
        return view('backend.vehicle-types.edit', ['vehicleType' => $vehicleType]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
        ]);

        VehicleType::where('id', $id)->update($validateData);
        return redirect('/vehicleType-backend')->with('pesan', 'Data edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        VehicleType::destroy($id);
        return redirect('/vehicleType-backend')->with('pesan', 'Data deleted successfully');
    }
}
