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
        Schema::create('audit_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_profile_id')->constrained('survey_business_profiles')->onDelete('cascade');
            $table->enum('type', ['preliminary', 'final', 'executive_summary']);
            $table->string('file_path')->nullable();
            $table->enum('status', ['pending', 'ready'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_reports');
    }
};
