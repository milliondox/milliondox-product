<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StoreBankDoc extends Model
{
    use HasFactory;
    protected $table = 'store_bank_doc';
    protected $fillable = [
        
        
        'file_type',
        'file_name',
        'real_file_name',
        'file_path',
        'file_size',
        'user_name',
        'user_id'
    ];

   
}