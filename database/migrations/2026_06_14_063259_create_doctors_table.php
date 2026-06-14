<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('doctors', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('title');
            $table->string('email')->nullable();
            $table->string('mobile_phone')->nullable();
            $table->string('office_phone')->nullable();
            $table->string('bio')->nullable();
            $table->string('image')->nullable();
            $table->string('education')->nullable();
            $table->string('board_certifications')->nullable();
            $table->string('field_of_expertise')->nullable();
            $table->string('years_of_experience')->nullable();
            $table->string('quote')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('Updated_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
