<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;
    public $incrementing = false;
    public $keyType = 'string';
    public $fillable = ['name'];


    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            if (empty($model)) {
                $model->id = Str::uuid()->toString();
            }
        });
    }

    public function material()
    {
        return $this->hasMany(Material::class);
    }

    public function tryout()
    {
        return $this->hasMany(Tryout::class);
    }
}
