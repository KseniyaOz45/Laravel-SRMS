<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Testimonial extends Model
{
    //
    protected $table = 'testimonials';
    protected $fillable = ['client_id', 'service_id', 'text', 'rating', 'published'];

    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function service(): BelongsTo {
        return $this->belongsTo(Service::class);
    }
}
