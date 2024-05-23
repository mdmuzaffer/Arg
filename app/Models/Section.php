<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

     public function users()
    {
        return $this->belongsToMany(User::class, 'user_sections_mapings', 'section_id', 'user_id');
    }
    
}