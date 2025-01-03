<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
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
        'user_onboard',
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
        'paid_up_capital',
        'user_plan',
        'plan_start',
        'plan_expire'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function assignedClients()
{
    return $this->hasMany(Assignment::class, 'client_id');
}

public function assignedEmployees()
{
    return $this->hasMany(Assignment::class, 'employee_id');
}

public function assignments()
{
    return $this->hasMany(Assignment::class, 'employee_id');
}

public function clientProfile()
{
    return $this->hasOne(ClientProfile::class, 'employee_id');
}

public function employeeProfile()
{
    return $this->hasOne(EmployeeProfile::class, 'employee_id');
}

public function timesheets()
{
    return $this->hasMany(Timesheet::class, 'employee_id');
}
public function issues()
{
    return $this->hasMany(Issue::class, 'employee_id');
}
// public function userInfo()
// {
//     return $this->hasOne(UserInfo::class, 'user_id', 'id');
// }
public function userInfo()
{
    return $this->hasOne(UserInfo::class, 'user_id');
}

}
