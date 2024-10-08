<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class UserInfo extends Model
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    protected $fillable = [
        'user_id',
        'phone',
        'email',
        'password',
        'role',
        'name',
        'plan_type',
        'name_of_the_business',
        'industry',
        'employees',
        'cin_no',
        'dece',
        'brand_name',
        'client_correspondence_address',
        'client_registered_office_address',
        'authorised_signatory_name',
       
        'personal_email_id',
        'designation',
        'department',
        'joining_date',
        'immediate_reporting_manager',
        'profile_picture',
        'correspondence_address_employee',
        'permanent_address_employee',
        'aadhar_number_employee',
        'appointment_letter',
        'increment_letter',
        'kra_docs',
        'policy_manuals',
        'gst_document',
        'pan_document',
        'tan_document',
        'user_status',
        'other_designation',
        'other_industry',
        'legal_entity',
        'other_legal_entity',
        'phoneone',
        'backupemail',
        'video_status',
        'user_name',
        'is_delete',
        'address_proof_document',
        'Edit_Password',
        'View_Exception_Reports',
        'Document_Repository_Access',
        'Promoters_Vault_Access',
        'Coming_Soon_Access',
        'Role_Access',
        'Trash_Panel_Access',
        'main_role_id',
        'google_id',
        'createdby_id',
        'CIN',
        'PAN',
        'state',
        'authorized_capital',
        'paid_up_capital'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
