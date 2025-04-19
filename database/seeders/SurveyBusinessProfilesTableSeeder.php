<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveyBusinessProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('survey_business_profiles')->insert([
            [
                'company_name' => 'Alpha Solutions',
                'company_website' => 'https://alpha.com',
                'contact_person' => 'John Doe',
                'company_phone_number' => '+1234567890',
                'company_industry' => 'IT Services',
                'service_request_type' => 'CMMI for Service (SVC)',
                'user_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'company_name' => 'Beta Innovations',
                'company_website' => 'https://betainnovations.com',
                'contact_person' => 'Jane Smith',
                'company_phone_number' => '+1987654321',
                'company_industry' => 'Manufacturing',
                'service_request_type' => 'ISO 27001 Information Security Management System',
                'user_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'company_name' => 'Gamma Enterprises',
                'company_website' => 'https://gammaent.com',
                'contact_person' => 'Mike Johnson',
                'company_phone_number' => '+1122334455',
                'company_industry' => 'Consulting',
                'service_request_type' => 'ISO 20000-1 IT Service Management System',
                'user_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'company_name' => 'Delta Dynamics',
                'company_website' => 'https://deltadynamics.com',
                'contact_person' => 'Sara Williams',
                'company_phone_number' => '+1444555666',
                'company_industry' => 'Healthcare',
                'service_request_type' => 'ISO 45001 Occupational Health and Safety',
                'user_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'company_name' => 'Epsilon Tech',
                'company_website' => 'https://epsilontech.com',
                'contact_person' => 'Liam Brown',
                'company_phone_number' => '+1777888999',
                'company_industry' => 'Software',
                'service_request_type' => 'Project Management Excellence',
                'user_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],

        ]);
    }
}
