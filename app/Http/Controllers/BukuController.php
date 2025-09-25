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
        return view('bukus.index',compact('bukus'))
        ->with( (request()->input('page', 1) - 2) *5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bukus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BukuStoreRequest $request)
    {
       buku::create($request->validated());
       return redirect()->route('bukus.index')
       ->with('success','Buku created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        return view('bukus.show',compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        return view('bukus.edit',compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BukuUpdateRequest $request, Buku $buku)
    {
        $buku->update($request->validated());
        return redirect()->route('bukus.index')
        ->with('success','Buku updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('bukus.index')
        ->with('success','Buku deleted successfully');
    }
}
