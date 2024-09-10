<?php

use App\Enums\GenderEnums;
use App\Enums\ReligionEnums;
use App\Enums\SiswaStatusEnums;
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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id')->unique();
            
            $table->string('nisn')->unique()->nullable();
            $table->string('nama')->nullable();
            $table->string('pob')->nullable();
            $table->date('dob')->nullable();
            $table->enum('religion', ReligionEnums::$ENTRIES)->nullable();
            $table->enum('gender', GenderEnums::$ENTRIES)->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('address')->nullable();
            $table->string('schorigin')->nullable();
            $table->string('note')->nullable();
            $table->enum('status', SiswaStatusEnums::$ENTRIES)->default('NOT VERIFIED');
            $table->string('verified_by')->nullable();
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
