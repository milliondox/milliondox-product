<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorizeManagement extends Model
{
    use HasFactory;

    protected $table = 'authorize_management';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'division_id',
        'auth_user_id',
        'image_path',
        'sign_image_path',
    ];

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id');
    }
}
