<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    //
    protected $table = 'reservations';
    protected $fillable = ['client_id', 'service_id', 'personal_id', 'batch_number'];

    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function service(): BelongsTo {
        return $this->belongsTo(Service::class);
    }

    public function personal(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
