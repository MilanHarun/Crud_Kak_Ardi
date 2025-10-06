@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ ('Dashboard') }}</div>

                <div class="card-body">

                     @session ('success')
                     <div class="alert alert-success" role ="alert">{{$value}}</div>
                     @endsession

                     {{-- frist button --}}
                     <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Tambah Buku
                        </button>
                     </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Buku</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route ('bukus.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="inputBuku" class="form-label"><strong>Judul Buku</strong></label>
                                            <input type="text" name="buku" id="inputBuku" class="form-control @error('buku') is-invalid @enderror">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputPengarang" class="form-label"><strong>Pengarang</strong></label>
                                            <input type="text" name="pengarang" id="inputPengarang" class="form-control @error('pengarang') is-invalid @enderror">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputPenerbit" class="form-label"><strong>Penerbit</strong></label>
                                            <input type="text" name="penerbit" id="inputPenerbit" class="form-control @error('penerbit') is-invalid @enderror">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputKategori" class="form-label"><strong>Kategori</strong></label>
                                            <input type="text" name="kategori" id="inputKategori" class="form-control @error('kategori') is-invalid @enderror">
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
                                <th width="80px">No</th>
                                <th>Buku</th>
                                <th>Pengarang</th>
                                <th>Penerbit</th>
                                <th>Kategori</th>

                                <th width="250px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i=1;
                            @endphp
                            @forelse ($bukus as $buku)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $buku->buku }}</td>
                                    <td>{{ $buku->pengarang }}</td>
                                    <td>{{ $buku->penerbit }}</td>
                                    <td>{{ $buku->kategori }}</td>

                                    <td>
                                        <form action="{{ route('bukus.destroy', $buku->id) }}" method="POST">
                                            <a href="{{ route('bukus.show', $buku->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                            <a href="{{ route('bukus.edit', $buku->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm ('apakah anda yakin ingin menghapus {{ $buku->buku }}?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="6">Yahhh... Belum ada datanya nih</td>
                            @endforelse
                        </tbody>
                     </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
