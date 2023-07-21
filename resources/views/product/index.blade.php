@extends('partials.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Product</h1>
        </div>

        <div class="col-lg-3 mb-3 p-3">
            <form action="{{ route('product.store') }}" method="POST">
                @csrf
                <div class="mb-2">
                    <label for="title" class="form-label">Name</label>
                    <input type="input" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" autofocus value="{{ old('name') }}" autocomplete="off" required>
                </div>
                <div class="mb-2">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="input" class="form-control @error('stok') is-invalid @enderror" id="stok"
                        name="stok" value="{{ old('stok') }}" required autocomplete="off">
                </div>
                {{-- <div class="mb-2">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" aria-label="category" id="category" name="category">
                        <option selected disabled>- Pilih Category -</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div> --}}
                <button type="submit" class="btn-success btn dropdown ">Create</button>
            </form>

        </div>
        {{-- <a data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $product }}" type="button"
            class="mb-3 fs-4">Create new
            item</a>
        <div class="modal fade" id="exampleModal-{{ $product }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('product.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="col-form-label" id="name">Name:</label>
                                <input type="text" class="form-control name" id="name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="stok" class="col-form-label" id="stok">Stok:</label>
                                <input type="text" class="form-control stok" id="stok" name="stok"
                                    type="number">
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div> --}}


        <div class="table-responsive m-3">

            <form action="/" method="get">
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="name" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" placeholder=""
                            value="{{ isset($_GET['name']) ? $_GET['name'] : '' }}">
                    </div>
                    <div class="col-sm-3">
                        <label for="" class="form-label">Gender</label>
                        <select name="gender" class="form-select">
                            <option value="">-</option>
                            <option value="male" selected="{{ isset($_GET['gender']) && $_GET['gender'] == 'male' }}">
                                Male
                            </option>
                            <option value="female" selected="{{ isset($_GET['gender']) && $_GET['gender'] == 'male' }}">
                                Female</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary mt-4">Search</button>
                    </div>
                </div>
            </form>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Item</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->stok }}</td>
                            <td>{{ $data->category->name }}</td>
                            <td>
                                <button type="button" class="btn btn-warning badge " data-bs-toggle="modal"
                                    data-bs-target="#exampleModal--{{ $data->id }}"style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .5rem;">
                                    <span data-feather="edit"></span>
                                </button>
                                <a href="{{ route('product.destroy', $data->id) }}" class="badge bg-danger"><span
                                        data-feather="trash-2"></span></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @foreach ($product as $edit)
                <div class="modal fade" id="exampleModal--{{ $edit->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit product</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('product.update', ['id' => $data->id]) }}" method="POST">
                                    @csrf
                                    @method('put')
                                    <div class="mb-3">
                                        <label for="name" class="col-form-label" id="name">Name:</label>
                                        <input type="text" class="form-control name" id="name" name="name"
                                            value="{{ $data->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="stok" class="col-form-label" id="stok">Stok:</label>
                                        <input type="text" class="form-control stok" id="stok" name="stok"
                                            type="number" value="{{ $data->stok }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="category" class="form-label">Category</label>
                                        <select class="form-select" aria-label="category" id="category"
                                            name="category">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">update</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


    </main>
@endsection
