<?php

use App\Enums\SeleksiStatusEnums;
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
        Schema::create('seleksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('daftar_id');
            $table->unsignedBigInteger('siswa_id');
            $table->string('point')->nullable();
            $table->enum('status', SeleksiStatusEnums::$ENTRIES)->default('MENUNGGU PROSES SELEKSI');
            $table->timestamps();

            $table->foreign('daftar_id')->references('id')->on('pendaftarans');
            $table->foreign('siswa_id')->references('id')->on('siswas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seleksis');
    }
};
