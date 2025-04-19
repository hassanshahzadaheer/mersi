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

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


            $table->string('company_name');
            $table->string('company_website')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('company_phone_number')->nullable();
            $table->string('company_industry');
            $table->enum('service_request_type', [
                'Process/Operations Optimization',
                'Quality Assurance & Compliance',
                'Project Management Excellence',
                'CMMI for Service (SVC)',
                'CMMI for Development (DEV)',
                'ISO 9001: 2015 Quality Management System',
                'ISO 27001 Information Security Management System',
                'ISO 20000-1 IT Service Management System',
                'ISO 45001 Occupational Health and Safety',
                'Other'
            ]);

            $table->timestamps();
            $table->softDeletes();
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
