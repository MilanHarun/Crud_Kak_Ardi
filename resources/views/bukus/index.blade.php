@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('buku') }}</div>

                <div class="carrd-body">

                    @session('success')

                    <div class="alert alert-success" role="alert">{{ $value }}</div>
                    @endsession

                    <div class="grid gap-2 d-md-flex justify-content-md-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <a class="text-white text-decoration-none">Create</a>
                     </button>
                    </div>

                    {{-- ini halaman create menggunakan modal --}}
                    <!-- Button trigger -->


                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('bukus.store') }}" method="POST">
                                            @csrf
                                            <label for="inputbuku" class="form-label"><strong>Buku</strong></label>
                                            <input type="text" name="buku" class="form-control" @error('buku')is-invalid @enderror >

                                    </div>
                                   <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                        <a href="{{ url('bukus/create') }}" class="btn btn-primary">
                            Tambah Buku
                        </a>
                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>

                    <table class="table table-bordered table-striped mt-4">
                    <thead>
                        <tr>
                            <th width="80px">No</th>
                            <th>Kategori</th>
                            <th width="250px">Action</th>

                        </tr>

                    </thead>
                      @php
                            $i = 1;
                        @endphp
                    <tbody>
                        @forelse ($bukus as $buku)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $bukus->buku }}</td>
                            <td>
                                <form action="{{ route('bukus.destroy',$buku->id) }}" method="POST">
                                    <a href="{{ route('bukus.show',$buku->id) }}" class="btn btn-info btn-sm">show</a>
                                    <a href="{{ route('bukus.edit',$buku->id) }}" class="btn btn-warning btn-sm">edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('are you sure want to delete {{$buku->buku}} ?');">Delete</button>
                                </form>
                            </td>
                        </tr>

                        @empty
                        <td colspan="3">There are no data</td>

                        @endforelse
                    </tbody>
                </table>

                {{ $bukus->links() }}


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
