<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Therapist extends Model
{
    use HasFactory, Sortable;

    public $sortable = ['id', 'firstname', 'email'];

    public function sections(){
        return $this->belongsTo(Section::class, 'section_id');
    }


    public function scopeSearch($query, $filter)
    {
        if(!empty($filter)){

            if(isset($filter['section']) && $filter['section'] !=""){
                $query->where('section_id', $filter['section']);
            }


            if(isset($filter['search']) && $filter['search'] !=""){
                $query->where(function ($query) use($filter) {
                    $query->where('firstname', 'like', '%' . $filter['search'] . '%')
                        ->orWhere('email', 'like', '%' . $filter['search'] . '%');
                });
            }
            
        }

        return $query;

    }
}
