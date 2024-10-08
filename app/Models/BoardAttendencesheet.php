<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BoardAttendencesheet extends Model
{
    use HasFactory;
    protected $table = 'board_as';
    protected $fillable = [
        
        'file_status',
        'unique_tb_id',
        'file_type',
        'file_name',
        'real_file_name',
        'file_path',
        'file_size',
        'user_name',
        'user_id',
        'activities',
        'reason_for_change',
        'update_dates',
        'fyear',
        'Month',
        'Tags',
        'location',
        'is_delete'
    ];

   
}
