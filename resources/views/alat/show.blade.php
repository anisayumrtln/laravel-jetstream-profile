<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Alat Medis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                
                <div class="mb-4">
                    <span class="block text-gray-500 text-sm">Nama Alat:</span>
                    <p class="text-lg font-bold text-gray-800">{{ $alat->nama_alat }}</p>
                </div>

                <div class="mb-4">
                    <span class="block text-gray-500 text-sm">Tahun Pembuatan / Pengadaan:</span>
                    <p class="text-lg font-semibold text-gray-800">{{ $alat->tahun }}</p>
                </div>

                <div class="mb-4">
                    <span class="block text-gray-500 text-sm">Merek / Pabrikan:</span>
                    <p class="text-lg font-semibold text-gray-800">{{ $alat->merek }}</p>
                </div>

                <div class="mb-6">
                    <span class="block text-gray-500 text-sm">Lokasi Ruangan:</span>
                    <p class="text-lg font-semibold text-gray-800">{{ $alat->lokasi }}</p>
                </div>

                <div>
                    <a href="{{ route('alat.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        Kembali
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>