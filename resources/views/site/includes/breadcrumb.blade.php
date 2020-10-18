@if(isset($product))
<div class="col-sm-12">
    <div class="breadcrumb ptb_20">
        <h1>{{ $product->title }}</h1>
        <ul>
            <li>
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li>
                <a href="{{ route('category.show', [$product->category->id, $product->category->slug]) }}">{{ $product->category->{'name_'.siteLang()} }}</a>
            </li>
        </ul>
    </div>
</div>
@endif
@if(Route::currentRouteNamed('cart.index'))
<div class="col-sm-12">
    <div class="breadcrumb ptb_20">
        <h1>Shopping Cart</h1>
        <ul>
            <li>
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li class="active">
                Shopping Cart
            </li>
        </ul>
    </div>
</div>
@endif