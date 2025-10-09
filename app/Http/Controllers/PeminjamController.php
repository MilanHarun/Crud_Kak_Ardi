<?php

namespace App\Http\Controllers;

use App\Models\Peminjam; // Pastikan Peminjam menggunakan P kapital
use Illuminate\Http\Request;
use App\Http\Requests\PeminjamStoreRequest;
use App\Http\Requests\PeminjamUpdateRequest;
use App\Models\Buku;
use App\Models\Datapeminjam;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // PERBAIKAN: Eager Loading relasi peminjamRelasi dan bukuRelasi
        // agar data nama dan judul terambil dan bisa ditampilkan di view index.
        $peminjams = Peminjam::with(['peminjamRelasi', 'bukuRelasi'])
                             ->latest()
                             ->paginate(5);

        return view('peminjams.index', compact('peminjams'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // PERBAIKAN 1: Gunakan 'id' sebagai key agar value di dropdown adalah ID database.
        $daftarPeminjam = Datapeminjam::pluck('nama_peminjam', 'id');

        $daftarBuku = Buku::pluck('buku', 'id');

        return view('peminjams.create', compact('daftarBuku','daftarPeminjam'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PeminjamStoreRequest $request)
    {
        // CATATAN: Validasi sudah dihandle oleh PeminjamStoreRequest,
        // sehingga tidak perlu ada $request->validate([...]) di sini.

        // Simpan data peminjaman
        Peminjam::create([
            'peminjam' => $request->peminjam, // ID Peminjam (FK)
            'buku' => $request->buku,         // ID Buku (FK)
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'petugas' => $request->petugas,
        ]);

        // Pengalihan ke halaman index setelah berhasil disimpan
        return redirect()->route('peminjams.index')->with('success', 'Data peminjam berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjam $peminjam)
    {
        return view('peminjams.show', compact('peminjam'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjam $peminjam)
    {
        // Anda mungkin perlu mengirim daftar peminjam dan buku ke view edit juga
        $daftarPeminjam = Datapeminjam::pluck('nama_peminjam', 'id');
        $daftarBuku = Buku::pluck('buku', 'id');

        return view('peminjams.edit', compact('peminjam', 'daftarPeminjam', 'daftarBuku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjam $peminjam)
    {
        // Anda harus menyesuaikan validasi agar sesuai dengan nama kolom FK Anda ('peminjam' dan 'buku')
        $validatedData = $request->validate([
            'peminjam' => 'required',        // ID Peminjam
            'buku' => 'required',            // ID Buku
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
            'petugas' => 'required|max:255',
        ]);

        // Pembaruan Data
        $peminjam->update($validatedData);

        // Redirect ke Halaman Index
        return redirect()->route('peminjams.index')->with('success', 'Data peminjam berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjam $peminjam)
    {
         $peminjam->delete();
         return redirect()->route('peminjams.index')
             ->with('success', 'Yeayy, Berhasil di hapus😊!');
    }
}
