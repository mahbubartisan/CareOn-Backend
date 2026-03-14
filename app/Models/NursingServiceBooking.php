<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NursingServiceBooking extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'selected_services' => 'array',
    ];

    public function patient()
    {
        return $this->hasOne(NursingPatient::class, 'booking_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
