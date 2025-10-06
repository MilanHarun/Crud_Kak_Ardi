
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tambah Peminajam') }}</div>

                <div class="card-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                        <a href="{{ route('peminjams.index') }}" class="btn btn-primary btn-sm">
                            🔴Back
                        </a>
                    </div>
                    <form action="{{ route('peminjams.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="inputPeminjam" class="form-label">Peminjam</label>
                            <input type="text" name="peminjam" value="{{ old('peminjam') }}" id="inputPeminjam" placeholder="Masukkan Peminjam">
                        </div>

                        <div class="mb-3">
                            <label for="inputTglpeminjaman" class="form-label">Tgl Peminjaman</label>
                            <input type="text" name="tglpeminjaman" value="{{ old('tglpeminjaman') }}" id="inputTglpeminjaman" placeholder="Masukkan Tgl Peminjaman">
                        </div>

                        <div class="mb-3">
                            <label for="inputJudulbuku" class="form-label">Judul buku</label>
                            <input type="text" name="judulbuku" value="{{ old('judulbuku') }}" id="inputJudulbuku" placeholder="Masukkan Judul Buku">
                        </div>

                        <div class="mb-3">
                            <label for="inputTglpengembalian" class="form-label">Tgl Pengembalian</label>
                            <input type="text" name="tglpengembalian" value="{{ old('tglpengembalian') }}" id="inputTglpengembalian" placeholder="Masukkan Tgl Pengembalian">
                        </div>


                        <button type="submit" class="btn btn-success">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
