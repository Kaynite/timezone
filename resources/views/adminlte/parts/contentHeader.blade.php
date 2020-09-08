<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Starter Page</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
            @if (!Route::currentRouteNamed('admin.home'))
            <li class="breadcrumb-item active">@yield('title')</li>
            @endif
        </ol>
    </div>
</div>