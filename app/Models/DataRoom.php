<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataRoom extends Model
{
    protected $table = 'dataroom';
    protected $fillable = ['name','folderpath','user_id','file_type','file_name', 'real_file_name','file_path','file_size','user_name','file_status'];
    public function files()
    {
        return $this->hasMany(Files::class);
    }
}
