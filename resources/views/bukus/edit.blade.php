@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ ('Edit Buku') }}</div>

                <div class="card-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                        <a href="{{ route('bukus.index') }}" class="btn btn-primary btn-sm">
                            Kembali
                        </a>
                    </div>

                    <form action="{{ route('bukus.update', $buku->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="inputBuku" class="form-label">Buku</label>
                            <input type="text" name="buku" value="{{ old('buku', $buku->buku) }}" class="form-control @error('buku') is-invalid @enderror" id="inputBuku" placeholder="Ubah Buku">
                            @error('buku')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputPengarang" class="form-label">Pengarang</label>
                            <input type="text" name="pengarang" value="{{ old('pengarang', $buku->pengarang) }}" class="form-control @error('pengarang') is-invalid @enderror" id="inputPengarang" placeholder="Ubah Pengarang">
                            @error('pengarang')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputPenerbit" class="form-label">Penerbit</label>
                            <input type="text" name="penerbit" value="{{ old('penerbit', $buku->penerbit) }}" class="form-control @error('penerbit') is-invalid @enderror" id="inputPenerbit" placeholder="Ubah Penerbit">
                            @error('penerbit')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputKategori" class="form-label">Kategori</label>
                            <input type="text" name="kategori" value="{{ old('kategori', $buku->kategori) }}" class="form-control @error('kategori') is-invalid @enderror" id="inputKategori" placeholder="Ubah Kategori">
                            @error('kategori')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="inputPeminjam" class="form-label">Peminjam</label>
                            <input type="text" name="peminjam" value="{{ old('peminjam', $buku->peminjam) }}" class="form-control @error('peminjam') is-invalid @enderror" id="inputPeminjam" placeholder="Ubah Peminjam">
                            @error('peminjam')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        <button type="submit" class="btn btn-success">Ubah ✅</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
