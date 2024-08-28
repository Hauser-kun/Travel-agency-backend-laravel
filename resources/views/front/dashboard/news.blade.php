@extends('front.layout.dashapp')

@section('main')

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                @if (Session::has('success'))
                    <p class="alert alert-success"> {{ Session::get('success') }} </p>
                @endif

                @if (Session::has('error'))
                    <p class="alert alert-danger"> {{ Session::get('error') }} </p>
                @endif
                <div class="card">
                    <div class="card-header fw-bolder">
                        News & Articles

                        <a class="btn btn-primary fw-bold float-end" href="{{ route('account.createNews') }}">Create New</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Title</th>
                                    <th>Details</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($News->isNotEmpty())
                                    @foreach ($News as $New)
                                        <tr>
                                            <td>{{ $New->id }}</td>
                                            <td>{{ $New->title }}</td>
                                            <td>{{ $New->details }}</td>
                                            <td>{{ $New->description }}</td>
                                            <td>
                                                @if ($New->image)
                                                    <img src="{{ asset('uploads/artical/' . $New->image) }}" alt="Img"
                                                        width="50" height="50">
                                                @else
                                                    <span>No image</span>
                                                @endif

                                            </td>

                                            <td>{{ $New->status }}</td>

                                            <td>
                                                <div class="d-flex mx-3">
                                                    <a href="{{ route('account.editNews', $New->id) }}"
                                                        class="btn btn-primary mx-2">Edit</a>
                                                    <form action="{{ route('account.deleteNews', $New->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <button type="submit" class="btn btn-danger">Delete</button>

                                                    </form>

                                                </div>


                                            </td>


                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>
                        {{ $News->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
