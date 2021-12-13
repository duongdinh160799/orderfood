<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedbacks extends Model
{
    use HasFactory;
    public function feedback_details() {
        return $this->hasMany('App\Models\FeedbackDetails');
    }
}
