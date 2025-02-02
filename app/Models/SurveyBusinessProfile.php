<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyBusinessProfile extends Model
{
    // Specify the table name
    protected $table = 'survey_business_profiles';

    // Specify the fillable fields
    protected $fillable = [
        'company_name',
        'contact_person',
        'company_website',
        'company_phone_number',
        'company_industry',
        'service_request_type',
    ];


    public function evaluations()
    {
        return $this->hasMany(SurveyEvaluation::class, 'business_profile_id');
    }
}
