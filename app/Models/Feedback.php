<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    
    protected $table = 'feedback';
    
    protected $fillable = [
        'user_id',
        'role',
        'feedback_message',
        'real_file_name',
        'file_type',
        'file_path',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'file_size' => 'integer',
    //     'user_id' => 'integer',
    //     'fyear' => 'integer',
    //     'update_dates' => 'datetime',
    //     'is_delete' => 'boolean',
    //     'created_at' => 'datetime',
    //     'updated_at' => 'datetime',
    // ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     * 
     * 
     */
    public $timestamps = true;
    
    
    
}
