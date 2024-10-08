<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class  UserRole extends Model
{
    use HasFactory;
    protected $table = 'user_role';
    protected $fillable = [
        
        'user_id',
        'role',
        'Edit_Password',
        'View_Exception_Reports',
        'Document_Repository_Access',
        'Promoters_Vault_Access',
        'Coming_Soon_Access',
        'Role_Access',
        'Trash_Panel_Access',
        'is_deleted'
        
        
    ];

   
}
