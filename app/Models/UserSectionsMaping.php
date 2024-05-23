<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSectionsMaping extends Model
{
    use HasFactory;

     protected $fillable = ['is_active','user_id','section_id','status',];

    public function patientProfile()
    {
        return $this->belongsTo(PatientProfile::class, 'user_id');
    }

    public function section()
    {
        //return $this->belongsTo(Section::class, 'id', 'section_id');
        return $this->belongsTo(Section::class);
    }
}
