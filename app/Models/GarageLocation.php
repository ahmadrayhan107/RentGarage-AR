<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GarageLocation extends Model
{
    use HasFactory;
    protected $fillable = ['street_name', 'address_number', 'city', 'province', 'postal_code'];
}
