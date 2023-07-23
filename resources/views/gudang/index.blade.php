@extends('partials.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Gudang</h1>
        </div>
        <div class="card mb-4"style="width: auto">
            <div class="card-body ">
                <div class=" mb-3 ">
                    <form action="{{ route('gudang.store') }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="product" class="form-label">Item</label>
                            <select class="form-select" aria-label="product" id="product" name="product">
                                <option selected disabled>- Pilih Item -</option>
                                @foreach ($product as $produk)
                                    <option value="{{ $produk->id }}">{{ $produk->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="title" class="form-label">Stok</label>
                            <input type="input" class="form-control @error('stok') is-invalid @enderror" id="stok"
                                name="stok" autofocus value="{{ old('stok') }}" autocomplete="off" required>
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
                                <th scope="col">Stok</th>
                                {{-- <th scope="col">Stok</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gudang as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="text-right">{{ $data->product->name }} <a class="" href="{{ route('gudang.show',['id' => $data->id]) }}"><span data-feather="eye"></span></a></td>
                                    <td>{{ $data->product->satuan->name }}</td>
                                    <td>{{ $data->stok }}</td>
                                    {{-- <td>{{ $data->user->name }}</td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>





    </main>
@endsection
