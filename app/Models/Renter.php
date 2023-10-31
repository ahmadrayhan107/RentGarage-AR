<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Renter extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'last_name', 'nik', 'phone_number', 'gender', 'address', 'user_id'];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
