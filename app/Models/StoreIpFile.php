<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StoreIpFile extends Model
{
    use HasFactory;
    protected $table = 'store_ip_file';
    protected $fillable = [
        
        'status',
        'file_type',
        'file_name',
        'real_file_name',
        'file_path',
        'file_size',
        'user_name',
        'activities',
        'reason_for_change',
        'update_dates'
       
    ];

   
}
