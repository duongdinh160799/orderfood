<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function order_details() {
        return $this->hasMany('App\Models\OrderDetail');
    }
    public function users(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
