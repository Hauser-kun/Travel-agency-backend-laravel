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
                        <h6>Edit Users
                            <a class="btn btn-warning float-end" href="{{ route('account.users') }}">Back</a>
                        </h6>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('account.updateUser', $users->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="col p-2">
                                <label for="">Name</label>
                                <input value="{{ old('title', $users->name) }}" type="text" name="name"
                                    class="form-control  @error('name') is-invalid  @enderror" >
                                @error('name')
                                    <p class="invalid-feedback">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="col p-2">
                                <label for="">Email</label>
                                <input value="{{ old('email', $users->email) }}" type="text" name="email"
                                    class="form-control  @error('email') is-invalid  @enderror " >
                                @error('email')
                                    <p class="invalid-feedback">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="col p-2">
                                <label for="">Password</label>
                                <input value="{{ old('password', $users->password) }}" type="text" name="password"
                                    class="form-control  @error('password') is-invalid  @enderror "
                                   >
                                @error('password')
                                    <p class="invalid-feedback">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="col p-2">
                                <label for="">Role</label>
                                <select class="form-select-sm" name="role" value="{{ old('status', $users->role) }}"
                                    id="">
                                    <option value="admin" {{ $users->role == 'admin' ? 'selected' : '' }}>Admin
                                    </option>
                                    <option value="user" {{ $users->role == 'user' ? 'selected' : '' }}>User
                                    </option>
                                </select>

                            </div>

                            <div class="mb-2">
                                <button class="btn btn-secondary">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
