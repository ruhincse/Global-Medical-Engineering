<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalarySettings extends Model
{
   protected $table = 'salary_settings';
   protected $fillable =['user_id','total_salary','basic_salary','house_rent','provident_fund','dinning_allowances'
,'medical_allowances', 'transport_allowances','mobile_allowances'];
}
