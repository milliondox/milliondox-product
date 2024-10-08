<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminEventCal extends Model
{
    use HasFactory;
    protected $table = 'admin_events_cal'; // Specify the table name if it's different from the model name

    protected $fillable = [
        'eventName',
        'eventDate',
       
        'repeat',
        'eventType',
        
        
    ];
}
