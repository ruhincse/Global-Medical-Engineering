<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Leave extends Model
{
    protected $table = 'leaves';
    protected $fillable = ['title','number_of_days'];

    /**
     * This Build a relation to User Model
     * @return many-to-many
     */
    public function users()
    {
        return $this->belongsToMany(User::class,'user_leave_allocate');
    }
}
