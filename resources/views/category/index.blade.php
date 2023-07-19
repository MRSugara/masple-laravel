@extends('partials.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Create Product</h1>
        </div>
        <div class="col-lg-8 mb-5">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Name</label>
                    <input type="input" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" autofocus value="{{ old('name') }}" autocomplete="off" required>
                </div>

                <button class="btn-success btn dropdown" type="submit">Create</button>
            </form>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>

                                <button type="button" class="btn btn-warning badge " data-bs-toggle="modal"
                                    data-bs-target="#exampleModal-{{ $category->id }}"style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .5rem;">
                                    <span data-feather="edit"></span>
                                </button>
                                <a href="{{ route('category.destroy', ['id' => $category->id]) }}"
                                    class="badge bg-danger"><span data-feather="trash-2"></span></a>
                            </td>
                        </tr>
                    @endforeach
                    @foreach ($categories as $data)
                        <div class="modal fade" id="exampleModal-{{ $data->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit product</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('category.update', ['id' => $data->id]) }}" method="POST">
                                            @csrf
                                            @method('put')
                                            <div class="mb-3">
                                                <label for="name" class="col-form-label" id="name">Name:</label>
                                                <input type="text" class="form-control name" id="name"
                                                    name="name" value="{{ $data->name }}">
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

                </tbody>
            </table>
        </div>

    </main>
@endsection
