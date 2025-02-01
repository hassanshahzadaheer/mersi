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
        'company_website',
        'company_phone_number',
        'company_industry',
        'service_request_type',
    ];
}
