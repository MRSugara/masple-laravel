@extends('partials.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Product</h1>
        </div>
        <div class="card mb-4"style="width: auto">
            <div class="card-body ">
                <div class=" mb-3 ">
                    <form action="{{ route('product.store') }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" aria-label="category" id="category" name="category">
                                <option selected disabled>- Pilih Category -</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="title" class="form-label">Name</label>
                            <input type="input" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" autofocus value="{{ old('name') }}" autocomplete="off" required>
                        </div>
                        <div class="mb-2">
                            <label for="satuan" class="form-label">Satuan</label>
                            <select class="form-select" aria-label="satuan" id="satuan" name="satuan">
                                <option selected disabled>- Pilih Satuan -</option>
                                @foreach ($satuan as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="ukuran" class="form-label">Ukuran</label>
                            <input type="input" class="form-control @error('ukuran') is-invalid @enderror" id="ukuran"
                                name="ukuran" value="{{ old('ukuran') }}" required autocomplete="off">
                        </div>
                        <div class="mb-2">
                            <label for="warna" class="form-label">Warna</label>
                            <input type="input" class="form-control @error('warna') is-invalid @enderror" id="warna"
                                name="warna" value="{{ old('warna') }}" required autocomplete="off">
                        </div>
                        <div class="mb-2">
                            <label for="harga" class="form-label">Harga</label>
                            <div class="d-flex">
                                <input type="input" class=" mx-1 form-control @error('harga_beli') is-invalid @enderror"
                                    id="harga_beli" name="harga_beli" value="{{ old('harga_beli') }}" required
                                    autocomplete="off" placeholder="Harga beli">
                                <input type="input" class=" mx-1 form-control @error('harga_jual') is-invalid @enderror"
                                    id="harga_jual" name="harga_jual" value="{{ old('harga_jual') }}" required
                                    autocomplete="off" placeholder="Harga jual">
                            </div>
                        </div>
                        <button type="submit" class="btn-success btn dropdown mt-2">Create</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive m-3">
                    <table class="table table-striped table-sm" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Item</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Harga Beli</th>
                                <th scope="col">Harga Jual</th>
                                <th scope="col">Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->satuan->name }}</td>
                                    <td>{{ $data->harga_beli }}</td>
                                    <td>{{ $data->harga_jual }}</td>
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
                                                <label for="category" class="form-label">Category</label>
                                                <select class="form-select" aria-label="category" id="category"
                                                    name="category">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="name" class="col-form-label" id="name">Name:</label>
                                                <input type="text" class="form-control name" id="name"
                                                    name="name" value="{{ $data->name }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="satuan" class="form-label">Satuan</label>
                                                <select class="form-select" aria-label="satuan" id="satuan"
                                                    name="satuan">
                                                    @foreach ($satuan as $satuans)
                                                        <option value="{{ $satuans->id }}">{{ $satuans->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="warna" class="col-form-label"
                                                    id="warna">Warna:</label>
                                                <input type="text" class="form-control warna" id="warna"
                                                    name="warna" type="text" value="{{ $data->warna }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="ukuran" class="col-form-label"
                                                    id="ukuran">Ukuran:</label>
                                                <input type="text" class="form-control ukuran" id="ukuran"
                                                    name="ukuran" type="number" value="{{ $data->ukuran }}">
                                            </div>
                                            <div class="mb-2">
                                                <label for="harga" class="form-label">Harga</label>
                                                <div class="d-flex">
                                                    <input type="input"
                                                        class=" mx-1 form-control @error('harga_beli') is-invalid @enderror"
                                                        id="harga_beli" name="harga_beli"
                                                        value="{{ $data->harga_beli }}" required autocomplete="off"
                                                        placeholder="Harga beli">
                                                    <input type="input"
                                                        class=" mx-1 form-control @error('harga_jual') is-invalid @enderror"
                                                        id="harga_jual" name="harga_jual"
                                                        value="{{ $data->harga_jual }}" required autocomplete="off"
                                                        placeholder="Harga jual">
                                                </div>
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
                </div>
            </div>
        </div>





    </main>
@endsection
