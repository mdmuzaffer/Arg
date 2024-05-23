<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeekDay extends Model
{
    use HasFactory;

    public function weeklySchedules()
    {
        return $this->hasMany(WeeklySchedule::class, 'day_id')->select('id', 'day_id','therapy_id','therapy_start_time','therapy_end_time');
    }
}

