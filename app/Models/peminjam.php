<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class peminjam extends Model
{
    protected $fillable = [
        'peminjam',
        'tanggal_pinjam',
        'judul',
        'tanggal_kembali',
        'petugas',
    ];
}
