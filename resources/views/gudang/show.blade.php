@extends('partials.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Gudang</h1>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="table-responsive m-3">
                    <table class="table table-striped table-sm" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                {{-- <th scope="col">Penanggung Jawab</th> --}}
                                {{-- <th scope="col">Tanggal</th> --}}
                                {{-- <th scope="col">Jam</th>
                                <th scope="col">Stok</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gudang as $gudangs)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    {{-- <td>{{ $gudangs->user->name }}</td> --}}
                                    {{-- <td>{{  }}</td> --}}
                                    {{-- <td>{{ $data->product->satuan->name }}</td> --}}
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>





    </main>
@endsection
