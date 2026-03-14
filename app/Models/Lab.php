<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function testPrices()
    {
        return $this->hasMany(LabWiseTestPrice::class, 'lab_id');
    }

    public function media()
    {
        return $this->belongsTo(Media::class, 'photo', 'id');
    }
}
