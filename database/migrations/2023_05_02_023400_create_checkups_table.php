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
        Schema::create('checkups', function (Blueprint $table) {
            $table->id();
            $table->string('antrian')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('pasien_id');
            $table->enum('penanganan', ['rujuk', 'rawat inap', 'rawat jalan', 'rawat mandiri'])->nullable();
            $table->string('keterangan')->nullable();
            $table->enum('status', ['open', 'proses', 'selesai'])->default('open');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pasien_id')->references('id')->on('pasiens')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkups');
    }
};
