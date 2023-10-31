<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rent extends Model
{
    use HasFactory;
    protected $fillable = ['renter_id', 'vehicle_id', 'sim_id', 'garage_id', 'begin_time', 'begin_date', 'end_time', 'end_date'];

    public function renter():BelongsTo
    {
        return $this->belongsTo(Renter::class);
    }

    public function vehicle():BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function simList():BelongsTo
    {
        return $this->belongsTo(simList::class, 'sim_id');
    }

    public function garage():BelongsTo
    {
        return $this->belongsTo(Garage::class);
    }
}
