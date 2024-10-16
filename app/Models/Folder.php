<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $fillable = ['name','path','parent_name','user_id','fyear','Month','is_delete','director_id'];
    public function files()
    {
        return $this->hasMany(Files::class);
    }
}
