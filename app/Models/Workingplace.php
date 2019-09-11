<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workingplace extends Model
{
 
    protected $table = 'working_places';
    protected $fillable = ['name','description','code','divison_id'];
}
