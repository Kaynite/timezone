@extends('site.layout.main')

@section('content')


<div class="container">
    <div class="row">

        {{-- @include('site.includes.breadcrumb') --}}

      <div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">
			@include('site.includes.categoriesMenu')
			@include('site.includes.sideBanner')
			@include('site.includes.refineSearch')
			@include('site.includes.topProducts')
      </div>
  
        <div class="col-sm-8 col-lg-9 mtb_20">
            
            <div class="category-page-wrapper mb_30">
                <div class="list-grid-wrapper pull-left">
                    <div class="btn-group btn-list-grid">
                        <button type="button" id="grid-view" class="btn btn-default grid-view active"></button>
                        <button type="button" id="list-view" class="btn btn-default list-view"></button>
                    </div>
                </div>
                <div class="page-wrapper pull-right">
                    <label class="control-label" for="input-limit">Show :</label>
                    <div class="limit">
                        <select id="input-limit" class="form-control">
                            <option value="10" selected="selected">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="75">75</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                </div>
                <div class="sort-wrapper pull-right">
                    <label class="control-label" for="input-sort">Sort By :</label>
                    <div class="sort-inner">
                        <select id="input-sort" class="form-control">
                            <option value="ASC" selected="selected">Default</option>
                            <option value="ASC">Name (A - Z)</option>
                            <option value="DESC">Name (Z - A)</option>
                            <option value="ASC">Price (Low &gt; High)</option>
                            <option value="DESC">Price (High &gt; Low)</option>
                            <option value="DESC">Rating (Highest)</option>
                            <option value="ASC">Rating (Lowest)</option>
                            <option value="ASC">Model (A - Z)</option>
                            <option value="DESC">Model (Z - A)</option>
                        </select>
                    </div>
                    <span><i class="fa fa-angle-down" aria-hidden="true"></i></span>
                </div>
            </div>

            
            <div class="row" id="products-box">
				@foreach ($products as $product)
				<div class="product-layout product-grid col-md-4 col-xs-6 ">
                    <div class="item">
                        <div class="product-thumb clearfix mb_30">
                            <div class="image product-imageblock">
								<a href="{{ route('product.show', [$product->id, $product->slug]) }}">
									<img data-name="product_image" src="{{ Storage::url($product->mainImage->path ?? '') }}" alt="iPod Classic" title="iPod Classic" class="img-responsive" />
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
									<a href="{{ route('product.show', [$product->id, $product->slug]) }}">{{ $product->title }}</a>
                                </h6>
                                <div class="rating">
                                    {!! str_repeat('<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> ', $product->score->stars) !!}
                                    {!! str_repeat('<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> ', 5 - $product->score->stars) !!}
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
            </div>   
            <div id="pagination-box">
                {{ $products->links('vendor.pagination.custom') }}
            </div>
        </div>


    </div>
</div>

@include('site.includes.footer')
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
@endsection

@section('scripts')
<script src="{{ asset('js/jquery-ui.js') }}"></script>
<script>
	$(function() {
		$("#slider-range").slider({
			range: true,
			min: 0,
			max: {{ $maxPrice }},
			values: [0, {{ $maxPrice }}],
			slide: function(event, ui) {
				$("#amount").val(ui.values[0] + " - " + ui.values[1]);
				$("#amount-min").val(ui.values[0]);
				$("#amount-max").val(ui.values[1]);
			}
			});
			$("#amount").val($("#slider-range").slider("values", 0) + " - " + $("#slider-range").slider("values", 1));
			$("#amount-min").val($("#slider-range").slider("values", 0));
			$("#amount-max").val($("#slider-range").slider("values", 1));
    });
    
    var limit = document.getElementById('input-limit');
    limit.addEventListener('change', function() {
        $.ajax({
            type: "GET",
            url: "{{ route('category.show', [$category->id, $category->slug]) }}",
            data: {
                perPage: limit.value,
            },
            beforeSend: function() {
                $('#products-box').html(
                    '<div style="display: flex; justify-content: center;"><img src="{{ asset("images/loder.gif") }}" alt=""></div>'
                );
            },
            cache: false,
            success: function(data){
                $('#products-box').html(data.html);
                $('#pagination-box').html(data.pagination_links);
            },
            error: function (error) {

            }
        });
	});
	
	var searchBtn = document.getElementById('search-btn');
	searchBtn.addEventListener('click', function() {
		var formData = new FormData(document.getElementById('shop-search-form'));
		$.ajax({
			url: "{{ route('shop') }}",
			type: "GET",
            data: $('#shop-search-form').serialize(),
            beforeSend: function() {
                $('#products-box').html(
                    '<div style="display: flex; justify-content: center;"><img src="{{ asset("images/loder.gif") }}" alt=""></div>'
                );
            },
			cache: false,
			success: function(data){
                if(data.count > 0) {
                    $('#products-box').html(data.html);
                    $('#pagination-box').html(data.pagination_links);
                } else {
                    $('#products-box').html(`<h3 style="display:flex; justify-content:center">No Results Found for Your Search!</h3 style="display:flex; justify-content:center">`);
                }
			},
			error: function (error) {
			}
		});
	});

</script>
@endsection