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
        Schema::create('letters', function (Blueprint $table) {
            $table->id();
            $table->string('no_pengajuan')->unique();
            $table->string('jenis_surat');
            $table->foreignId('pemohon')->constrained('users')->onDelete('cascade');
            $table->string('nik');
            $table->date('tanggal');
            $table->enum('status', ['menunggu', 'diproses', 'selesai'])->default('menunggu');
            $table->string('nomor_surat')->nullable();
            $table->string('file_surat')->nullable();
            $table->string('tiket_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letters');
    }
};

