@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                     @session ('success')
                     <div class="alert alert-success" role ="alert">{{$value}}</div>
                     @endsession

                     {{-- frist button --}}

                     <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambah Peminjam
</button>
                     </div>
                        {{-- ini halaman create menggunakan model --}}
                        <!-- Button trigger modal -->
                        <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Management Perpustakaan Wikrama</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form action="{{ route ('peminjams.store') }}" method="POST">
                                @csrf
                           <div>
                            <label for="inputPeminjam" class="form-label"><strong>Peminjam</strong></label>
                            <input type="text" name="peminjam" id="inputPeminjam" class="form-control @error('peminjam') is-invalid @enderror">
                           </div>

                            <div>
                            <label for="inpuTglpengembalian" class="form-label"><strong>Tgl Peminjaman</strong></label>
                            <input type="date" name="tglpeminjaman" id="inputTglpeminjaman" class="form-control @error('tglpeminjaman') is-invalid @enderror">
                           </div>

                            <div>
                            <label for="inputJudulbuku" class="form-label"><strong>Judul Buku</strong></label>
                            <input type="text" name="judulbuku" id="inputJudulbuku" class="form-control @error('judulbuku') is-invalid @enderror">
                           </div>

                            <div>
                            <label for="inputTglpengembalian" class="form-label"><strong>Tgl Pengembalian</strong></label>
                            <input type="date" name="tglpengembalian" id="inputTglpengembalian" class="form-control @error('tglpengembalian') is-invalid @enderror">
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
                    <div class="table-responsive">
                     <table class="table table-border table-striped mt-4">
                        <thead>
                            <tr>
                                <th widht="80px">No</th>
                                <th>Peminjam</th>
                                <th>Tgl Peminjaman</th>
                                <th>Judul Buku</th>
                                <th>Tgl Pengembalian</th>
                                <th widht="250px">Aksi</th>

                            </tr>
                        </thead>

                        <tbody>

                            @php
                            // variabel i untuk nomor
                                $i=1;
                            @endphp

                            @forelse ($peminjams as $peminjam)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $peminjam->peminjam }}</td>
                                    <td>{{ $peminjam->tgl_peminjaman }}</td>
                                    <td>{{ $peminjam->judul_buku }}</td>
                                    <td>{{ $peminjam->tgl_pengembalian }}</td>
                                    <td>   <form action="{{ route('peminjams.destroy', $peminjam->id) }}" method="POST">
                                            <a href="{{ route('peminjams.show', $peminjam->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                            <a href="{{ route('peminjams.edit', $peminjam->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm ('apakah anda yakin ingin menghapus {{ $peminjam->peminjam }}?')">Hapus</button>
                                        </form>
                                    </td>

                                </tr>
                            @empty
                                <td colspan="5">Yahhh... Belum ada datanya nih😊</td>
                            @endforelse
                        </tbody>

                     </table>

                    </div>


               </div>
            </div>
        </div>
    </div>
</div>
@endsection
