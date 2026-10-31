<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('transaksis')) {
            Schema::create('transaksis', function (Blueprint $table) {
                $table->id();
                $table->string('order_id', 100)->unique();
                $table->string('nama_pelanggan', 150);
                $table->string('email', 150);
                $table->string('telepon', 50)->nullable();
                $table->string('nama_alat', 200);
                $table->unsignedBigInteger('alat_id')->nullable();
                $table->integer('jumlah')->default(1);
                $table->decimal('total_harga', 15, 2);
                $table->string('status', 50)->default('pending');
                $table->string('snap_token', 255)->nullable();
                $table->string('metode_pembayaran', 100)->nullable();
                $table->text('catatan')->nullable();
                $table->timestamps();

                $table->foreign('alat_id')->references('id')->on('alats')->onDelete('set null');
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
