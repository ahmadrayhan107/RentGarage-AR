<?php

namespace App\Http\Controllers;

use App\Models\simList;
use Illuminate\Http\Request;

class SimController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $simLists = simList::where('user_id', Auth()->user()->id)->paginate(10);
        return view('frontend.inner-page.content.simLists-index', ['simLists' => $simLists]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.inner-page.content.simLists-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'number' => 'regex:/^([0-9]){4}-([0-9]){4}-([0-9]){6}/i',
            'class' => 'required',
            'user_id' => '',
        ]);

        $validateData['user_id'] = Auth()->user()->id;

        simList::create($validateData);
        return redirect('/simLists')->with('pesan', 'Data saved successfully');
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
        return view('frontend.inner-page.content.simLists-edit', ['simList' => $simList]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = $request->validate([
            'number' => 'regex:/^([0-9]){4}-([0-9]){4}-([0-9]){6}/i',
            'class' => 'required',
        ]);

        simList::where('id', $id)->update($validateData);
        return redirect('/simLists')->with('pesan', 'Data edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        simList::destroy($id);
        return redirect('/simLists')->with('pesan', 'Data deleted successfully');
    }
}
