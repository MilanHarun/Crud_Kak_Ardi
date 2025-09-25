@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>create</h3></div>

                    <div class="card-body">


                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{route('bukus.index')}}"
                        class="btn btn-primary btn-sm">Back</a>
                        </div>

                        <form action="{{Route('bukus.store') }}" method="POST">

                        @csrf

                        <div class="mb-3">
                         <label for="inputbuku" class="form-label">kategori</label>
                        <input for="text" name="buku" class="form-control @error('buku') is-invalid @enderror" id="inputbuku" placeholder="Masukkan kategori">

                        @error('buku')
                        <div class="form-text text-danger"> {{$message}} </div>
                        @enderror

                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>




                    </div>


            </div>
        </div>
    </div>
</div>
@endsection


