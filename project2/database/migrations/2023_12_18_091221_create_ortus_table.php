<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\DegreeEnums;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ortus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');

            $table->string('dname')->nullable();
            $table->string('djob')->nullable();
            $table->enum('ddegree', DegreeEnums::$ENTRIES)->default('TIDAK SEKOLAH');
            $table->string('daddress')->nullable();
            $table->string('dphone')->nullable();

            $table->string('mname')->nullable();
            $table->string('mjob')->nullable();
            $table->enum('mdegree', DegreeEnums::$ENTRIES)->default('TIDAK SEKOLAH');
            $table->string('maddress')->nullable();
            $table->string('mphone')->nullable();

            $table->string('wname')->nullable();
            $table->string('wjob')->nullable();
            $table->enum('wdegree', DegreeEnums::$ENTRIES)->default('TIDAK SEKOLAH');
            $table->string('waddress')->nullable();
            $table->string('wphone')->nullable();

            $table->timestamps();

            $table->foreign('siswa_id')->references('id')->on('siswas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ortus');
    }
};
