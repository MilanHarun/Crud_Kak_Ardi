@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ ('Data peminjam') }}</div>

                <div class="card-body">

                     @session ('success')
                     <div class="alert alert-success" role ="alert">{{$value}}</div>
                     @endsession

                     {{-- frist button --}}

                     <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="/datapeminjams/create" type="button" class="btn btn-primary">Data</a>
                     </div>

                    <div class="table-responsive">
                     <table class="table table-border table-striped mt-4">
                        <thead>
                            <tr>
                                <th widht="80px">No</th>
                                <th>Peminjam</th>
                                <th>Kelas</th>
                                <th>No telp</th>
                                <th>Jk</th>
                                <th widht="250px">Aksi</th>

                            </tr>
                        </thead>

                        <tbody>

                            @php
                            // variabel i untuk nomor
                                $i=1;
                            @endphp

                            @forelse ($datapeminjams as $datapeminjam)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $datapeminjam->nama_peminjam }}</td>
                                    <td>{{ $datapeminjam->kelas }}</td>
                                    <td>{{ $datapeminjam->no_telp }}</td>
                                    <td>{{ $datapeminjam->jk }}</td>
                                    <td>   <form action="{{ route('datapeminjams.destroy', $datapeminjam->id) }}" method="POST">
                                            <a href="{{ route('datapeminjams.show', $datapeminjam->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                            <a href="{{ route('datapeminjams.edit', $datapeminjam->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm ('apakah anda yakin ingin menghapus {{ $datapeminjam->datapeminjam }}?')">Hapus</button>
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
