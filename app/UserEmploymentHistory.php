<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserEmploymentHistory extends Model
{
    protected $table = 'user_employment_history';
    protected $fillable = [
        'employment_type_id',
        'user_id',
        'leave_id',
        'working_place_id',
        'registration_date',
        'joining_date',
        'increment',
        'increment_date',
        'permanent_date',
        'office_mobile_number',
        'promotion'
                        ];



    public function user() 
    {
    return  $this->belongsTo('App\User');
    }

}
