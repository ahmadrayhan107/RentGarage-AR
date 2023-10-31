<?php

namespace App\Http\Controllers;

use App\Models\Garage;
use App\Models\RentClass;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $rentClasses = RentClass::all();
        $garages = Garage::where('status', 1)->get();
        return view('frontend.home.contents.index', [
            'rentClasses' => $rentClasses,
            'garages' => $garages,
        ]);
    }
}
