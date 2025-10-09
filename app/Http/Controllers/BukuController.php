<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use App\Http\Requests\BukuStoreRequest;
use App\Http\Requests\BukuUpdateRequest;


class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bukus = Buku::latest()->paginate(5);
        $categories = Buku::pluck('buku', 'id');
        return view('bukus.index', compact('bukus'))
         ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $categories = Buku::pluck('buku', 'id');
        return view('bukus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BukuStoreRequest $request)
    {
        $request->validate([
            'buku' => 'required|string|',
            'pengarang' => 'required|string',
            'penerbit' => 'required|string',
            'kategori' => 'required|string',
        ]);

        Buku::create([
            'buku' => $request->buku,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'kategori' => $request->kategori,
        ]);

        return redirect()->route('bukus.index')
        ->with('success', 'Buku berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        return view('bukus.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
   public function edit(Buku $buku)
    {
         $categories = Buku::pluck('buku', 'id');
        return view('bukus.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BukuUpdateRequest $request, Buku $buku)
    {
        $buku->update($request->validated());

        return redirect()->route('bukus.index')
            ->with('success', 'Yeayy, Buku Berhasil di ubah!');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('bukus.index')
            ->with('success', 'Yeayy, Buku Berhasil di hapus😊!');
}
}
