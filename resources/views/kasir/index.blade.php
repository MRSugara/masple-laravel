@extends('partials.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Product</h1>
        </div>
        <div class="card mb-4" style="width: 350px">
            <div class="card-body ">
                <div class=" mb-3 ">
                    <form action="{{ route('kasir.store') }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <label for="title" class="form-label">Name</label>
                            <input type="input" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" autofocus value="{{ old('name') }}" autocomplete="off" required>
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="input" class="form-control @error('password') is-invalid @enderror" id="password"
                                name="password" value="{{ old('password') }}" required autocomplete="off">
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
                                <th scope="col">Password</th>
                                <th scope="col">Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->password }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning badge " data-bs-toggle="modal"
                                            data-bs-target="#exampleModal--{{ $data->id }}"style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .5rem;">
                                            <span data-feather="edit"></span>
                                        </button>
                                        <a href="{{ route('kasir.destroy', $data->id) }}" class="badge bg-danger"><span
                                                data-feather="trash-2"></span></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @foreach ($user as $edit)
                        <div class="modal fade" id="exampleModal--{{ $edit->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit user</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('kasir.update', ['id' => $edit->id ]) }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <div class="mb-3">
                                                <label for="name" class="col-form-label" id="name">Name:</label>
                                                <input type="text" class="form-control name" id="name"
                                                    name="name" value="{{ $edit->name }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="password" class="col-form-label"
                                                    id="password">Password:</label>
                                                <input type="text" class="form-control password" id="password"
                                                    name="password" type="text" value="{{ $edit->password }}">
                                            </div>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
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
