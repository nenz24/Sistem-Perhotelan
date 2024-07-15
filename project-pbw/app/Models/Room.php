<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = ['name_room', 'type_room'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'name_room', 'name_room');
    }
}
