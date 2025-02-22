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
        Schema::create('survey_business_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name');
            $table->string('company_website')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('company_phone_number')->nullable();
            $table->string('company_industry');
            $table->enum('service_request_type', [
                'Process/Operations Optimization',
                'Project Management',
                'ISO 9001: 2015',
                'CMMI for Service (SVC)',
                'CMMI for Development (DEV)',
                'Other'
            ]);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey_business_profiles');
    }
};
