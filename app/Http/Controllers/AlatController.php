<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    /**
     * Kategori standar alat kesehatan medis Anisa Medika.
     */
    public const KATEGORI_LIST = [
        'Alat Diagnostik',
        'Alat Terapi',
        'Alat Bedah & Operasi',
        'Alat Laboratorium Medis',
        'Emergency & Resusitasi',
        'Monitoring Pasien',
        'Perlengkapan Rawat Inap',
    ];

    /**
     * Display a listing of the resource.
     * Mendukung Web Dashboard Admin / Logistik dan API response jika dipanggil melalui API.
     */
    public function index(Request $request)
    {
        // Response API JSON jika diminta via API
        if ($request->is('api/*') || ($request->wantsJson() && !$request->acceptsHtml())) {
            return response()->json(Alat::all());
        }

        // Query untuk Web Dashboard
        $query = Alat::query();

        // Filter Kategori
        $selectedKategori = $request->input('kategori');
        if ($selectedKategori && $selectedKategori !== 'Semua') {
            $query->where('kategori', $selectedKategori);
        }

        // Search Filter (Live / Form Query)
        $search = $request->input('search');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('nama_alat', 'like', "%{$search}%")
                  ->orWhere('kode_alat', 'like', "%{$search}%")
                  ->orWhere('merek', 'like', "%{$search}%")
                  ->orWhere('lokasi', 'like', "%{$search}%")
                  ->orWhere('lokasi_lab', 'like', "%{$search}%");
            });
        }

        $alats = $query->orderBy('id', 'desc')->get();

        // Ringkasan Statistik untuk Dashboard Admin & Petugas Logistik
        $totalModel     = Alat::count();
        $totalUnitStok  = (int) Alat::sum('stok');
        $totalTersedia  = (int) Alat::where('status', 'Tersedia')->sum('stok');
        $totalPerbaikan = (int) Alat::whereIn('status', ['Pemeliharaan', 'Perbaikan', 'Rusak', 'Kalibrasi'])->count();
        $kategoris      = self::KATEGORI_LIST;

        return view('alat.index', compact(
            'alats',
            'totalModel',
            'totalUnitStok',
            'totalTersedia',
            'totalPerbaikan',
            'kategoris',
            'selectedKategori',
            'search'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lastAlat = Alat::orderBy('id', 'desc')->first();
        $nextId = $lastAlat ? ($lastAlat->id + 1) : 1;
        $suggestedKode = 'ALK-' . str_pad($nextId, 3, '0', STR_PAD_LEFT);
        $kategoris = self::KATEGORI_LIST;

        return view('alat.create', compact('suggestedKode', 'kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $isApi = $request->is('api/*') || ($request->wantsJson() && !$request->acceptsHtml());

        $rules = [
            'kode_alat'  => 'required|string|max:50|unique:alats,kode_alat',
            'nama_alat'  => 'nullable|string|max:150',
            'nama_alkes' => 'nullable|string|max:150',
            'kategori'   => 'required|string|max:100',
            'stok'       => 'required|integer|min:0',
            'status'     => 'required|string|max:50',
            'lokasi'     => 'nullable|string|max:100',
            'lokasi_lab' => 'nullable|string|max:100',
            'merek'      => 'nullable|string|max:60',
            'tahun'      => 'nullable|string|max:10',
            'deskripsi'  => 'nullable|string',
        ];

        $request->validate($rules);

        $namaAlat = $request->input('nama_alat') ?? $request->input('nama_alkes');

        if (!$namaAlat) {
            if ($isApi) {
                return response()->json([
                    'message' => 'Kolom nama_alat atau nama_alkes wajib diisi.',
                    'errors'  => ['nama_alat' => ['Nama alat medis wajib diisi.']],
                ], 422);
            }
            return back()->withInput()->withErrors(['nama_alat' => 'Nama alat medis wajib diisi.']);
        }

        $lokasi = $request->input('lokasi_lab') ?? $request->input('lokasi') ?? 'Lab Sentral Medis';

        $alat = Alat::create([
            'kode_alat'  => strtoupper(trim($request->input('kode_alat'))),
            'nama_alat'  => trim($namaAlat),
            'kategori'   => $request->input('kategori'),
            'stok'       => (int) $request->input('stok', 0),
            'status'     => $request->input('status', 'Tersedia'),
            'lokasi_lab' => $lokasi,
            'lokasi'     => $lokasi,
            'merek'      => $request->input('merek') ?? '-',
            'tahun'      => $request->input('tahun') ?? date('Y'),
            'deskripsi'  => $request->input('deskripsi'),
        ]);

        if ($isApi) {
            return response()->json([
                'message' => 'Data alat berhasil ditambahkan!',
                'data'    => $alat,
            ], 201);
        }

        return redirect()->route('alat.index')->with('success', "Alat medis {$alat->nama_alat} ({$alat->kode_alat}) berhasil didaftarkan ke Sistem Inventaris!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $alat = Alat::findOrFail($id);

        if ($request->is('api/*') || ($request->wantsJson() && !$request->acceptsHtml())) {
            return response()->json($alat);
        }

        return view('alat.show', compact('alat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $alat = Alat::findOrFail($id);
        $kategoris = self::KATEGORI_LIST;

        return view('alat.edit', compact('alat', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $alat = Alat::findOrFail($id);
        $isApi = $request->is('api/*') || ($request->wantsJson() && !$request->acceptsHtml());

        $request->validate([
            'kode_alat'  => 'sometimes|required|string|max:50|unique:alats,kode_alat,' . $alat->id,
            'nama_alat'  => 'nullable|string|max:150',
            'nama_alkes' => 'nullable|string|max:150',
            'kategori'   => 'sometimes|required|string|max:100',
            'stok'       => 'sometimes|required|integer|min:0',
            'status'     => 'sometimes|required|string|max:50',
            'lokasi'     => 'nullable|string|max:100',
            'lokasi_lab' => 'nullable|string|max:100',
            'merek'      => 'nullable|string|max:60',
            'tahun'      => 'nullable|string|max:10',
            'deskripsi'  => 'nullable|string',
        ]);

        $data = $request->only([
            'kategori',
            'stok',
            'status',
            'deskripsi',
            'tahun',
            'merek',
        ]);

        if ($request->has('kode_alat')) {
            $data['kode_alat'] = strtoupper(trim($request->input('kode_alat')));
        }

        if ($request->filled('nama_alat')) {
            $data['nama_alat'] = trim($request->input('nama_alat'));
        } elseif ($request->filled('nama_alkes')) {
            $data['nama_alat'] = trim($request->input('nama_alkes'));
        }

        if ($request->filled('lokasi_lab')) {
            $data['lokasi_lab'] = $request->input('lokasi_lab');
            $data['lokasi']     = $request->input('lokasi_lab');
        } elseif ($request->filled('lokasi')) {
            $data['lokasi_lab'] = $request->input('lokasi');
            $data['lokasi']     = $request->input('lokasi');
        }

        $alat->update($data);

        if ($isApi) {
            return response()->json([
                'message' => 'Data alat berhasil diperbarui!',
                'data'    => $alat,
            ]);
        }

        return redirect()->route('alat.index')->with('success', "Spesifikasi alat {$alat->nama_alat} ({$alat->kode_alat}) berhasil diperbarui!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $alat = Alat::findOrFail($id);
        $nama = $alat->nama_alat;
        $kode = $alat->kode_alat;
        $alat->delete();

        if ($request->is('api/*') || ($request->wantsJson() && !$request->acceptsHtml())) {
            return response()->json([
                'message' => 'Data alat berhasil dihapus!',
                'id'      => $id,
            ]);
        }

        return redirect()->route('alat.index')->with('success', "Data stok alat {$nama} [{$kode}] berhasil dihapus dari inventaris!");
    }
}