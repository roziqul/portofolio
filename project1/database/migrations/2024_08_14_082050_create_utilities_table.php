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
        Schema::create('utilities', function (Blueprint $table) {
            $table->id();
            $table->string('school_logo')->nullable();
            $table->string('school_name')->nullable();
            $table->string('school_address')->nullable();
            $table->string('school_email')->nullable();
            $table->string('school_website')->nullable();
            $table->string('school_contact')->nullable();
            $table->longText('school_vision')->nullable();
            $table->longText('school_mission')->nullable();
            $table->longText('school_goal')->nullable();
            $table->longText('school_description')->nullable();
            $table->longText('school_photo')->nullable();
            $table->string('school_motto')->nullable();
            $table->integer('total_class')->nullable();
            $table->integer('total_student')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('utilities');
    }
};
