<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class weeklySchedule extends Model
{
    use HasFactory;

    public function weekDay()
    {
        return $this->belongsTo(WeekDay::class, 'day_id');
    }

    public function therapy()
    {
        return $this->belongsTo(Therapy::class, 'therapy_id');
    }

}
