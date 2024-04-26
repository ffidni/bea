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
        Schema::create('transkip_nilai', function (Blueprint $table) {
            $table->id("nilai_id");
            $table->unsignedBigInteger("mahasiswa_id");
            $table->foreign("mahasiswa_id")->references("mahasiswa_id")->on("mahasiswa")->cascadeOnDelete();
            $table->float("nilai_semester1");
            $table->float("nilai_semester2");
            $table->float("nilai_semester3");
            $table->float("nilai_semester4");
            $table->float("nilai_semester5");
            $table->float("nilai_semester6");
            $table->float("nilai_semester7");
            $table->float("nilai_semester8");
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("updated_at")->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transkip_nilai');
    }
};
