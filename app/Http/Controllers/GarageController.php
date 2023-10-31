<?php

namespace App\Http\Controllers;

use App\Models\Garage;
use Illuminate\Http\Request;

class GarageController extends Controller
{
    public function index(String $id)
    {
        $garage = Garage::find($id);
        return view('frontend.inner-page.content.garage-detail', ['garage' => $garage]);
    }
}
