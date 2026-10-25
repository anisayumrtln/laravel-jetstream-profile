<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('alats', function (Blueprint $table) {
            if (!Schema::hasColumn('alats', 'kode_alat')) {
                $table->string('kode_alat', 50)->nullable()->after('id');
            }
            if (!Schema::hasColumn('alats', 'kategori')) {
                $table->string('kategori', 100)->default('Alat Diagnostik')->after('nama_alat');
            }
            if (!Schema::hasColumn('alats', 'stok')) {
                $table->integer('stok')->default(1)->after('kategori');
            }
            if (!Schema::hasColumn('alats', 'status')) {
                $table->string('status', 50)->default('Tersedia')->after('stok');
            }
            if (!Schema::hasColumn('alats', 'lokasi_lab')) {
                $table->string('lokasi_lab', 100)->nullable()->after('status');
            }
            if (!Schema::hasColumn('alats', 'deskripsi')) {
                $table->text('deskripsi')->nullable()->after('lokasi_lab');
            }
        });

        // Set default kode_alat and values for any existing rows
        $rows = DB::table('alats')->get();
        foreach ($rows as $row) {
            $updates = [];
            if (empty($row->kode_alat)) {
                $updates['kode_alat'] = 'ALK-00' . $row->id;
            }
            if (empty($row->lokasi_lab) && !empty($row->lokasi)) {
                $updates['lokasi_lab'] = $row->lokasi;
            }
            if (!empty($updates)) {
                DB::table('alats')->where('id', $row->id)->update($updates);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alats', function (Blueprint $table) {
            $columnsToDrop = [];
            foreach (['kode_alat', 'kategori', 'stok', 'status', 'lokasi_lab', 'deskripsi'] as $col) {
                if (Schema::hasColumn('alats', $col)) {
                    $columnsToDrop[] = $col;
                }
            }
            if (!empty($columnsToDrop)) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }
};
