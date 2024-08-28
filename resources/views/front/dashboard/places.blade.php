@extends('front.layout.dashapp')

@section('main')

    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (Session::has('success'))
                    <p class="alert alert-success"> {{ Session::get('success') }} </p>
                @endif

                @if (Session::has('error'))
                    <p class="alert alert-danger"> {{ Session::get('error') }} </p>
                @endif
                <div class="card">
                    <div class="card-header">

                        <h4>Tour & Packages
                            <a class="btn btn-primary float-end" href="{{ route('account.createPlaces') }}">Create
                                Packages</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-border border-striped">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Title</th>
                                    <th>Location</th>
                                    <th>Period</th>
                                    <th>Details</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Slug</th>
                                    <th>Image</th>
                                    <th>Video</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if ($places->isNotEmpty())
                                    @foreach ($places as $place)
                                        <tr>
                                            <td>{{ $place->id }}</td>
                                            <td>{{ $place->title }}</td>
                                            <td>{{ $place->location }}</td>
                                            <td>{{ $place->period }}</td>
                                            <td>{{ $place->details }}</td>
                                            <td>{{ $place->description }}</td>
                                            <td>{{ $place->price }}</td>
                                            <td>{{ $place->slug }}</td>
                                            <td>
                                                @if ($place->image)
                                                    <img src="{{ asset('uploads/places/' . $place->image) }}" width="50"
                                                        height="50" alt="">
                                                @else
                                                    <p>No Images</p>
                                                @endif

                                            </td>
                                            <td>
                                                @if ($place->video)
                                                    <video
                                                        src="{{ asset('uploads/tour_places/' . $place->video) }}"></video>
                                                @else
                                                    <p>No Video</p>
                                                @endif

                                            </td>
                                            <td>{{ $place->status }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('account.editPlaces', $place->id) }}"
                                                        class="btn btn-primary mx-2">Edit</a>
                                                    <form action="{{ route('account.deleteplaces', $place->id) }}"
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
                        {{ $places->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
