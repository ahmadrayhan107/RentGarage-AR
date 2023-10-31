<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Garage extends Model
{
    use HasFactory;
    protected $fillable = ['file_upload', 'garageRoom_id', 'garageLocation_id', 'rentClass_id', 'status', 'description'];

    public function garageLocation():BelongsTo
    {
        return $this->belongsTo(GarageLocation::class, 'garageLocation_id');
    }

    public function garageRoom():BelongsTo
    {
        return $this->belongsTo(GarageRoom::class, 'garageRoom_id');
    }

    public function rentClass():BelongsTo
    {
        return $this->belongsTo(RentClass::class, 'rentClass_id');
    }
}
