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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id("pendaftaran_id");
            $table->unsignedBigInteger("mahasiswa_id");
            $table->unsignedBigInteger("jenis_beasiswa_id");
            $table->foreign("mahasiswa_id")->references("mahasiswa_id")->on("mahasiswa")->cascadeOnDelete();
            $table->foreign("jenis_beasiswa_id")->references("jenis_beasiswa_id")->on("jenis_beasiswa")->cascadeOnDelete();
            $table->integer("semester");
            $table->float("ipk");
            $table->string("berkas", 200);
            $table->enum("status_ajuan", ["verifing", "verified"]);
            $table->timestamp("created_at")->useCurrent();
            $table->timestamp("updated_at")->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
