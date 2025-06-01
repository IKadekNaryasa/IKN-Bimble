<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    /** @use HasFactory<\Database\Factories\PackageFactory> */
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'string';
    public $fillable = ['name', 'description', 'price'];

    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            if (empty($model)) {
                $model->id = Str::uuid()->toString();
            }
        });
    }
}
