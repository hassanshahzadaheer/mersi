<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditReport extends Model
{
    protected $fillable = [
        'business_profile_id',
        'type',
        'file_path',
        'status',
    ];

    public function businessProfile()
    {
        return $this->belongsTo(SurveyBusinessProfile::class);
    }
}
