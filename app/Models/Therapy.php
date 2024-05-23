<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Therapy extends Model
{
    use HasFactory, Sortable;

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id')->select('id', 'name','department_id','status');
    }

    public function therapyDepartment(){
        
        return $this->belongsTo(Department::class,'department_id','id')->select('id', 'name');
    }



    public function scopeSearch($query, $filter)
    {
        if(!empty($filter)){

            if(isset($filter['department']) && $filter['department'] !=""){
                $query->where('department_id', $filter['department']);
            }


            if(isset($filter['search']) && $filter['search'] !=""){
                $query->where(function ($query) use($filter) {
                    $query->where('therapy_name', 'like', '%' . $filter['search'] . '%');
                        //->orWhere('email', 'like', '%' . $filter['search'] . '%');
                });
            }
            
        }

        return $query;

    }
}
