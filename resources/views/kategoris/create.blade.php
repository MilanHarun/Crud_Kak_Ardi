@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>create</h3></div>

                    <div class="card-body">


                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{route('kategoris.index')}}"
                        class="btn btn-primary btn-sm">Back</a>
                        </div>

                        <form action="{{Route('kategoris.store') }}" method="POST">

                        @csrf

                        <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                               <select name="kategori" class="form-control" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach($categories as $id => $kategori)
                                    <option value="{{ $id }}">{{ $kategori }}</option>
                                @endforeach
                            </select>
                            </div>

                        @error('kategori')
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


