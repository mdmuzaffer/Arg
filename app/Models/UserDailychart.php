<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDailychart extends Model
{
    use HasFactory;

    public function department()
    {
        return $this->belongsTo(Department::class)->select('id', 'name');
    }

    public function patient()
    {
        return $this->belongsTo(User::class,'patient_id','id')->select('id', 'name','email','mobile_no','status')->where('role', '4');
    }

    public function therapy()
    {
        return $this->belongsTo(Therapy::class)->select('id', 'therapy_name','department_id','group_id','start_time','end_time','therapist_id','section_id','is_default','is_language','default_venue', 'app_type', 'status');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class,'doctor_id','user_id')->select('id','user_id','firstname','lastname');
    }

    public function intern()
    {
        return $this->belongsTo(Intern::class,'intern_id','id')->select('id','firstname','lastname');
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class,'venue_id','id')->select('id','name', 'longitude', 'latitude');
    }

    public function therapist()
    {
        return $this->belongsTo(Therapist::class,'therapist_id','id')->select('id','firstname','lastname');
    }

    public function scopeSearchBytherapyName($query, $filter)
    {   
        if(!empty($filter)){

            if(isset($filter['search']) && $filter['search'] !=""){
                $query->whereHas('therapy', function ($query) use($filter){
                    $query->where('therapy_name', 'like', '%' . $filter['search'] . '%');
                });
            }

            if(isset($filter['therapy-date']) && $filter['therapy-date'] !=""){
                $query->where('date', $filter['therapy-date']);
            }

        }
        return $query;
    }

}
