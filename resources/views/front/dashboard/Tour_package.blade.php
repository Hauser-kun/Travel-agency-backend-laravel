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
                            <a class="btn btn-primary float-end" href="{{ route('account.createPackage') }}">Create
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

                                @if ($packages->isNotEmpty())
                                    @foreach ($packages as $package)
                                        <tr>
                                            <td>{{ $package->id }}</td>
                                            <td>{{ $package->title }}</td>
                                            <td>{{ $package->location }}</td>
                                            <td>{{ $package->period }}</td>
                                            <td>{{ $package->details }}</td>
                                            <td>{{ $package->description }}</td>
                                            <td>{{ $package->price }}</td>
                                            <td>{{ $package->slug }}</td>
                                            <td>
                                                @if ($package->image)
                                                    <img src="{{ asset('uploads/tour/' . $package->image) }}" width="50"
                                                        height="50" alt="">
                                                @else
                                                    <p>No Images</p>
                                                @endif

                                            </td>
                                            <td>
                                                @if ($package->video)
                                                    <video
                                                        src="{{ asset('uploads/tour_video/' . $package->video) }}"></video>
                                                @else
                                                    <p>No Video</p>
                                                @endif

                                            </td>
                                            <td>{{ $package->status }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('account.editPackages', $package->id) }}"
                                                        class="btn btn-primary mx-2">Edit</a>
                                                    <form action="{{ route('account.deletepackage', $package->id) }}"
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
                        <div class="">
                            {{ $packages->links('pagination::bootstrap-5') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
