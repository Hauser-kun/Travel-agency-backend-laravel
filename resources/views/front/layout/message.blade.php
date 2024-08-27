@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong> <span style="text-transform: capitalize; font-weight:700;">Hey {{ Auth::user()->name }}!! </span> </strong> {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><span style="text-transform: capitalize;">Hey {{ Auth::user()->name }}!! </span> </strong> {{ Session::get('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

