<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stockproduct extends Model
{
    //
    public function product(){
    	return $this->belongsTo(Proudct::class,'pro_id','id');
    }
}
