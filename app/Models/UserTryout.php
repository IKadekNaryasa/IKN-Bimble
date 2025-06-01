<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserTryout extends Model
{
    /** @use HasFactory<\Database\Factories\UserTryoutFactory> */
    use HasFactory;
    public $incrementing = false;
    public $keyType = 'string';
    public $fillable = ['user_id', 'tryout_id', 'strated_at', 'finished_at', 'score'];

    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            if (empty($model)) {
                $model->id = Str::uuid()->toString();
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tryout()
    {
        return $this->belongsTo(Tryout::class);
    }
}
