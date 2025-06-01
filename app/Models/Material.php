<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Material extends Model
{
    /** @use HasFactory<\Database\Factories\MaterialFactory> */
    use HasFactory;

    public $incrementing = false;
    public $keyType = 'string';
    public $fillable = ['name', 'category_id', 'file_path'];


    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            if (empty($model)) {
                $model->id = Str::uuid()->toString();
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
