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
                        <h5 class="fw-bold">Create Tours & Packages
                            <a class="btn btn-secondary float-end" href="{{ route('account.packages') }}">Back</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('account.addPackages') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="">
                                <div class="col p-2">
                                    <label for="">Title</label>
                                    <input type="text" name="title" value="{{ old('title') }}"
                                        class="form-control  @error('title') is-invalid  @enderror "
                                        placeholder="First name">
                                    @error('title')
                                        <p class="invalid-feedback">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="col p-2">
                                    <label for="">Location</label>
                                    <input type="text" value="{{ old('location') }}" name="location" class="form-control  @error('location') is-invalid  @enderror" placeholder="location">
                                    @error('location')
                                        <p class="invalid-feedback">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="col p-2">
                                    <label for="">Period</label>
                                    <input type="text" value="{{ old('period') }}" name="period" class="form-control  @error('period') is-invalid  @enderror" placeholder="Period">
                                    @error('period')
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
                                        rows="10"> {{ old('description') }}</textarea>
                                    @error('description')
                                        <p class="invalid-feedback">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="col p-2">
                                    <label for="">Price</label>
                                    <input value="{{ old('price') }}" type="text" name="price" class="form-control" placeholder="price">
                                </div>

                                <div class="col p-2">
                                    <label for="">Slug</label>
                                    <input value="{{ old('slug') }}" type="text" name="slug" class="form-control" placeholder="slug">
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
                                    <label for="">Video</label>
                                    <input type="file" name="video" class="form-control  @error('video') is-invalid  @enderror">
                                    @error('video')
                                        <p class="invalid-feedback">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="col p-2">
                                    <label for="">Status</label>
                                    <select  class="form-select-sm" name="status" value="" id="">
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
