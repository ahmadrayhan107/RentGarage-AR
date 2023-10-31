<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleType;
use Illuminate\Http\Request;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehicles = Vehicle::where('user_id', Auth()->user()->id)->paginate(5);
        return view('frontend.inner-page.content.vehicles-index', ['vehicles' => $vehicles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.inner-page.content.vehicles-create', ['vehicleTypes' => VehicleType::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:3',
            'plate_number' => 'required',
            'vehicleType_id' => 'required',
            'user_id' => '',
        ]);

        $validateData['user_id'] = Auth()->user()->id;

        Vehicle::create($validateData);
        return redirect('/vehicles')->with('pesan', 'Data saved successfully');
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
        return view('frontend.inner-page.content.vehicles-edit', ['vehicle' => $vehicle, 'vehicleTypes' => VehicleType::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'name' => 'required|min:3',
            'plate_number' => 'required',
            'vehicleType_id' => 'required',
        ]);

        Vehicle::where('id', $id)->update($validateData);
        return redirect('/vehicles')->with('pesan', 'Data edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Vehicle::destroy($id);
        return redirect('/vehicles')->with('pesan', 'Data deleted successfully');
    }
}
