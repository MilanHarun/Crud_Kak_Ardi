<?php

namespace App\Http\Controllers;

use App\Models\peminjam;
use Illuminate\Http\Request;
use App\Http\Requests\PeminjamStoreRequest;
use App\Http\Requests\PeminjamUpdateRequest;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjams = peminjam::latest()->paginate(5);
        return view('peminjams.index', compact('peminjams'))
        ->with('i', (request()->input('page', 1) - 1) *5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peminjams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(PeminjamStoreRequest $request)
{
    $request->validate([
        'peminjam' => 'required',
        'judul' => 'required',
        'tanggal_pinjam' => 'required',
        'tanggal_kembali' => 'required',
        'petugas' => 'required',
    ]);

Peminjam::create([
    'peminjam' => $request->peminjam,
    'tanggal_pinjam' => $request->tanggal_pinjam,
    'judul' => $request->judul,
    'tanggal_kembali' => $request->tanggal_kembali,
    'petugas' => $request->petugas,
]);
    return redirect()->route('peminjams.index')->with('success', 'Data peminjam berhasil ditambahkan!');
}

    /**
     * Display the specified resource.
     */
    public function show(peminjam $peminjam)
    {
        return view('peminjams.show', compact('peminjam'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(peminjam $peminjam)
    {
        return view('peminjams.edit', compact('peminjam'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Contoh di PeminjamController.php
public function update(Request $request, Peminjam $peminjam)
{
    // 1. Validasi Data
    $validatedData = $request->validate([
        'peminjam' => 'required|max:255',
        'tanggal_pinjam' => 'required|date',
        'judul' => 'required|max:255',
        'tanggal_kembali' => 'nullable|date|after_or_equal:tanggal_pinjam',
        'petugas' => 'required|max:255',
    ]);

    // 2. Pembaruan Data
    // Pastikan nama-nama field di $request sesuai dengan yang ada di database/model
    $peminjam->update($validatedData); // <-- Pastikan baris ini berhasil!

    // 3. Redirect ke Halaman Index
    return redirect()->route('peminjams.index')->with('success', 'Data peminjam berhasil diubah!');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(peminjam $peminjam)
    {
         $peminjam->delete();
        return redirect()->route('peminjams.index')
            ->with('success', 'Yeayy, Berhasil di hapus😊!');
    }
}
