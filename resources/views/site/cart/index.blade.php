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
            @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @endif

            @if(Cart::count() > 0)
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td class="text-center">Image</td>
                            <td class="text-left">Product Name</td>
                            <td class="text-left">Quantity</td>
                            <td class="text-right">Unit Price</td>
                            <td class="text-right">Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach(Cart::content() as $row)
                        <tr>
                            <td class="text-center">
                                <a href="{{ route('product.show', [$row->model->id, $row->model->slug]) }}">
                                    <img src="{{ Storage::url($row->model->mainImage->path ?? '') }}" alt="{{ $row->model->{'title_' . sitelang()} }}" style="max-width: 150px;">
                                </a>
                            </td>
                            <td class="text-left">
                                <a href="{{ route('product.show', [$row->model->id, $row->model->slug]) }}">{{ $row->name }}</a>
                            </td>
                            <td class="text-left">
                                <form action="{{ route('cart.update', $row->rowId) }}" method="post">
                                    <div style="max-width: 200px;" class="input-group btn-block">
                                        @csrf
                                        @method('put')
                                        <input type="number" class="form-control quantity" value="{{ $row->qty }}" name="quantity" max="{{ $row->model->stock }}" min="0">
                                        <span class="input-group-btn">
                                            <button class="btn" title="" data-toggle="tooltip" type="submit" name="update" data-original-title="Update">
                                                <i class="fa fa-refresh"></i>
                                            </button>
                                            <button class="btn btn-danger" title="" data-toggle="tooltip" type="submit" name="delete" data-original-title="Remove">
                                                <i class="fa fa-times-circle"></i>
                                            </button>
                                        </span>
                                    </div>
                                </form>
                            </td>
                            <td class="text-right">{{ $row->price }} LE</td>
                            <td class="text-right">{{ $row->subtotal() }} LE</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <h3 class="mtb_10">What would you like to do next?</h3>
            <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			<div class="panel-group mt_20" id="accordion">
                <div class="panel panel-default pull-left">
                    <div class="panel-heading">
                        <h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" class="">
								Use Coupon Code <i class="fa fa-caret-down"></i>
							</a>
						</h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" aria-expanded="true" style="">
                        <div class="panel-body">
                            <label for="input-coupon" class="col-sm-4 control-label">Enter your coupon here</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="input-coupon" placeholder="Enter your coupon here" value="" name="coupon">
                                <span class="input-group-btn">
                                    <input type="button" class="btn" data-loading-text="Loading..." id="button-coupon" value="Apply Coupon">
								</span>
							</div>
                        </div>
                    </div>
				</div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-sm-offset-8">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td class="text-right"><strong>Sub-Total:</strong></td>
                                <td class="text-right">{{ Cart::subtotal() }} LE</td>
                            </tr>
                            <tr>
                                <td class="text-right"><strong>VAT (14%):</strong></td>
                                <td class="text-right">{{ Cart::tax() }} LE</td>
                            </tr>
                            <tr>
                                <td class="text-right"><strong>Total:</strong></td>
                                <td class="text-right">{{ Cart::total() }} LE</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <a class="btn pull-left mt_30" href="{{ route('shop') }}">Continue Shopping</a>
            <a class="btn pull-right mt_30" href="{{ route('checkout') }}">Checkout</a>
            @else
            <div class="text-center">
                <h3 class="mt_70 mb_30">Your Cart is Empty!</h3>
                <a href="{{ route('shop') }}" class="btn">Start Shopping Now!</a>
            </div>
            @endif
        </div>

    </div>

</div>

@include('site.includes.footer')
@endsection

@section('styles')
    
@endsection

@section('scripts')
    
@endsection