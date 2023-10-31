<?php

namespace App\Http\Controllers;

use App\Models\simList;
use App\Models\User;
use Illuminate\Http\Request;

class simListBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $simLists = simList::latest()->paginate(10);
        return view('backend.sim-lists.index', ['simLists' => $simLists]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.sim-lists.create', ['users' => User::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'user_id' => 'required',
            'number' => 'regex:/^([0-9]){4}-([0-9]){4}-([0-9]){6}/i',
            'class' => 'required'
        ]);

        simList::create($validateData);
        return redirect('/simList-backend')->with('pesan', 'Data saved successfully');
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
        $simList = simList::find($id);
        return view('backend.sim-lists.edit', ['simList' => $simList, 'users' => User::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'user_id' => 'required',
            'number' => 'regex:/^([0-9]){4}-([0-9]){4}-([0-9]){6}/i',
            'class' => 'required'
        ]);

        simList::where('id', $id)->update($validateData);
        return redirect('/simList-backend')->with('pesan', 'Data edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        simList::destroy($id);
        return redirect('/simList-backend')->with('pesan', 'Data deleted successfully');
    }
}
