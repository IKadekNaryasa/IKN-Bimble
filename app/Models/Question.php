<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    /** @use HasFactory<\Database\Factories\QuestionFactory> */
    use HasFactory;
    public $incrementing = false;
    public $keyType = 'string';
    public $fillable = ['tryout_id', 'quetion_a', 'question_b', 'question_c', 'question_d', 'question_e', 'correct_answer'];

    protected static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            if (empty($model)) {
                $model->id = Str::uuid()->toString();
            }
        });
    }

    public function tryout()
    {
        return $this->belongsTo(Tryout::class);
    }

    public function userAnswer()
    {
        return $this->hasMany(UserAnswer::class);
    }
}
