@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ ('Edit Peminjam') }}</div>

                <div class="card-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                        <a href="{{ route('datapeminjams.index') }}" class="btn btn-primary btn-sm">
                            Kembali
                        </a>
                    </div>

                    <form action="{{ route('datapeminjams.update', $datapeminjam->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="inputNamaPeminjam" class="form-label"></label>
                            <input type="text" name="nama_peminjam" value="{{ old('nama_peminjam', $datapeminjam->nama_peminjam) }}" class="form-control @error('nama_peminjam') is-invalid @enderror" id="inputNamaPeminjam" placeholder="Ubah Nama Peminjam">
                            @error('nama_peminjam')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputKelas" class="form-label">Kelas</label>
                            <input type="text" name="kelas" value="{{ old('kelas', $datapeminjam->kelas) }}" class="form-control @error('kelas') is-invalid @enderror" id="inputKelas" placeholder="Ubah Kelas">
                            @error('kelas')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputNoTelp" class="form-label">No Telepon</label>
                            <input type="text" name="no_telp" value="{{ old('no_telp', $datapeminjam->no_telp) }}" class="form-control @error('no_telp') is-invalid @enderror" id="inputNoTelp" placeholder="Ubah Nomor Telepon">
                            @error('no_telp')
                                <div class="form-text text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputJk" class="form-label">Jenis Kelamin</label>
                            <input type="text" name="jk" value="{{ old('', $datapeminjam->jk) }}" class="form-control @error('jk') is-invalid @enderror" id="inputJk" placeholder="Ubah Jenis Kelamin">
                            @error('jk')
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
