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
        Schema::create('gaji', function (Blueprint $table) {
            $table->id();
            $table->string('no_slip');
            $table->date('slip_date');
            
            // Menambahkan kolom-kolom dari tabel pegawais
            $table->unsignedBigInteger('pegawai_id');
            $table->string('nama_pegawai');
            $table->unsignedBigInteger('position_id')->default(0);
            $table->string('golongan');
            $table->string('status_perkawinan');
            
            // Menambahkan kolom dari tabel tunjangans
            $table->string('tunjangan');
            $table->integer('besar_tunjangan');
            
            // Menambahkan kolom gaji_kotor dan gaji_bersih
            $table->integer('gaji_kotor')->default(0);
            $table->integer('gaji_bersih')->default(0);
            
            $table->timestamps();

            // Menambahkan foreign key constraint
            $table->foreign('pegawai_id')->references('id')->on('pegawais');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gaji');
    }
};

