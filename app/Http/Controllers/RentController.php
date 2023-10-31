<?php

namespace App\Http\Controllers;

use App\Models\Garage;
use App\Models\Rent;
use App\Models\Renter;
use App\Models\simList;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function index()
    {
        $renters = Renter::where('user_id', Auth()->user()->id)->get();
        foreach ($renters as $renter) {
            $rents = Rent::where('renter_id', $renter->id)->paginate(5);
        }
        return view('frontend.inner-page.content.rent-index', ['rents' => $rents]);
    }

    public function create(String $id)
    {
        $renters = Renter::where('user_id', Auth()->user()->id)->get();
        $garage = Garage::find($id);
        return view('frontend.inner-page.content.rent-create', [
            'renters' => $renters,
            'garage' => $garage,
            'vehicles' => Vehicle::where('user_id', Auth()->user()->id)->get(),
            'simLists' => simList::where('user_id', Auth()->user()->id)->get(),
        ]);
    }

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
        return redirect('/rent')->with('pesan', 'Data saved successfully');
    }

    public function update(Request $request, String $id)
    {
        $validateData = $request->validate([
            'end_time' => '',
            'end_date' => '',
        ]);

        $validateData['end_time'] = date('H:i:s');
        $validateData['end_date'] = date('Y-m-d');

        Rent::where('id', $id)->update($validateData);
        return redirect('/rent')->with('pesan', 'Data updated successfully');
    }
}
