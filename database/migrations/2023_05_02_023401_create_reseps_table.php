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
        Schema::create('reseps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('obat_id');
            $table->unsignedBigInteger('checkup_id');
            $table->string('aturan');
            $table->enum('satuan', ['jam', 'hari', 'minggu']);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('obat_id')->references('id')->on('obats')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('checkup_id')->references('id')->on('checkups')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reseps');
    }
};
