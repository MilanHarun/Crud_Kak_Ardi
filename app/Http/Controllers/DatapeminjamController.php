<?php

namespace App\Http\Controllers;

use App\Http\Requests\DatapeminjamStoreRequest;
use App\Http\Requests\DatapeminjamUpdateRequest;
use App\Models\Datapeminjam;
use Illuminate\Http\Request;

class DatapeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datapeminjams = Datapeminjam::latest()->paginate(5);
        return view('datapeminjams.index', compact('datapeminjams'))
        ->with( (request()->input('page', 1) - 2) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('datapeminjams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DatapeminjamStoreRequest $request)
    {
         Datapeminjam::create($request->validated());
        return redirect()->route('datapeminjams.index')
        ->with('success','Kategori created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Datapeminjam $datapeminjam)
    {
        return view('datapeminjams.show',compact('datapeminjam'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Datapeminjam $datapeminjam)
    {
        return view('datapeminjams.edit',compact('datapeminjam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DatapeminjamUpdateRequest $request, Datapeminjam $datapeminjam)
    {
         $datapeminjam ->update($request->validated());
        return redirect()->route('datapeminjams.index')
        ->with('success','Kategori updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Datapeminjam $datapeminjam)
    {
        $datapeminjam->delete();
        return redirect()->route('datapeminjams.index')
        ->with('success','Kategori deleted successfully');
    }
}
