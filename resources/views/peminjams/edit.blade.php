@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ ('Edit Peminjam') }}</div>

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
                                <input type="date" name="tanggal_pinjam" value="{{ old('tanggal_pinjam', $peminjam->tanggal_pinjam) }}" class="form-control @error('tanggal_pinjam') is-invalid @enderror" id="inputTanggalPinjam" placeholder="Ubah Tgl Peminjaman">
                                @error('tanggal_pinjam')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="inputJudul" class="form-label">Judul Buku</label>
                                <input type="text" name="judul" value="{{ old('judul', $peminjam->judul) }}" class="form-control @error('judul') is-invalid @enderror" id="inputJudul" placeholder="Ubah Judul Buku">
                                @error('judul')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="inputTanggalKembali" class="form-label">Tgl Pengembalian</label>
                                <input type="date" name="tanggal_kembali" value="{{ old('tanggal_kembali', $peminjam->tanggal_kembali) }}" class="form-control @error('tanggal_kembali') is-invalid @enderror" id="inputTanggalKembali" placeholder="Ubah Tgl Pengembalian">
                                @error('tanggal_kembali')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="inputPetugas" class="form-label">Petugas</label>
                                <input type="text" name="petugas" value="{{ old('petugas', $peminjam->petugas) }}" class="form-control @error('petugas') is-invalid @enderror" id="inputPetugas" placeholder="Ubah Petugas">
                                @error('petugas')
                                    <div class="form-text text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        <button type="submit" class="btn btn-success">Ubah </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
