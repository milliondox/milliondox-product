<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChartedDocument extends Model
{
    use HasFactory;
    protected $table = 'charted_document';

    protected $fillable = [
        'doc_name',
        'upload_datetime',
        'updated_by',
        'updated_last',
        'change_type', 
        'reason_for_change', 
        'folder_name',
        'original_file_name',
        'user_entered_file_name',
        
    ];
   
}
