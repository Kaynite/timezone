<div class="row">
    <div class="col-md-12">
        <div class="heading-part text-center mb_10">
            <h2 class="main_title mt_50">Related Products</h2>
        </div>
        <div class="related_pro box">
            <div class="product-layout  product-grid related-pro  owl-carousel mb_50 ">
                @foreach (relatedProducts() as $product)
                <div class="item">
                    <div class="product-thumb">
                        <div class="image product-imageblock">
                            <a href="{{ route('product.show', [$product->id, $product->slug]) }}">
                                <img data-name="product_image" src="{{ Storage::url($product->mainImage->path ?? '') }}" alt="{{ $product->title }}" title="{{ $product->title }}" class="img-responsive">
                            </a>
                            <div class="button-group text-center">
                                <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                                <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                                <div class="compare"><a href="#"><span>Compare</span></a></div>
                                <div class="add-to-cart" onclick="event.preventDefault(); document.getElementById('cart-form-{{ $product->id }}').submit();"><a href="#"><span>Add to cart</span></a></div>
                                <form id="cart-form-{{ $product->id }}" action="{{ route('cart.store', $product->id) }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                        <div class="caption product-detail text-center">
                            <h6 data-name="product_name" class="product-name mt_20">
                                <a href="{{ route('product.show', [$product->id, $product->slug]) }}" title="{{ $product->title }}">{{ $product->title }}</a>
                            </h6>
                            <div class="rating">
                                {!! str_repeat('<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> ', $product->score->stars) !!}
                                {!! str_repeat('<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> ', 5 - $product->score->stars) !!}
                            </div>
                            @if($product->offer_price && $product->offer_ends_at > now() && $product->offer_starts_at < now())
                            <span class="price" style="display: block">
                                <span class="amount text-muted" style="text-decoration: line-through">{{ $product->price }} <span class="currencySymbol">LE</span></span>
                            </span>
                            <span class="price">
                                <span class="amount">{{ $product->offer_price }} <span class="currencySymbol">LE</span></span>
                                <div class="label label-success">
                                    {{ number_format(($product->offer_price - $product->price) / $product->price * 100, 2) }}%
                                </div>
                            </span>
                            @else
                            <span class="price" >
                                <span class="amount">{{ $product->price }} <span class="currencySymbol">LE</span></span>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>