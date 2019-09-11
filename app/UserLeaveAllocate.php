<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLeaveAllocate extends Model
{
    protected $table = 'user_leave_allocate';
    protected $fillable = ['user_id','leave_id'];

    protected $casts = [
        'leave_id' => 'array',
    ];
}
