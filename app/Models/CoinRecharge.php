<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoinRecharge extends Model
{
    use HasFactory;
    public function users(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
