<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Datapeminjam extends Model
{
    protected $fillable=[
        'nama_peminjam',
        'kelas',
        'no_telp',
        'jk'
    ];
}
