
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ ('Tambah Peminjam') }}</div>

                <div class="card-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                        <a href="{{ route('peminjams.index') }}" class="btn btn-primary btn-sm">
                            Back
                        </a>
                    </div>
                    <form action="{{ route('peminjams.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="inputPeminjam" class="form-label">Peminjam</label>
                            <input type="text" name="peminjam" value="{{ old('peminjam') }}" id="inputPeminjam" placeholder="Masukkan Peminjam">

                         <div class="mb-3">
                            <label for="inputJudul" class="form-label">Judul buku</label>
                            <input type="text" name="judul" value="{{ old('judul') }}" id="inputJudul" placeholder="Masukkan Judul Buku">
                        </div>

                        <div class="mb-3">
                            <label for="inputTanggalPinjam" class="form-label">Tgl Peminjaman</label>
                            <input type="date" name="tanggal_pinjam" value="{{ old('tanggal_pinjam') }}" id="inputTanggalPinjam" placeholder="Masukkan Tanggal Pinjam ">
                        </div>

                        <div class="mb-3">
                            <label for="inputTanggalKembali" class="form-label">Tgl Pengembalian</label>
                            <input type="date" name="tanggal_kembali" value="{{ old('tanggal_kembali') }}" id="inputTanggalKembali" placeholder="Masukkan Tgl kembali">
                        </div>

                         <div class="mb-3">
                            <label for="inputPetugas" class="form-label">Petugas</label>
                            <input type="text" name="petugas" value="{{ old('petugas') }}" id="inputPetugas" placeholder="Masukkan Petugas">
                        </div>


                        <button type="submit" class="btn btn-success">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
