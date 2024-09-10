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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('photo_customer')->nullable();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('sub_destination_id')->nullable();
            $table->string('review')->nullable();
            $table->string('documentation')->nullable();
            $table->timestamps();

            $table->foreign('sub_destination_id')->references('id')->on('sub_destinations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
