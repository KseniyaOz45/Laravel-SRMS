<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ServiceType extends Model
{
    //
    protected $table = 'ServiceTypes';
    protected $fillable = ['name'];

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
