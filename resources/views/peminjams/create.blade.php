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

                    <!-- Form akan mengirim data ke PeminjamController@store -->
                    <form action="{{ route('peminjams.store') }}" method="POST">
                        @csrf

                        <!-- Pilihan Peminjam -->
                        <div class="mb-3">
                            <label for="inputPeminjam" class="form-label">Pilih Peminjam</label>
                            <select name="peminjam" id="inputPeminjam" class="form-control @error('peminjam') is-invalid @enderror">
                                <option value="">-- Pilih Peminjam --</option>

                                <!-- Variabel $daftarPeminjam berisi [id => nama_peminjam] -->
                                @foreach ($daftarPeminjam as $id => $peminjam)
                                   <option value="{{ $id }}" {{ old('peminjam') == $id ? 'selected' : '' }}>
                                       {{ $peminjam }}
                                   </option>
                                @endforeach
                            </select>
                            @error('peminjam')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Pilihan Buku -->
                        <div class="mb-3">
                            <label for="inputBuku" class="form-label">Pilih Buku</label>
                            <select name="buku" id="inputBuku" class="form-control @error('buku') is-invalid @enderror">
                                <option value="">-- Pilih Buku --</option>

                                <!-- Variabel $daftarBuku berisi [id => buku] -->
                                @foreach ($daftarBuku as $id => $buku)
                                   <option value="{{ $id }}" {{ old('buku') == $id ? 'selected' : '' }}>
                                       {{ $buku }}
                                   </option>
                                @endforeach
                            </select>
                            @error('buku')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tanggal Peminjaman -->
                        <div class="mb-3">
                            <label for="inputTanggalPinjam" class="form-label">Tgl Peminjaman</label>
                            <input type="date" name="tanggal_pinjam"
                                value="{{ old('tanggal_pinjam', \Carbon\Carbon::now()->format('Y-m-d')) }}"
                                required id="inputTanggalPinjam" class="form-control @error('tanggal_pinjam') is-invalid @enderror">
                            @error('tanggal_pinjam')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tanggal Pengembalian -->
                        <div class="mb-3">
                            <label for="inputTanggalKembali" class="form-label">Tgl Pengembalian</label>
                            <input type="date" name="tanggal_kembali"
                                value="{{ old('tanggal_kembali') }}"
                                id="inputTanggalKembali" class="form-control @error('tanggal_kembali') is-invalid @enderror">
                            @error('tanggal_kembali')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Petugas -->
                        <div class="mb-3">
                            <label for="inputPetugas" class="form-label">Petugas</label>
                            <input type="text" name="petugas"
                                value="{{ old('petugas') }}"
                                id="inputPetugas" placeholder="Masukkan Petugas" class="form-control @error('petugas') is-invalid @enderror">
                            @error('petugas')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
