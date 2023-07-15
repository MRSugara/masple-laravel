@extends('partials.main')

@section('container')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Product</h1>
        </div>

        <h5><a href="/product/create">Create new item</a></h5>
        <div class="table-responsive">

            <form action="/product" method="get">
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
            </form>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
            </table>
        </div>
    </main>
@endsection
