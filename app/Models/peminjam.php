<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjam extends Model
{
    use HasFactory;

    protected $fillable = [
        'peminjam',          // Foreign Key ke Datapeminjam.id
        'buku',              // Foreign Key ke Buku.id
        'tanggal_pinjam',
        'tanggal_kembali',
        'petugas',
    ];

    /**
     * Relasi ke Model Datapeminjam (Menggunakan FK 'peminjam').
     */
    public function peminjamRelasi()
    {
        // Parameter kedua: 'peminjam' adalah nama kolom FK di tabel peminjams
        return $this->belongsTo(Datapeminjam::class, 'peminjam');
    }

    /**
     * Relasi ke Model Buku (Menggunakan FK 'buku').
     */
    public function bukuRelasi()
    {
        // Parameter kedua: 'buku' adalah nama kolom FK di tabel peminjams
        return $this->belongsTo(Buku::class, 'buku');
    }
}
