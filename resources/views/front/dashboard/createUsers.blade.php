@extends('front.layout.dashapp')

@section('main')
    <div class="container">
        <div class="row">
            <div class="col-12">

                @if (Session::has('success'))
                    <p class="alert alert-success">{{ Session::get('success') }}</p>
                @endif

                @if (Session::has('error'))
                    <p class="alert alert-success">{{ Session::get('error') }}</p>
                @endif
                
                <div class="card">
                    <div class="card-header">
                        <h6> Add Users
                            <a class="btn btn-primary float-end " href="{{ route('account.users') }}">Back</a>
                        </h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('account.addUsers') }}" method="post">
                            @csrf

                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" value="{{ old('name') }}" name="name" id="name"
                                    class="form-control   @error('name') is-invalid @enderror">
                                @error('name')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="text" value="{{ old('email') }}" name="email" id="email"
                                    class="form-control   @error('email') is-invalid @enderror">
                                @error('email')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="text" value="{{ old('password') }}" name="password" id="password"
                                    class="form-control   @error('password') is-invalid @enderror">
                                @error('password')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror

                            </div>
                            <div class="mb-3">
                                <label for="role">Role</label>
                                <select class="form-select-sm" name="role" id="">

                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>


                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
