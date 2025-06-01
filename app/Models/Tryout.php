<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tryout extends Model
{
    /** @use HasFactory<\Database\Factories\TryoutFactory> */
    use HasFactory;
    public $incrementing = false;
    public $keyType = 'string';
    public $fillable = ['category_id', 'name', 'total_question', 'duration'];

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

    public function question()
    {
        return $this->hasMany(Question::class);
    }

    public function UserTryout()
    {
        return $this->hasMany(UserTryout::class);
    }
}
