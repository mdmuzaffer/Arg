<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'platform',
        'ip',
        'location',
        'login_date',
        'logout_date',
        'duration',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id')->select('id','name','email');
    }

}
