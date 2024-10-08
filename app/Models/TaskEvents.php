<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskEvents extends Model
{
    use HasFactory;
    protected $table = 'taskevents';

    protected $fillable = [
        'user_id',
        'eventName',
        'eventDate',
        'eventRepeat',
        'eventType'
    ];





}
