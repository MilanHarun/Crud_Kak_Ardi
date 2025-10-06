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
        ->with('i', (request()->input('page', 1) - 1) * 5);
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

        peminjam::create($request->validated());

        return redirect()->route('peminjams.index')
        ->with('success','peminjam created successfully.');
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
    public function update(PeminjamUpdateRequest $request, peminjam $peminjam)
    {
        $request->update($request->validated());

        return redirect()->route('peminjams.index')
            ->with('success', 'Data Peminjam Berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(peminjam $peminjam)
    {
        $peminjam->delete();

        return redirect()->route('peminjams.index')
            ->with('success', 'Data Peminjam Berhasil di hapus');
    }
}
