<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    protected $table = 'employment_types';
    protected $fillable = ['name','description','code'];
}
