@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ ('Data Peminjam') }}</div>

                <div class="card-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                        <a href="{{ route('datapeminjams.index') }}" class="btn btn-primary btn-sm">
                            Back
                        </a>
                    </div>
                    <form action="{{ route('datapeminjams.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="inputNamaPeminjam" class="form-label">Nama Peminjam</label>
                            <input type="text" name="nama_peminjam" value="{{ old('nama_peminjam') }}" id="inputNamaPeminjam" placeholder="Masukkan Nama Peminjam">
                        </div>

                         <div class="mb-3">
                            <label for="inputKelas" class="form-label">Kelas</label>
                            <input type="text" name="kelas" value="{{ old('kelas') }}" id="inputKelas" placeholder="Masukkan Kelas Anda">
                        </div>

                         <div class="mb-3">
                            <label for="inputNoTelp" class="form-label">No Telepon</label>
                            <input type="text" name="no_telp" value="{{ old('no_telp') }}" id="inputNoTelp" placeholder="Masukkan Nomor Telepon">
                        </div>

                        <div class="mb-3">
                            <label for="inputJk" class="form-label">Jenis Kelamin</label>
                            <input type="text" name="jk" value="{{ old('jk') }}" id="inputJk" placeholder="Masukkan Jenis Kelamin">
                        </div>


                        <button type="submit" class="btn btn-success">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
