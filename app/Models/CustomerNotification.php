<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerNotification extends Model
{
    use HasFactory;
    protected $table = 'customer_notifications'; // Define the table name

    // The attributes that are mass assignable
    protected $fillable = ['customer_email', 'message', 'contract_name', 'notification_type'];
}
