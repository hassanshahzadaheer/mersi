<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('survey_evaluations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('business_profile_id');
            $table->unsignedBigInteger('question_id');
            $table->text('response');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('business_profile_id')
                ->references('id')
                ->on('survey_business_profiles')
                ->onDelete('cascade');

            $table->foreign('question_id')
                ->references('id')
                ->on('survey_questions')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey_evaluations');
    }
};
