<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member  extends Model
{
    use HasFactory;
    protected $table = 'members'; // Specify the table name if it's different from the model name

    protected $fillable = [
        'fname', 'lname', 'email', 'password', 'phone', 'personal_email_id', 'role', 'profile_picture', 'emp_id','main_role_id','createdby_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
