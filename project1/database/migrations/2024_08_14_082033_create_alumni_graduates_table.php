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
        Schema::create('alumni_graduates', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->string('name')->nullable();
            $table->string('accepted_at')->nullable();
            $table->string('accepted_desc')->nullable();
            $table->integer('year')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni_graduates');
    }
};
