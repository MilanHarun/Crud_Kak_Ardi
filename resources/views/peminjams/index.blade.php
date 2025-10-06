@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ ('Pinjam') }}</div>

                <div class="card-body">

                     @session ('success')
                     <div class="alert alert-success" role ="alert">{{$value}}</div>
                     @endsession

                     {{-- frist button --}}
                     <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Pinjam Buku
                        </button>
                     </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pinjam Buku</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">


                                    <form action="{{ route ('peminjams.store') }}" method="POST">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="inputPeminjam" class="form-label"><strong>Peminjam</strong></label>
                                            <input type="text" name="peminjam" id="intpuPeminjam" class="form-control @error('peminjam') is-invalid @enderror">
                                              @error('peminjam')
                                            <div class="form-text text-danger"> {{$message}} </div>
                                            @enderror
                                        </div>


                                        <div class="mb-3">
                                            <label for="intpuTanggalPinjam" class="form-label"><strong>Tanggal Pinjam</strong></label>
                                            <input type="date" name="tanggal_pinjam" id="inputTanggalPinjam" class="form-control @error('tanggal_pinjam') is-invalid @enderror">
                                               @error('tanggal_pinjam')
                                            <div class="form-text text-danger"> {{$message}} </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputJudul" class="form-label"><strong>Judul Buku</strong></label>
                                            <input type="text" name="judul" id="inputJudul" class="form-control @error('judul') is-invalid @enderror">
                                               @error('judul')
                                            <div class="form-text text-danger"> {{$message}} </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="inputTanggalKembali" class="form-label"><strong>Tanggal Kembali</strong></label>
                                            <input type="date" name="tanggal_kembali" id="inputTanggalKembali" class="form-control @error('tanggal_kembali') is-invalid @enderror">
                                             @error('tanggal_kembali')
                                            <div class="form-text text-danger"> {{$message}} </div>
                                            @enderror
                                        </div>

                                         <div class="mb-3">
                                            <label for="inputPetugas" class="form-label"><strong>Petugas</strong></label>
                                            <input type="text" name="petugas" id="inputPetugas" class="form-control @error('petugas') is-invalid @enderror">
                                             @error('petugas')
                                            <div class="form-text text-danger"> {{$message}} </div>
                                            @enderror
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>



                     <table class="table table-border table-striped mt-4">
                        <thead>
                            <tr>
                                <th width="80px">Id</th>
                                <th>Nama Peminjam</th>
                                <th>Tanggal Pinjam</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Kembali</th>
                                <th>Petugas</th>

                                <th width="100px">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @forelse ($peminjams as $peminjam)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $peminjam->peminjam}}</td>
                                    <td>{{ $peminjam->tanggal_pinjam}}</td>
                                    <td>{{ $peminjam->judul}}</td>
                                    <td>{{ $peminjam->tanggal_kembali}}</td>
                                    <td>{{ $peminjam->petugas}}</td>

                                    <td>
                                        <form action="{{ route('peminjams.destroy', $peminjam->id) }}" method="POST">
                                            <a href="{{ route('peminjams.show', $peminjam->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                            <a href="{{ route('peminjams.edit', $peminjam->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm ('apakah anda yakin ingin menghapus {{ $peminjam->peminjam }}?')">Hapus</button>
                                        </form>

                                    </td>
                                </tr>
                            @empty
                                <td colspan="6">Data Not Found</td>
                            @endforelse
                            
                        </tbody>
                     </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
