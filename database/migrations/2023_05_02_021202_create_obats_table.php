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
        Schema::create('obats', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('nama');
            $table->date('kadaluwarsa')->nullable();
            $table->string('keterangan');
            $table->bigInteger('stok');
            $table->unsignedBigInteger('kategori_obat_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('kategori_obat_id')->references('id')->on('kategori_obats')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obats');
    }
};
