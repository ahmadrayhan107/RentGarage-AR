<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleType;
use Illuminate\Http\Request;

class VehicleBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::latest()->paginate(10);
        return view('backend.vehicles.index', ['vehicles' => $vehicles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.vehicles.create', ['users' => User::all(), 'vehicleTypes' => VehicleType::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'user_id' => 'required',
            'name' => 'required|min:3',
            'plate_number' => 'required',
            'vehicleType_id' => 'required',
        ]);

        Vehicle::create($validateData);
        return redirect('/vehicle-backend')->with('pesan', 'Data saved successfully');
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
        $vehicle = Vehicle::find($id);
        return view('backend.vehicles.edit', ['vehicle' => $vehicle, 'users' => User::all(), 'vehicleTypes' => VehicleType::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'user_id' => 'required',
            'name' => 'required|min:3',
            'plate_number' => 'required',
            'vehicleType_id' => 'required',
        ]);

        Vehicle::where('id', $id)->update($validateData);
        return redirect('/vehicle-backend')->with('pesan', 'Data edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Vehicle::destroy($id);
        return redirect('/vehicle-backend')->with('pesan', 'Data deleted successfully');
    }
}
