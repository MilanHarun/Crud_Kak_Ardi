@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Peminjam') }}</div>

                <div class="card-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                        <a href="{{ route('peminjams.index') }}" class="btn btn-primary btn-sm">
                            Kembali
                        </a>
                    </div>

                    <form action="{{ route('peminjams.update', $peminjam->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="inputPeminjam" class="form-label">Peminajam</label>
                            <input type="text" name="peminjam" value="{{ old('peminjam', $peminjam->peminjam) }}" class="form-control @error('peminjam') is-invalid @enderror" id="inputPeminjam" placeholder="Ubah Peminjaman">
                            @error('peminjam')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                            <div class="mb-3">
                                <label for="inputTglpeminjaman" class="form-label">Tgl Peminjaman</label>
                                <input type="text" name="tglpeminjaman" value="{{ old('tglpeminjaman', $peminjam->tgl_peminjaman) }}" class="form-control @error('tglpeminjaman') is-invalid @enderror" id="inputTglpeminjaman" placeholder="Ubah Tgl Peminjaman">
                                @error('tglpeminjaman')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="inputJudulbuku" class="form-label">Judul Buku</label>
                                <input type="text" name="judulbuku" value="{{ old('judulbuku', $peminjam->judul_buku) }}" class="form-control @error('judulbuku') is-invalid @enderror" id="inputJudulbuku" placeholder="Ubah Judul Buku">
                                @error('judulbuku')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="inputTglpengembalian" class="form-label">Tgl Pengembalian</label>
                                <input type="text" name="tglpengembalian" value="{{ old('tglpengembalian', $peminjam->tgl_pengembalian) }}" class="form-control @error('tglpengembalian') is-invalid @enderror" id="inputTglpengembalian" placeholder="Ubah Tgl Pengembalian">
                                @error('tglpengembalian')
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
