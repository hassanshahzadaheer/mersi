<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SurveyQuestionCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Organizational Purpose',
            'Human Resources and Contracts Operations',
            'Business Development Operations',
            'Marketing & Branding Operations',
            'Data & Technology',
            'Processes & Scalability',
            'Performance & Innovation',
            'Experimentation & Risk-Taking',
            'Governance',
            'Social Technologies & Collaboration'
        ];

        $timestamp = Carbon::now();

        foreach ($categories as $category) {
            DB::table('survey_question_categories')->insert([
                'name' => $category,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ]);
        }
    }
}
