<?php

namespace Database\Seeders;

use App\Models\Alat;
use Illuminate\Database\Seeder;

class AlatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Sinkronisasi master data alat kesehatan Anisa Medika (Tepat 8 produk katalog frontend).
     */
    public function run(): void
    {
        $masterAlats = [
            [
                'kode_alat'  => 'ALK-001',
                'nama_alat'  => 'Tensimeter Digital Otomatis (Sphygmomanometer)',
                'kategori'   => 'Alat Diagnostik',
                'stok'       => 24,
                'status'     => 'Tersedia',
                'lokasi_lab' => 'Poli Pemeriksaan Umum & IGD',
                'lokasi'     => 'Poli Pemeriksaan Umum & IGD',
                'merek'      => 'Omron Healthcare',
                'tahun'      => '2024',
                'deskripsi'  => 'Alat pengukur tekanan darah digital akurasi tinggi dengan teknologi manset otomatis IntelliSense dan memori 90 riwayat pemeriksaan.',
            ],
            [
                'kode_alat'  => 'ALK-002',
                'nama_alat'  => 'Stetoskop Kardiologi Littmann Classic III Precision',
                'kategori'   => 'Alat Diagnostik',
                'stok'       => 18,
                'status'     => 'Tersedia',
                'lokasi_lab' => 'Poli Jantung & Spesialis Paru',
                'lokasi'     => 'Poli Jantung & Spesialis Paru',
                'merek'      => '3M Littmann',
                'tahun'      => '2023',
                'deskripsi'  => 'Instrumen akustik sensitivitas tinggi untuk auskultasi suara denyut jantung, paru, dan vaskular dengan diafragma tunable dua sisi.',
            ],
            [
                'kode_alat'  => 'ALK-003',
                'nama_alat'  => 'Pulse Oximeter Fingertip Digital OLED SpO2',
                'kategori'   => 'Monitoring Pasien',
                'stok'       => 30,
                'status'     => 'Tersedia',
                'lokasi_lab' => 'Ruang Rawat Inap & ICU',
                'lokasi'     => 'Ruang Rawat Inap & ICU',
                'merek'      => 'ChoiceMMed',
                'tahun'      => '2024',
                'deskripsi'  => 'Alat pemantau saturasi oksigen darah (SpO2) dan denyut nadi real-time via klip ujung jari pasien dengan layar OLED 4 arah.',
            ],
            [
                'kode_alat'  => 'ALK-004',
                'nama_alat'  => 'Automated External Defibrillator (AED) Smart Lifeguard',
                'kategori'   => 'Emergency & Resusitasi',
                'stok'       => 6,
                'status'     => 'Tersedia',
                'lokasi_lab' => 'Instalasi Gawat Darurat (IGD) & Ambulans',
                'lokasi'     => 'Instalasi Gawat Darurat (IGD) & Ambulans',
                'merek'      => 'Mindray BeneHeart',
                'tahun'      => '2024',
                'deskripsi'  => 'Defibrilator portabel cerdas untuk tindakan resusitasi jantung paru (RJP) pada korban henti jantung dengan panduan suara otomatis dwibahasa.',
            ],
            [
                'kode_alat'  => 'ALK-005',
                'nama_alat'  => 'Kursi Roda Medis Lipat Stainless Steel Ergonomis',
                'kategori'   => 'Perlengkapan Rawat Inap',
                'stok'       => 15,
                'status'     => 'Tersedia',
                'lokasi_lab' => 'Unit Rawat Jalan & Lobi Sentral',
                'lokasi'     => 'Unit Rawat Jalan & Lobi Sentral',
                'merek'      => 'Sella Medical',
                'tahun'      => '2023',
                'deskripsi'  => 'Kursi roda rangka baja tahan karat berlapis krom dengan dudukan empuk ergonomis dan rem ganda untuk mobilitas pasien rumah sakit.',
            ],
            [
                'kode_alat'  => 'ALK-006',
                'nama_alat'  => 'Mesin Ultrasonografi (USG) 4D Color Doppler Digital',
                'kategori'   => 'Alat Diagnostik',
                'stok'       => 4,
                'status'     => 'Tersedia',
                'lokasi_lab' => 'Ruang Radiologi & USG Kebidanan',
                'lokasi'     => 'Ruang Radiologi & USG Kebidanan',
                'merek'      => 'GE Healthcare',
                'tahun'      => '2024',
                'deskripsi'  => 'Sistem sonografi canggih resolusi 4D real-time dengan pencitraan vaskular Color Doppler dan dukungan algoritma reduksi derau speckle.',
            ],
            [
                'kode_alat'  => 'ALK-007',
                'nama_alat'  => 'Mikroskop Laboratorium Binokuler Elektrik LED High-Res',
                'kategori'   => 'Alat Laboratorium Medis',
                'stok'       => 8,
                'status'     => 'Tersedia',
                'lokasi_lab' => 'Laboratorium Patologi & Hematologi',
                'lokasi'     => 'Laboratorium Patologi & Hematologi',
                'merek'      => 'Olympus Medical',
                'tahun'      => '2023',
                'deskripsi'  => 'Mikroskop riset biomedis binokuler dengan pencahayaan LED dingin Kohler illumination dan lensa objektif akromatik perbesaran hingga 1600x.',
            ],
            [
                'kode_alat'  => 'ALK-008',
                'nama_alat'  => 'Medical Suction Unit Portable High Vacuum Aspirator',
                'kategori'   => 'Alat Bedah & Operasi',
                'stok'       => 7,
                'status'     => 'Tersedia',
                'lokasi_lab' => 'Kamar Operasi (OK) & Ruang Tindakan Bedah',
                'lokasi'     => 'Kamar Operasi (OK) & Ruang Tindakan Bedah',
                'merek'      => 'Yuwell Medical',
                'tahun'      => '2024',
                'deskripsi'  => 'Pompa hisap cairan medis bervakum tinggi untuk aspirasi darah, dahak, dan mukus selama tindakan bedah darurat dengan botol anti-pecah.',
            ],
        ];

        // Bersihkan dan sinkronkan tepat 8 item sesuai katalog frontend
        Alat::truncate();

        foreach ($masterAlats as $data) {
            Alat::create($data);
        }
    }
}
