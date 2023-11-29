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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->string('no_slip');
            $table->date('slip_date');

            // dari tabel pegawai
            $table->string('pegawai_id')->default(0);
            $table->string('nama_pegawai')->default(0);
            $table->string('email')->default(0);
            $table->string('golongan')->default(0);
            $table->string('status_perkawinan')->default(0);
            $table->unsignedBigInteger('divise_id')->default(0);
             
            // dari tabel position
            $table->unsignedBigInteger('position_id')->default(0);
            $table->integer('gaji_pokok')->default(0);

            $table->integer('gaji_bersih');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
