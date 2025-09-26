@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ ('Tambah Buku') }}</div>

                <div class="card-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                        <a href="{{ route('bukus.index') }}" class="btn btn-primary btn-sm">
                            🔴Back
                        </a>
                    </div>
                    <form action="{{ route('bukus.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="inputBuku" class="form-label">Buku</label>
                            <input type="text" name="buku" value="{{ old('buku') }}" id="inputBuku" placeholder="Masukkan Buku">
                        </div>

                        <div class="mb-3">
                            <label for="inputPengarang" class="form-label">Pengarang</label>
                            <input type="text" name="pengarang" value="{{ old('pengarang') }}" id="inputPengarang" placeholder="Masukkan Pengarang">
                        </div>

                        <div class="mb-3">
                            <label for="inputPenerbit" class="form-label">Penerbit</label>
                            <input type="text" name="penerbit" value="{{ old('penerbit') }}" id="inputPenerbit" placeholder="Masukkan Penerbit">
                        </div>

                        <div class="mb-3">
                            <label for="inputKategori" class="form-label">Kategori</label>
                            <input type="text" name="kategori" value="{{ old('kategori') }}" id="inputKategori" placeholder="Masukkan Kategori">
                        </div>

                        <div class="mb-3">
                            <label for="inputPeminjam" class="form-label">Peminjam</label>
                            <input type="text" name="peminjam" value="{{ old('peminjam') }}" id="inputPeminjam" placeholder="Masukkan peminjam">
                        </div>

                        <button type="submit" class="btn btn-success">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
