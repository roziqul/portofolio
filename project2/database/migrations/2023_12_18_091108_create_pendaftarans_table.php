<?php

use App\Enums\PendaftaranStatusEnums;
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
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->string('raport_avg')->nullable();
            $table->string('subject_avg')->nullable();
            $table->string('agm_avg')->nullable();
            $table->string('raport1')->nullable();
            $table->string('raport2')->nullable();
            $table->string('raport3')->nullable();
            $table->string('raport4')->nullable();
            $table->string('raport5')->nullable();
            $table->string('agm1')->nullable();
            $table->string('agm2')->nullable();
            $table->string('agm3')->nullable();
            $table->string('agm4')->nullable();
            $table->string('agm5')->nullable();
            $table->string('ind1')->nullable();
            $table->string('ind2')->nullable();
            $table->string('ind3')->nullable();
            $table->string('ind4')->nullable();
            $table->string('ind5')->nullable();
            $table->string('mat1')->nullable();
            $table->string('mat2')->nullable();
            $table->string('mat3')->nullable();
            $table->string('mat4')->nullable();
            $table->string('mat5')->nullable();
            $table->string('ipa1')->nullable();
            $table->string('ipa2')->nullable();
            $table->string('ipa3')->nullable();
            $table->string('ipa4')->nullable();
            $table->string('ipa5')->nullable();
            $table->string('ing1')->nullable();
            $table->string('ing2')->nullable();
            $table->string('ing3')->nullable();
            $table->string('ing4')->nullable();
            $table->string('ing5')->nullable();
            $table->string('point')->nullable();
            $table->enum('status', PendaftaranStatusEnums::$ENTRIES)->default('NOT VERIFIED');
            $table->timestamps();

            $table->foreign('siswa_id')->references('id')->on('siswas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
