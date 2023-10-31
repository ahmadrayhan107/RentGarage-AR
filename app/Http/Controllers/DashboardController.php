<?php

namespace App\Http\Controllers;

use App\Models\Garage;
use App\Models\GarageLocation;
use App\Models\GarageRoom;
use App\Models\Rent;
use App\Models\RentClass;
use App\Models\Renter;
use App\Models\simList;
use App\Models\User;
use App\Models\Vehicle;
use App\Models\VehicleType;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countUser = User::count();
        $countRenter = Renter::count();
        $countVehicleType = VehicleType::count();
        $countVehicle = Vehicle::count();
        $countsimList = simList::count();
        $countRentClass = RentClass::count();
        $countGarageLocation = GarageLocation::count();
        $countGarageRoom = GarageRoom::count();
        $countGarage = Garage::count();
        $countRent = Rent::count();

        return view('backend.dashboard.dashboard', [
            'countUser' => $countUser,
            'countRenter' => $countRenter,
            'countVehicleType' => $countVehicleType,
            'countVehicle' => $countVehicle,
            'countsimList' => $countsimList,
            'countRentClass' => $countRentClass,
            'countGarageLocation' => $countGarageLocation,
            'countGarageRoom' => $countGarageRoom,
            'countGarage' => $countGarage,
            'countRent' => $countRent,
        ]);
    }
}
