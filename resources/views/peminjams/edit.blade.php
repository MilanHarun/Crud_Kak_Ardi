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

                        {{-- START: DROPDOWN UNTUK PEMINJAM --}}
                        {{-- Mengganti input teks menjadi select (dropdown) --}}
                        <div class="mb-3">
                            <label for="inputPeminjam" class="form-label">Peminjam</label>
                            <select name="peminjam" id="inputPeminjam" class="form-control @error('peminjam') is-invalid @enderror">
                                <option value="">-- Pilih Peminjam --</option>
                                {{-- Loop daftar Peminjam yang dikirim dari Controller --}}
                                @foreach ($daftarPeminjam as $id => $nama_peminjam)
                                    {{-- Cek apakah ID peminjam saat ini sama dengan ID di loop --}}
                                    <option value="{{ $id }}"
                                        {{ (old('peminjam', $peminjam->peminjam) == $id) ? 'selected' : '' }}>
                                        {{ $nama_peminjam }}
                                    </option>
                                @endforeach
                            </select>
                            @error('peminjam')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- END: DROPDOWN UNTUK PEMINJAM --}}


                        {{-- START: DROPDOWN UNTUK BUKU --}}
                        {{-- Mengganti input teks 'judul' menjadi select 'buku' --}}
                        <div class="mb-3">
                            <label for="inputBuku" class="form-label">Judul Buku</label>
                            <select name="buku" id="inputBuku" class="form-control @error('buku') is-invalid @enderror">
                                <option value="">-- Pilih Buku --</option>
                                {{-- Loop daftar Buku yang dikirim dari Controller --}}
                                @foreach ($daftarBuku as $id => $judul_buku)
                                    {{-- Cek apakah ID buku saat ini sama dengan ID di loop --}}
                                    <option value="{{ $id }}"
                                        {{ (old('buku', $peminjam->buku) == $id) ? 'selected' : '' }}>
                                        {{ $judul_buku }}
                                    </option>
                                @endforeach
                            </select>
                            @error('buku')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- END: DROPDOWN UNTUK BUKU --}}


                        <div class="mb-3">
                            <label for="inputTanggalPinjam" class="form-label">Tgl Peminjaman</label>
                            <input type="date" name="tanggal_pinjam" value="{{ old('tanggal_pinjam', $peminjam->tanggal_pinjam) }}" class="form-control @error('tanggal_pinjam') is-invalid @enderror" id="inputTanggalPinjam" placeholder="Ubah Tgl Peminjaman">
                            @error('tanggal_pinjam')
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
