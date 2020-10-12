@foreach ($products as $product)
<div class="product-layout product-grid col-md-4 col-xs-6 ">
    <div class="item">
        <div class="product-thumb clearfix mb_30">
            <div class="image product-imageblock">
                <a href="{{ route('product.show', $product->id) }}">
                    <img data-name="product_image" src="{{ Storage::url($product->mainImage->path) }}" alt="iPod Classic" title="iPod Classic" class="img-responsive" />
                </a>
                <div class="button-group text-center">
                    <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                    <div class="quickview"><a href="#"><span>Quick View</span></a></div>
                    <div class="compare"><a href="#"><span>Compare</span></a></div>
                    <div class="add-to-cart" onclick="event.preventDefault(); document.getElementById('cart-form').submit();"><a href="#"><span>Add to cart</span></a></div>
                    <form id="cart-form" action="{{ route('cart.store', $product->id) }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
            
            <div class="caption product-detail text-center">
                <h6 data-name="product_name" class="product-name mt_20">
                    <a href="{{ route('product.show', $product->id) }}">{{ $product->title }}</a>
                </h6>
                <div class="rating">
                    <span class="fa fa-stack">
                        <i class="fa fa-star-o fa-stack-1x"></i>
                        <i class="fa fa-star fa-stack-1x"></i>
                    </span>
                    <span class="fa fa-stack">
                        <i class="fa fa-star-o fa-stack-1x"></i>
                        <i class="fa fa-star fa-stack-1x"></i>
                    </span>
                    <span class="fa fa-stack">
                        <i class="fa fa-star-o fa-stack-1x"></i>
                        <i class="fa fa-star fa-stack-1x"></i>
                    </span>
                    <span class="fa fa-stack">
                        <i class="fa fa-star-o fa-stack-1x"></i>
                        <i class="fa fa-star fa-stack-1x"></i>
                    </span>
                    <span class="fa fa-stack">
                        <i class="fa fa-star-o fa-stack-1x"></i>
                        <i class="fa fa-star fa-stack-x"></i>
                    </span>
                </div>

                <span class="price">
                    <span class="amount">{{ $product->price }}<span class="currencySymbol"> LE</span></span>
                </span>
                <p class="product-desc mt_20 mb_60">
                    {{ $product->content }}
                </p>
            </div>
        </div>
    </div>
</div>
@endforeach