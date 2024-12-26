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
        'sign_party1_name',
        'sign_party1_email',
        'sign_party1_phone',
        'sign_party1_sign_path',
        'sign_party2_name',
        'sign_party2_email',
        'sign_party2_phone',
        'sign_party2_image_path',
        'sign_party2_sign_path',

    ];
}
