<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestionCategory extends Model
{
    protected $fillable = ['name'];

    public function questions()
    {
        return $this->hasMany(SurveyQuestion::class, 'category_id');
    }
}
