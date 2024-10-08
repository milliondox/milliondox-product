<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommonTable extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'common_table';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'activities',
        'file_type',
        'file_name',
        'real_file_name',
        'file_path',
        'file_size',
        'user_name',
        'user_id',
        'file_status',
        'reason_for_change',
        'update_dates',
        'fyear',
        'month',
        'tags',
        'bank_name',
        'is_delete',
        'location',
        'descp',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'file_size' => 'integer',
        'user_id' => 'integer',
        'fyear' => 'integer',
        'update_dates' => 'datetime',
        'is_delete' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
}
