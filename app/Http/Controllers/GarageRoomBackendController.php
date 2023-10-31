<?php

namespace App\Http\Controllers;

use App\Models\GarageRoom;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GarageRoomBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $garageRooms = GarageRoom::latest()->paginate(10);
        return view('backend.garage-rooms.index', ['garageRooms' => $garageRooms]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.garage-rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'room_code' => 'required|unique:garage_rooms,room_code|regex:/^[A-Z]{1,3}-[0-9]{3}/i',
        ]);

        GarageRoom::create($validateData);
        return redirect('/garageRoom-backend')->with('pesan', 'Data saved successfully');
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
        $garageRoom = GarageRoom::find($id);
        return view('backend.garage-rooms.edit', ['garageRoom' => $garageRoom]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = GarageRoom::find($id);
        $roomCode = $data['room_code'];
        // $validateData = ['room_code' => $request['room_code']];
        $validateData = [];
        if ($request['room_code'] != $roomCode) {
            $validateData = $request->validate([
                'room_code' => 'required|unique:garage_rooms,room_code|regex:/^[A-Z]{1,3}-[0-9]{3}/i',
            ]);
        }

        GarageRoom::where('id', $id)->update($validateData);
        return redirect('/garageRoom-backend')->with('pesan', 'Data edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        GarageRoom::destroy($id);
        return redirect('/garageRoom-backend')->with('pesan', 'Data deleted successfully');
    }
}
