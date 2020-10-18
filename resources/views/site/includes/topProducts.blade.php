@if (topProducts()->count() > 0)
<div class="left-special left-sidebar-widget mb_50">
    <div class="heading-part mb_10 ">
        <h2 class="main_title">Top Products</h2>
    </div>
    <div id="left-special" class="owl-carousel">

        @foreach (topProducts() as $topProducts)
        <ul class="row">
            @foreach ($topProducts as $product)
            <li class="item product-layout-left mb_20">

                <div class="product-list col-xs-4">
                    <div class="product-thumb">
                        <div class="image product-imageblock">
                            <a href="{{ route('product.show', [$product->id, $product->slug]) }}">
                                <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="{{ Storage::url($product->mainImage->path) }}">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-xs-8">
                    <div class="caption product-detail">
                        <h6 class="product-name"><a href="{{ route('product.show', [$product->id, $product->slug]) }}">{{ $product->title }}</a></h6>
                        <div class="rating">
                            {!! str_repeat('<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> ', $product->score->stars) !!}
                            {!! str_repeat('<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> ', 5 - $product->score->stars) !!}
                        </div>
                        <span class="price">
                            <span class="amount">{{ $product->price }}<span class="currencySymbol"> LE</span></span>
                        </span>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        @endforeach
    </div>
</div>
@endif