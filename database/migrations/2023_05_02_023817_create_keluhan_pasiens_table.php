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
        Schema::create('keluhan_pasiens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('checkup_id');
            $table->string('keluhan');
            $table->string('lama_keluhan')->default(1);
            $table->enum('satuan', ['jam', 'hari', 'minggu', 'bulan'])->default('hari');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('checkup_id')->references('id')->on('checkups')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keluhan_pasiens');
    }
};
