<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientProfile extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id', 
        'language_id',
    ];


    public function department(){
        return $this->belongsTo(Department::class)->select('id','name','description','icon','status');
    }

    public function section(){
        return $this->belongsTo(Section::class)->select('id','name','description');
    }

    public function userSectionsMappings()
    {
        return $this->hasOne(UserSectionsMapping::class, 'user_id')->where('is_active',1);
    }


    // Now state added menu in input field so it removed 
/*    public function state()
    {
        return $this->belongsTo(State::class)->select('id','state_name','status');
      
    }*/

    public function language()
    {
        return $this->belongsTo(Language::class)->select(['id','name', 'shortname']);
    }

    public function accommodation()
    {
        return $this->belongsTo(Accommodation::class,'accomudation_id')->select(['id','name', 'description','status']);
    }

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id')->select(['id', 'shortname', 'name', 'phone_code','status']);
    }


}
