<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_room',
        'checkIn_date',
        'checkOut_date',
        'payment',
    ];

    // Define a relationship to the Room model
    public function room()
    {
        return $this->belongsTo(Room::class, 'name_room', 'name_room');
    }
}
