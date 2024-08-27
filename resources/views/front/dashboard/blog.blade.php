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
                        Blogs

                        <a class="btn btn-primary fw-bold float-end" href="{{ route('account.createBlogs') }}">Create Blog</a>
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
                                @if ($blogs->isNotEmpty())
                                
                                    @foreach ($blogs as $blog)
                                        <tr>
                                            <td>{{ $blog->id }}</td>
                                            <td>{{ $blog->title }}</td>
                                            <td>{{ $blog->details }}</td>
                                            <td>{{ $blog->description }}</td>
                                            <td>
                                                @if ($blog->image)
                                                    <img src="{{ asset('uploads/blogs/'.$blog->image) }}" alt="Img" width="50"
                                                        height="50">
                                                @else
                                                    <span>No image</span>
                                                @endif

                                            </td>

                                            <td>{{ $blog->status }}</td>
                                          
                                            <td>
                                                <div class="d-flex mx-3">
                                                    <a href="{{ route('account.editBlog',$blog->id) }}" class="btn btn-primary mx-2">Edit</a>
                                                    <form action="{{ route('account.deleteBlog', $blog->id) }}" method="post">
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
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
