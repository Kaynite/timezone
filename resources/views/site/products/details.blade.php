@extends('site.layout.main')

@section('content')


<div class="container">
    <div class="row">

        @include('site.includes.breadcrumb')

        <div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">
            @include('site.includes.categoriesMenu')
            @include('site.includes.sideBanner')
            @include('site.includes.topProducts')
        </div>

        <div class="col-sm-8 col-lg-9 mtb_20">
            {{-- Product --}}
            <div class="row mt_10 ">
                <div class="col-md-6">
                    <div>
                        <a class="thumbnails">
                            <img data-name="product_image" src="{{ Storage::url($product->mainImage->path ?? '') }}" alt="" />
                        </a>
                    </div>

                    <div id="product-thumbnail" class="owl-carousel">
                        @foreach ($product->images as $image)
                        <div class="item">
                            <div class="image-additional">
                                <a class="thumbnail" href="{{ Storage::url($image->path) }}" data-fancybox="group1">
                                    <img src="{{ Storage::url($image->path) }}" alt="" />
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
                <div class="col-md-6 prodetail caption product-thumb">
                    <h4 data-name="product_name" class="product-name">
                        {{-- <a href="#" title="Casual Shirt With Ruffle Hem">New LCDScreen and HD Video Recording</a> --}}
                        {{ $product->title }}
                    </h4>
                    <div class="rating">
                        {!! str_repeat('<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> ', $product->score->stars) !!}
                        {!! str_repeat('<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> ', 5 - $product->score->stars) !!}
                    </div>
                    <span class="price mb_20"><span class="amount">{{ $product->price }}</span><span class="currencySymbol"> LE</span>
                    </span>
                    <hr>
                    <ul class="list-unstyled product_info mtb_20">
                        @isset($product->manufacturer)
                        <li>
                            <label>Manufacturer:</label>
                            <span>{{ $product->manufacturer->name ?? 'null' }}</span>
                        </li>
                        @endisset
                        @isset($product->trademark)
                        <li>
                            <label>Trademark:</label>
                            <span>{{ $product->trademark->name ?? 'null' }}</span>
                        </li>
                        @endisset
                        <li>
                            <label>Product Code:</label>
                            <span>Product #{{ $product->id }}</span>
                        </li>
                        <li>
                            <label>Availability:</label>
                            @if ($product->stock > 0)
                            <span class="label label-success"> In Stock</span>
                            @else
                            <span class="label label-danger"> Out of Stock</span>
                            @endif
                            
                        </li>
                    </ul>
                    <hr>
                    <p class="product-desc mtb_30">
                        {{ $product->description }}
                    </p>
                    <div id="product">
                        <form id="cart-form" action="{{ route('cart.store', $product->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="Sort-by col-md-6">
                                        <label>Size</label>
                                        <select name="size" id="select-by-size" class="selectpicker form-control">
                                            <option>Small</option>
                                            <option>Medium</option>
                                            <option>Large</option>
                                        </select>
                                    </div>
                                    <div class="Color col-md-6">
                                        <label>Color</label>
                                        <select name="color" id="select-by-color" class="selectpicker form-control">
                                            <option>{{ $product->color->name ?? '' }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="qty mt_30 form-group">
                                <label>Quantity</label>
                                <input name="quantity" min="1" max="{{ $product->stock }}" value="1" type="number" class="form-control">
                            </div>
                        </form>
                        <div class="button-group mt_30">
                            <div class="add-to-cart" onclick="event.preventDefault(); document.getElementById('cart-form').submit();"><a href="#"><span>Add to cart</span></a></div>
                            <div class="wishlist"><a href="#"><span>wishlist</span></a></div>
                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Reviews --}}
            <div class="row">
                <div class="col-md-12">
                    <div id="exTab5" class="mtb_30">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#1c" data-toggle="tab">Overview</a></li>
                            <li><a href="#2c" data-toggle="tab">Reviews ({{ $product->reviews->count() }})</a></li>
                        </ul>
                        <div class="tab-content ">
                            <div class="tab-pane active pt_20" id="1c">
                                <p>{!! $product->overview !!}</p>
                            </div>
                            <div class="tab-pane" id="2c">
                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                @if($product->reviews->count() > 0)
                                <div>
                                @foreach ($product->reviews as $review)
                                <div class="review-block" style="padding: 0.5rem 0; border-bottom: 1px solid #ccc;">
                                    <div class="rating">
                                        {!! str_repeat('<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span> ', $review->rating) !!}
                                        {!! str_repeat('<span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span> ', 5 - $review->rating) !!}
                                    </div>
                                    <span>By: <strong>{{ $review->name }}</strong> on {{ $review->created_at }}</span>
                                    <p style="margin-top: 1.25rem">{{ $review->review }}</p>
                                </div>
                                @endforeach
                                <hr style="margin: 5rem 0 2rem;">
                                </div>
                                @endif
                                <form class="form-horizontal" action="{{ route('review.store', $product->id) }}" method="POST">
                                    @csrf
                                    <div id="review"></div>
                                    <h4 class="mt_20 mb_30">Write a review</h4>
                                    @auth

                                    @else
                                    <div class="form-group required">
                                        <div class="col-sm-12">
                                            <label class="control-label" for="input-name">Your Name</label>
                                            <input name="name" value="" id="input-name" class="form-control" type="text">
                                            @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    @endauth
                                    <div class="form-group required">
                                        <div class="col-sm-12">
                                            <label class="control-label" for="input-review">Your Review</label>
                                            <textarea name="review" rows="5" id="input-review" class="form-control"></textarea>
                                            @error('review')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            <div class="help-block"><span class="text-danger">Note:</span> HTML is not translated!</div>
                                        </div>
                                    </div>
                                    <div class="form-group required">
                                        <div class="col-md-6">
                                            <label>Rating</label>
                                            <div class="rates"><span>Bad</span>
                                                <input name="rating" value="1" type="radio">
                                                <input name="rating" value="2" type="radio">
                                                <input name="rating" value="3" type="radio">
                                                <input name="rating" value="4" type="radio">
                                                <input name="rating" value="5" type="radio">
                                                <span>Good</span>
                                            </div>
                                            @error('rating')
                                                <small class="text-danger" style="display: block">{{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="col-md-6">
                                            <div class="buttons pull-right">
                                                <button type="submit" class="btn btn-md btn-link">Continue</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Related Products --}}
            @include('site.includes.related')
        </div>

    </div>

</div>

@include('site.includes.footer')
@endsection

@section('styles')
    
@endsection

@section('scripts')
    
@endsection