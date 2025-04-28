<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    //
    use HasFactory;

    protected $table = 'schedules';
    protected $fillable = ['personal_id', 'day_of_week', 'start_time', 'end_time',
        'lunch_start_time', 'lunch_end_time', 'is_day_off'];

    public function personal(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
