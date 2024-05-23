<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class)->select('id','name');
    }

    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class)->select('id','name');
    }

    public function paymenmode(){

        return $this->belongsTo(PaymenMode::class, 'type', 'id')->select('id','name');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'department_id', 'id')->select('id','name');
    }
}
