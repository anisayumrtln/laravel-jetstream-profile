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
        Schema::create('alats', function (Blueprint $table) {
            $table->id();
            $table->string('kode_alat', 50)->unique();
            $table->string('nama_alat', 150);
            $table->string('kategori', 100);
            $table->integer('stok')->default(0);
            $table->string('status', 50)->default('Tersedia');
            $table->string('lokasi_lab', 100)->nullable();
            $table->text('deskripsi')->nullable();
            $table->string('tahun', 10)->nullable();
            $table->string('merek', 60)->nullable();
            $table->string('lokasi', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alats');
    }
};
