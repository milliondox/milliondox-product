<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerContract extends Model
{
    use HasFactory;

    protected $table = 'customercontracttb';

    protected $fillable = [
        'file_name',
        'file_path',
        'file_size',
        'contract_name',
        'contracttype',
        'contract_type',
        'division',
        'startdate',
        'startend',
        'contract_value',
        'signing_status',
        'renewal_terms',
        'payment_terms',
        'fee_escalation_clause',
        'customer_id',
        'is_drafted',
    ];
}
