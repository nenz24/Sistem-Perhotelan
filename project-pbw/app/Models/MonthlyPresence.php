<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyPresence extends Model
{
    use HasFactory;

    protected $table = 'monthly_presence';

    protected $fillable = [
        'id_worker',
        'date',
        'no_month',
        'status_pres'
    ];

    // Define the relationship to the Worker model
    public function worker()
    {
        return $this->belongsTo(Worker::class, 'id_worker');
    }
}
