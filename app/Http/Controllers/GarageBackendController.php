<?php

namespace App\Http\Controllers;

use App\Models\Garage;
use App\Models\GarageLocation;
use App\Models\GarageRoom;
use App\Models\RentClass;
use Illuminate\Http\Request;

class GarageBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $garages = Garage::latest()->paginate(10);
        return view('backend.garages.index', ['garages' => $garages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.garages.create', [
            'garageRooms' => GarageRoom::orderBy('room_code')->get(),
            'garageLocations' => GarageLocation::all(),
            'rentClasses' => RentClass::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'file_upload' => 'nullable|image|mimes:png,jpg',
            'garageRoom_id' => 'required',
            'garageLocation_id' => 'required',
            'rentClass_id' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('file_upload')) {
            $namaFile = 'img_' . time() . '_' . $request->file_upload->getClientOriginalName();
            $request->file_upload->move('img/garages', $namaFile);
        } else {
            $namaFile = '';
        }

        $validateData['file_upload'] = $namaFile;

        Garage::create($validateData);
        return redirect('/garage-backend')->with('pesan', 'Data saved successfully');
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
        $garage = Garage::find($id);
        return view('backend.garages.edit', [
            'garage' => $garage,
            'garageRooms' => GarageRoom::orderBy('room_code')->get(),
            'garageLocations' => GarageLocation::all(),
            'rentClasses' => RentClass::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'file_upload' => 'nullable|image|mimes:png,jpg',
            'garageRoom_id' => 'required',
            'garageLocation_id' => 'required',
            'rentClass_id' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);

        if ($request->hasFile('file_upload')) {
            if ($request->image_old) {
                $image_url = public_path() . '/img/garages/' . $request->image_old;
                unlink($image_url);
            }
            $namaFile = 'img_' . time() . '_' . $request->file_upload->getClientOriginalName();
            $request->file_upload->move('img/garages', $namaFile);
        } else {
            $namaFile = $request->image_old;
        }

        $validateData['file_upload'] = $namaFile;

        Garage::where('id', $id)->update($validateData);
        return redirect('/garage-backend')->with('pesan', 'Data edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Garage::destroy($id);
        return redirect('/garage-backend')->with('pesan', 'Data deleted successfully');
    }
}
