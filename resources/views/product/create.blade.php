@extends('partials.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Create Product</h1>
        </div>
        <div class="col-lg-8 mb-5">
            <form action="{{ route('product.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Name</label>
                    <input type="input" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" autofocus value="{{ old('name') }}" autocomplete="off" required>
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="input" class="form-control @error('stok') is-invalid @enderror" id="stok"
                        name="stok" value="{{ old('stok') }}" required autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" aria-label="category" id="category" name="category">
                        <option selected disabled>- Pilih Category -</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- <div class="mb-3">
                    <label for="satuan" class="form-label">Satuan</label>
                    <select class="form-select" aria-label="satuan" id="satuan" name="satuan">
                        <option selected disabled>- Pilih satuan -</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach

                    </select>
                </div> --}}
                <button type="submit" class="btn-success btn dropdown ">Create</button>
                <a href="{{ route('product.index') }}" class="btn-danger btn dropdown ">Cancel</a>
            </form>

        </div>

    </main>
@endsection
