<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinPresence extends Model
{
    use HasFactory;

    protected $table = 'min_presence';

    protected $fillable = [
        'id_worker',
        'no_month',
        'min_pres'
    ];

    // Define the relationship to the Worker model
    public function worker()
    {
        return $this->belongsTo(Worker::class, 'id_worker');
    }
}
