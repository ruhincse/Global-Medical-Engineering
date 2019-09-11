<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proudct extends Model
{
    
    public function supplier(){
    	return $this->belongsTo('App\Models\Sales_Accounts\Supplier','vendor','id');
    }
}
