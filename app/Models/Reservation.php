<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $table = 'reservations';
    protected $fillable = ['client_id', 'service_id', 'personal_id', 'batch_number'];
}
