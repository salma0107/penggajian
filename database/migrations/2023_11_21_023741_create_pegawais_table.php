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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('no_pegawai');
            $table->string('nama_pegawai');
            $table->string('email');
            $table->string('alamat');
            $table->unsignedBigInteger('position_id')->default(0);
            $table->unsignedBigInteger('divise_id')->default(0);
            $table->string('golongan');
            $table->string('status_perkawinan');
            $table->string('no_rekening');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
