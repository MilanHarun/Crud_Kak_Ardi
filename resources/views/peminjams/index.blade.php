@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ ('Pinjam') }}</div>

                <div class="card-body">

                     @session ('success')
                     <div class="alert alert-success" role ="alert">{{$value}}</div>
                     @endsession

                     {{-- frist button --}}

                     <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="/peminjams/create" type="button" class="btn btn-primary">Pinjem Ah</a>
                     </div>

                    <div class="table-responsive">
                     <table class="table table-border table-striped mt-4">
                        <thead>
                            <tr>
                                <th widht="80px">No</th>
                                <th>Peminjam</th>
                                <th>Judul Buku</th>
                                <th>Tgl Peminjaman</th>
                                <th>Tgl Pengembalian</th>
                                <th>Petugas</th>
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
                                    <td>{{ $peminjam->judul }}</td>
                                    <td>{{ $peminjam->tanggal_pinjam }}</td>
                                    <td>{{ $peminjam->tanggal_kembali }}</td>
                                    <td>{{ $peminjam->petugas }}</td>
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
