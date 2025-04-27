<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //
    protected $table = 'schedules';
    protected $fillable = ['personal_id', 'day_of_week', 'start_time', 'end_time',
        'lunch_start_time', 'lunch_end_time', 'is_day_off'];
}
