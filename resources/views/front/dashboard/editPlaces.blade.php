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
                        <h5 class="fw-bold">Update Tour Places
                            <a class="btn btn-secondary float-end" href="{{ route('account.places') }}">Back</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('account.updatePlaces', $places->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="">
                                <div class="col p-2">
                                    <label for="">Title</label>
                                    <input value="{{ old('title', $places->title) }}" type="text" name="title"
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
                                    <input type="text" value="{{ old('location', $places->location) }}" name="location"
                                        class="form-control  @error('location') is-invalid  @enderror"
                                        placeholder="location">
                                    @error('location')
                                        <p class="invalid-feedback">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                                <div class="col p-2">
                                    <label for="">Period</label>
                                    <input type="text" value="{{ old('period', $places->period) }}" name="period"
                                        class="form-control  @error('period') is-invalid  @enderror" placeholder="Period">
                                    @error('period')
                                        <p class="invalid-feedback">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>



                                <div class="col p-2">
                                    <label for="">Details</label>
                                    <input type="text" value="{{ old('details', $places->details) }}" name="details"
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
                                        rows="10">{{ old('description', $places->description) }}</textarea>
                                    @error('title')
                                        <p class="invalid-feedback">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <div class="col p-2">
                                    <label for="">Price</label>
                                    <input value="{{ old('price', $places->price) }}" type="text" name="price"
                                        class="form-control" placeholder="price">
                                </div>






                                <div class="col p-2">
                                    <label for="">Slug</label>
                                    <input type="text" value="{{ old('slug', $places->slug) }}" name="slug"
                                        class="form-control" placeholder="slug">
                                </div>
                                <div class="col p-2">
                                    <label for="">Current Image ⬇️</label>
                                    <br>
                                    @if ($places->image)
                                        <img class="shadow my-3" style="width:250px !important; height:200px;"
                                            src="{{ asset('uploads/places/' . $places->image) }}" alt="Img"
                                            width="50" height="50">
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

                                <div class="col p-2 mb-2">
                                    <label for="">Video</label>
                                    <label for="">Current video ⬇️</label>
                                    <br>
                                    @if ($places->video)
                                        <video class="shadow my-3" style="width:250px !important; height:200px;"
                                            src="{{ asset('uploads/places_video/' . $places->video) }}" alt="Img"
                                            width="50" height="50">
                                    @else
                                        <span style="padding: 4px 0" class="text-danger">No video</span>
                                    @endif

                                   
                                    <input type="file" name="video"
                                        class="form-control  @error('video') is-invalid  @enderror">
                                    @error('video')
                                        <p class="invalid-feedback">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>


                                <div class="col p-2">
                                    <label for="">Status</label>
                                    <select class="form-select-sm" name="status" value="{{ old('status',$places->status) }}"
                                        id="">
                                        <option value="1" {{ $places->status == 1 ? 'selected' : '' }}>Activate
                                        </option>
                                        <option value="0" {{ $places->status == 0 ? 'selected' : '' }}>Deactivate
                                        </option>
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
