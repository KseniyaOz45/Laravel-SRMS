<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    //
    use HasFactory;

    protected $table = 'services';
    protected $fillable = ['name', 'description', 'duration', 'price', 'image', 'need_personal', 'service_type_id'];

    public function service_type() {
        return $this->belongsTo(ServiceType::class);
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->name); // генерируем slug на основе title
            }
        });
    }
}
