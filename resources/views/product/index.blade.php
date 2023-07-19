@extends('partials.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Product</h1>
        </div>

        <a data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $product }}" type="button" class="mb-3 fs-4">Create new
            item</a>
        <div class="modal fade" id="exampleModal-{{ $product }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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
        </div>


        <div class="table-responsive">

            {{-- <form action="" method="get">
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <label for="" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control" placeholder="Name"
                            value="{{ isset($_GET['name']) ? $_GET['name'] : '' }}">
                    </div>
                    <div class="col-sm-3">
                        <label for="" class="form-label">Age</label>
                        <input name="number" type="number" class="form-control" placeholder="Age"
                            value="{{ isset($_GET['age']) ? $_GET['age'] : '' }}">
                    </div>
                    <div class="col-sm-3">
                        <label for="" class="form-label">Gender</label>
                        <select name="gender" class="form-select">
                            <option value="">-</option>
                            <option value="male" selected="{{ isset($_GET['gender']) && $_GET['gender'] == 'male' }}">Male
                            </option>
                            <option value="female" selected="{{ isset($_GET['gender']) && $_GET['gender'] == 'male' }}">
                                Female</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary mt-4">Search</button>
                    </div>
                </div>
            </form> --}}
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
                            {{-- <td>
                                <button type="button" class="btn btn-primary badge " data-bs-toggle="modal"
                                    data-bs-target="#exampleModal-{{ $data->id }}"style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .5rem;">
                                    <span data-feather="eye"></span>
                                </button>
                                <button type="button" class="btn btn-warning badge " data-bs-toggle="modal"
                                    data-bs-target="#exampleModal-{{ $data->id }}"style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .5rem;">
                                    <span data-feather="edit"></span>
                                </button>
                                <a href="{{ route('category.destroy', ['id' => $category->id]) }}"
                                    class="badge bg-danger"><span data-feather="trash-2"></span></a>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
