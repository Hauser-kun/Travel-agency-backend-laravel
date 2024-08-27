@extends('front.layout.dashapp')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (Session::has('success'))
                <p class="alert alert-success" > {{ Session::get('success') }} </p>
                    
                @endif
    
                @if (Session::has('error'))
                <p class="alert alert-danger" > {{ Session::get('error') }} </p>
                    
                @endif
                <div class="card">
                    <div class="card-header">
                        <h5 class="fw-bold">Create blog
                            <a class="btn btn-secondary float-end" href="{{ route('account.blogs') }}">Back</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('account.addBlogs') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="">
                                <div class="col p-2">
                                    <label for="">Title</label>
                                    <input value="{{ old('title') }}" type="text" name="title"
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
                                    <input type="text" value="{{ old('details') }}" name="details" class="form-control  @error('details') is-invalid  @enderror" placeholder="Details">
                                    @error('details')
                                        <p class="invalid-feedback">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="col p-2">
                                    <label for="">Description</label>

                                    <textarea name="description" class="form-control  @error('description') is-invalid  @enderror" placeholder="Description" id="" cols="60"
                                        rows="10">{{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="invalid-feedback">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="col p-2">
                                    <label for="">Slug</label>
                                    <input type="text" value="{{ old('slug') }}" name="slug" class="form-control" placeholder="slug">
                                </div>
                                <div class="col p-2">
                                    <label for="">Image</label>
                                    <input type="file" name="image" class="form-control  @error('image') is-invalid  @enderror">
                                    @error('image')
                                        <p class="invalid-feedback">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="col p-2">
                                    <label for="">Status</label>
                                    <select class="form-select-sm" name="status" value="{{ old('status') }}" id="">
                                        <option value="1">Activate</option>
                                        <option value="0">Deactivate</option>
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
