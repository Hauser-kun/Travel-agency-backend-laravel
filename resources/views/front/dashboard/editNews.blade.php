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
                        <h5 class="fw-bold">Update News & Articles
                            <a class="btn btn-secondary float-end" href="{{ route('account.news') }}">Back</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('account.updateNews',$News->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="">
                                <div class="col p-2">
                                    <label for="">Title</label>
                                    <input value="{{ old('title', $News->title) }}" type="text" name="title"
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
                                    <input type="text" value="{{ old('details', $News->details) }}" name="details"
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
                                        rows="10">{{ old('description', $News->description) }}</textarea>
                                    @error('title')
                                        <p class="invalid-feedback">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="col p-2">
                                    <label for="">Slug</label>
                                    <input type="text" value="{{ old('slug', $News->slug) }}" name="slug"
                                        class="form-control" placeholder="slug">
                                </div>
                                <div class="col p-2">
                                    <label for="">Current Image ⬇️</label>
                                    <br>
                                    @if ($News->image)
                                        <img class="shadow my-3" style="width:250px !important; height:200px;" src="{{ asset('uploads/artical/' . $News->image) }}" alt="Img" width="50"
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
                                        <option value="1" {{ ($News->status== 1) ? 'selected' : '' }}>Activate</option>
                                        <option value="0" {{ ($News->status == 0) ? 'selected' : '' }}>Deactivate</option>
                                    </select>

                                </div>

                                <div class="p-2">
                                    <button type="submit" class="btn btn-secondary fw-bold">Submit</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
