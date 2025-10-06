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
public function store(Request $request)
{
    $request->validate([
        'peminjam' => 'required|string|',
        'tglpeminjaman' => 'required|date',
        'judulbuku' => 'required|string|',
        'tglpengembalian' => 'required|date',
    ]);

Peminjam::create([
    'peminjam' => $request->peminjam,
    'tgl_peminjaman' => $request->tglpeminjaman,
    'judul_buku' => $request->judulbuku,
    'tgl_pengembalian' => $request->tglpengembalian,
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
        return vieww('peminjams.edit', compact('peminjam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PeminjamUpdateRequest $request, peminjam $peminjam)
    {
         $peminjam->update($request->validated());

        return redirect()->route('peminjams.index')
            ->with('success', 'Yeayy, Berhasil di ubah😊!');
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
