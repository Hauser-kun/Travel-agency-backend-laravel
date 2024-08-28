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

                <div  class="card">
                    <div class="card-header">
                        <h6 class="mt-2">Users Management
                            <a class="btn btn-primary float-end" href="{{ route('account.createUsers') }}">Create Users</a>

                        </h6>
                    </div>

                    <div class="card-body">
                        <table class="table table-border table-striped  table-responsive">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($users->isNotEmpty())
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('account.editUsers', $user->id )}}" class="btn btn-primary mx-2">Edit</a>
                                            <form action="{{ route('account.deleteUsers',$user->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button  class="btn btn-danger">Delete</button>

                                            </form>
                                        </div>
                                    </td>
                               

                                </tr>
                                    
                                @endforeach
                                    
                                @endif
                              
                            </tbody>
                        </table>
                        {{ $users->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
