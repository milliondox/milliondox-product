<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyDownload extends Model
{
    use HasFactory;
    protected $table = 'keydownloads';
    protected $fillable = ['file_status', 'client_id'];
}
