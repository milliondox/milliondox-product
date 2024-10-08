<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InnerINC9  extends Model
{
    use HasFactory;
    protected $table = 'inner_inc9';
    protected $fillable = [
        
        'file_status',
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
        'is_delete'
    ];

   
}
