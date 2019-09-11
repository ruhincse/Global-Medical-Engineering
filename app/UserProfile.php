<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserProfile extends Model
{
    protected $table = 'user_profile';
    protected $fillable = [
        'department_id',
        'user_id',
        'designation_id',
        'phone_number',
        'gender',
        'present_address',
        'permanent_address',
        'nid',
        'passport',
        'image',
        'dob',
        'maritial_status',
        'tex_code'
                        ];


    public function user() 
    {
    return  $this->belongsTo('App\User');
    }
}
