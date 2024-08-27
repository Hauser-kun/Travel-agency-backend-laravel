@extends('front.layout.dashapp')

@section('main')

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">

                    <h4>Tour & Packages
                        <a class="btn btn-primary float-end" href="{{ route('account.createPackage') }}">Create Packages</a>
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
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection