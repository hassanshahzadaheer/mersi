<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyEvaluation extends Model
{
    protected $fillable = ['business_profile_id', 'question_id', 'response'];

    public function question()
    {
        return $this->belongsTo(SurveyQuestion::class, 'question_id');
    }

    public function businessProfile()
    {
        return $this->belongsTo(SurveyBusinessProfile::class, 'business_profile_id');
    }
}
