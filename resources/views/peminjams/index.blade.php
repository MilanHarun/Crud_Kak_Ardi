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
                        <a href="{{ route('peminjams.create') }}" type="button" class="btn btn-primary">Pinjam Buku</a>
                    </div>

                    <div class="table-responsive">
                       <table class="table table-border table-striped mt-4">
                            <thead>
                                <tr>
                                    <th widht="80px">No</th>
                                    <th>Peminjam</th>
                                    <th>Buku</th>
                                    <th>Tgl Peminjaman</th>
                                    <th>Tgl Pengembalian</th>
                                    <th>Petugas</th>
                                    <th widht="250px">Aksi</th>

                                </tr>
                            </thead>

                            <tbody>

                                @php
                                // variabel i untuk nomor
                                     $i = ($peminjams->currentPage() - 1) * $peminjams->perPage() + 1;
                                @endphp

                                @forelse ($peminjams as $peminjam)
                                    <tr>
                                        <td>{{ $i++ }}</td>

                                        <td>{{ $peminjam->peminjamRelasi->nama_peminjam ?? 'N/A' }}</td>

                                        <td>{{ $peminjam->bukuRelasi->buku ?? 'N/A' }}</td>

                                        <td>{{ $peminjam->tanggal_pinjam }}</td>
                                        <td>{{ $peminjam->tanggal_kembali }}</td>
                                        <td>{{ $peminjam->petugas }}</td>
                                        <td>
                                            <form action="{{ route('peminjams.destroy', $peminjam->id) }}" method="POST">
                                                <a href="{{ route('peminjams.edit', $peminjam->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                                                @csrf
                                                @method('DELETE')
                                                <!-- Pastikan konfirmasi juga menggunakan nama, bukan ID -->
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm ('apakah anda yakin ingin menghapus {{ $peminjam->peminjamRelasi->nama_peminjam ?? 'data ini' }}?')">Hapus</button>
                                            </form>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                         <td colspan="7" class="text-center">Yahhh... Belum ada datanya nih😊</td>
                                    </tr>
                                @endforelse
                            </tbody>

                       </table>
                       <!-- Menambahkan navigasi pagination -->
                       {{ $peminjams->links() }}

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
