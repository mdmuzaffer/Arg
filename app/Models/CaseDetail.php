<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseDetail extends Model
{
    use HasFactory;

     public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->select('id','name','email');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id')->select('id','name','email');
    }
}
