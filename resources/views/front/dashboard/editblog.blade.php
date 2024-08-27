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
                        <h5 class="fw-bold">Update blog
                            <a class="btn btn-secondary float-end" href="{{ route('account.blogs') }}">Back</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('account.updateBlog',$blogs->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="">
                                <div class="col p-2">
                                    <label for="">Title</label>
                                    <input value="{{ old('title', $blogs->title) }}" type="text" name="title"
                                        class="form-control  @error('title') is-invalid  @enderror "
                                        placeholder="First name">
                                    @error('title')
                                        <p class="invalid-feedback">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="col p-2">
                                    <label for="">Details</label>
                                    <input type="text" value="{{ old('details', $blogs->details) }}" name="details"
                                        class="form-control" placeholder="Details">
                                    @error('title')
                                        <p class="invalid-feedback">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="col p-2">
                                    <label for="">Description</label>

                                    <textarea name="description" class="form-control" placeholder="Description" id="" cols="60"
                                        rows="10">{{ old('description', $blogs->description) }}</textarea>
                                    @error('title')
                                        <p class="invalid-feedback">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="col p-2">
                                    <label for="">Slug</label>
                                    <input type="text" value="{{ old('slug', $blogs->slug) }}" name="slug"
                                        class="form-control" placeholder="slug">
                                </div>
                                <div class="col p-2">
                                    <label for="">Current Image ⬇️</label>
                                    <br>
                                    @if ($blogs->image)
                                        <img class="shadow my-3" style="width:250px !important; height:200px;" src="{{ asset('uploads/blogs/' . $blogs->image) }}" alt="Img" width="50"
                                            height="50">
                                    @else
                                        <span>No image</span>
                                    @endif


                                    <input type="file" name="image" class="form-control">
                                    
                                    @error('image')
                                        <p class="invalid-feedback">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="col p-2">
                                    <label for="">Status</label>
                                    <select class="form-select-sm" name="status" value="{{ old('status') }}"
                                        id="">
                                        <option value="1" {{ ($blogs->status== 1) ? 'selected' : '' }}>Activate</option>
                                        <option value="0" {{ ($blogs->status == 0) ? 'selected' : '' }}>Deactivate</option>
                                    </select>

                                </div>
                                <div class="p-2">
                                    <button type="submit" class="btn btn-primary fw-bold">Submit</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
