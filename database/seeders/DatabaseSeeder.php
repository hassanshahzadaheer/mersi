<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Mersi',
            'email' => 'mersi@gmail.com',
            'password' => bcrypt('Pa$$w0rd!'),
        ]);

        $this->call(SurveyBusinessProfilesSeeder::class);
        $this->call(SurveyQuestionCategoriesSeeder::class);
        $this->call(SurveyQuestionsSeeder::class);
    }
}
