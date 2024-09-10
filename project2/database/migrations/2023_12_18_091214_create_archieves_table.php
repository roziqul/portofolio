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
        Schema::create('archieves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->string('foto')->unique()->nullable();
            $table->string('akta')->unique()->nullable();
            $table->string('kk')->unique()->nullable();
            $table->string('skl')->unique()->nullable();
            $table->string('nisn')->unique()->nullable();
            $table->string('raport1')->unique()->nullable();
            $table->string('raport2')->unique()->nullable();
            $table->string('raport3')->unique()->nullable();
            $table->string('raport4')->unique()->nullable();
            $table->string('raport5')->unique()->nullable();
            $table->timestamps();

            $table->foreign('siswa_id')->references('id')->on('siswas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archieves');
    }
};
