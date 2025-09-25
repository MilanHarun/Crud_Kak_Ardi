@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>edit</h3></div>

                    <div class="card-body">


                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{route('bukus.index')}}"
                        class="btn btn-primary btn-sm">Back</a>
                        </div>

                        <form action="{{Route('bukus.update',$buku->id) }}" method="POST">

                        @csrf
                        @method('PUT')

                       <!-- Input kategori -->
                        <div class="mb-3 row">
                            <label for="updatebuku" class="col-sm-2 col-form-label">Kategori</label>
                            <div class="col-sm-10">
                                <input type="text"
                                       class="form-control @error('buku') is-invalid @enderror"
                                       name="buku"
                                       id="updatebuku"
                                       value="{{ old('buku', $buku->buku) }}"
                                       required>
                                @error('buku')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning">Edit</button>




                    </div>


            </div>
        </div>
    </div>
</div>
@endsection


