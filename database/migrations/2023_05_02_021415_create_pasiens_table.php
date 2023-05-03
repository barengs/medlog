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
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('no_pasien');
            $table->string('nama_depan');
            $table->string('nama_belakang')->nullable();
            $table->enum('jenis_kelamin', ['pria', 'wanita']);
            $table->string('no_ktp');
            $table->string('alamat');
            $table->string('no_hp')->nullable();
            $table->unsignedBigInteger('village_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasiens');
    }
};
