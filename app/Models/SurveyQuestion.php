<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestion extends Model
{
    protected $fillable = ['category_id', 'question', 'options'];

    public function category()
    {
        return $this->belongsTo(SurveyQuestionCategory::class, 'category_id');
    }

    public function evaluations()
    {
        return $this->hasMany(SurveyEvaluation::class, 'question_id');
    }
}
