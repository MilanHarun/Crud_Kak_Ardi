<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class peminjam extends Model
{
    protected $fillable = [
        'peminjam',
        'judul',
        'tanggal_pinjam',
        'tanggal_kembali',
        'petugas',
    ];
}
