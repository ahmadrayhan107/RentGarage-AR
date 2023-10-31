<?php

namespace App\Http\Controllers;

use App\Models\Garage;
use App\Models\Rent;
use App\Models\Renter;
use App\Models\simList;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class RentBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rents = Rent::latest()->paginate(10);
        return view('backend.rents.index', ['rents' => $rents]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.rents.create', [
            'renters' => Renter::all(),
            'vehicles' => Vehicle::all(),
            'simLists' => simList::all(),
            'garages' => Garage::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'renter_id' => 'required',
            'vehicle_id' => 'required',
            'sim_id' => 'required',
            'garage_id' => 'required',
            'begin_time' => '',
            'begin_date' => '',
        ]);

        $validateData['begin_time'] = date('H:i:s');
        $validateData['begin_date'] = date('Y-m-d');

        Rent::create($validateData);
        return redirect('/rent-backend')->with('pesan', 'Data saved successfully');
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
        $rent = Rent::find($id);
        return view('backend.rents.edit', [
            'rent' => $rent,
            'renters' => Renter::all(),
            'vehicles' => Vehicle::all(),
            'simLists' => simList::all(),
            'garages' => Garage::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'renter_id' => 'required',
            'vehicle_id' => 'required',
            'sim_id' => 'required',
            'garage_id' => 'required',
            'end_time' => '',
            'end_date' => '',
        ]);

        $validateData['end_time'] = date('H:i:s');
        $validateData['end_date'] = date('Y-m-d');

        Rent::where('id', $id)->update($validateData);
        return redirect('/rent-backend')->with('pesan', 'Data edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Rent::destroy($id);
        return redirect('/rent-backend')->with('pesan', 'Data deleted successfully');
    }
}
