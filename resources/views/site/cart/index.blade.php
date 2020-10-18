@extends('site.layout.main')

@section('content')


<div class="container">
    <div class="row">

        @include('site.includes.breadcrumb')

        <div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">
            <div id="category-menu" class="navbar collapse in mb_40" aria-expanded="true" style="" role="button">
                <div class="nav-responsive">
                    <div class="heading-part">
                        <h2 class="main_title">Top category</h2>
                    </div>
                    <ul class="nav  main-navigation collapse in">
                        @foreach (getCategories() as $cat)
                        <li>
                            <a href="{{ route('category.show', $cat->id) }}">{{ $cat->name }} ({{ $cat->products_count }})</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="left_banner left-sidebar-widget mt_30 mb_40">
                <a href="#">
                    <img src="images/left1.jpg" alt="Left Banner" class="img-responsive" />
                </a>
            </div>
            <div class="left-special left-sidebar-widget mb_50">
                <div class="heading-part mb_10 ">
                    <h2 class="main_title">Top Products</h2>
                </div>
                <div id="left-special" class="owl-carousel">
                    <ul class="row ">
                        <li class="item product-layout-left mb_20">

                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock">
                                        <a href="product_detail_page.html">
                                            <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product3.jpg">
                                            <img class="img-responsive" title="iPod Classic" alt="iPod Classic" src="images/product/product3-1.jpg">
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating">
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i class="fa fa-star fa-stack-x"></i></span>
                                    </div>
                                    <span class="price">
                                        <span class="amount"><span class="currencySymbol">$</span>70.00</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img
                                                class="img-responsive" title="iPod Classic" alt="iPod Classic"
                                                src="images/product/product4.jpg"> <img class="img-responsive"
                                                title="iPod Classic" alt="iPod Classic" src="images/product/product4-1.jpg">
                                        </a> </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating">
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-x"></i></span>
                                    </div>
                                    <span class="price"><span class="amount"><span
                                                class="currencySymbol">$</span>70.00</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img
                                                class="img-responsive" title="iPod Classic" alt="iPod Classic"
                                                src="images/product/product5.jpg"> <img class="img-responsive"
                                                title="iPod Classic" alt="iPod Classic" src="images/product/product5-1.jpg">
                                        </a> </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating">
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-x"></i></span>
                                    </div>
                                    <span class="price"><span class="amount"><span
                                                class="currencySymbol">$</span>70.00</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="row ">
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img
                                                class="img-responsive" title="iPod Classic" alt="iPod Classic"
                                                src="images/product/product6.jpg"> <img class="img-responsive"
                                                title="iPod Classic" alt="iPod Classic" src="images/product/product6-1.jpg">
                                        </a> </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating">
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-x"></i></span>
                                    </div>
                                    <span class="price"><span class="amount"><span
                                                class="currencySymbol">$</span>70.00</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img
                                                class="img-responsive" title="iPod Classic" alt="iPod Classic"
                                                src="images/product/product7.jpg"> <img class="img-responsive"
                                                title="iPod Classic" alt="iPod Classic" src="images/product/product7-1.jpg">
                                        </a> </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating">
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-x"></i></span>
                                    </div>
                                    <span class="price"><span class="amount"><span
                                                class="currencySymbol">$</span>70.00</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img
                                                class="img-responsive" title="iPod Classic" alt="iPod Classic"
                                                src="images/product/product8.jpg"> <img class="img-responsive"
                                                title="iPod Classic" alt="iPod Classic" src="images/product/product8-1.jpg">
                                        </a> </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating">
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-x"></i></span>
                                    </div>
                                    <span class="price"><span class="amount"><span
                                                class="currencySymbol">$</span>70.00</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="row ">
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img
                                                class="img-responsive" title="iPod Classic" alt="iPod Classic"
                                                src="images/product/product9.jpg"> <img class="img-responsive"
                                                title="iPod Classic" alt="iPod Classic" src="images/product/product9-1.jpg">
                                        </a> </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating">
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-x"></i></span>
                                    </div>
                                    <span class="price"><span class="amount"><span
                                                class="currencySymbol">$</span>70.00</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img
                                                class="img-responsive" title="iPod Classic" alt="iPod Classic"
                                                src="images/product/product10.jpg"> <img class="img-responsive"
                                                title="iPod Classic" alt="iPod Classic"
                                                src="images/product/product10-1.jpg"> </a> </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating">
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-x"></i></span>
                                    </div>
                                    <span class="price"><span class="amount"><span
                                                class="currencySymbol">$</span>70.00</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img
                                                class="img-responsive" title="iPod Classic" alt="iPod Classic"
                                                src="images/product/product1.jpg"> <img class="img-responsive"
                                                title="iPod Classic" alt="iPod Classic" src="images/product/product1-1.jpg">
                                        </a> </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating">
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-x"></i></span>
                                    </div>
                                    <span class="price"><span class="amount"><span
                                                class="currencySymbol">$</span>70.00</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="row ">
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img
                                                class="img-responsive" title="iPod Classic" alt="iPod Classic"
                                                src="images/product/product2.jpg"> <img class="img-responsive"
                                                title="iPod Classic" alt="iPod Classic" src="images/product/product2-1.jpg">
                                        </a> </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating">
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-x"></i></span>
                                    </div>
                                    <span class="price"><span class="amount"><span
                                                class="currencySymbol">$</span>70.00</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img
                                                class="img-responsive" title="iPod Classic" alt="iPod Classic"
                                                src="images/product/product3.jpg"> <img class="img-responsive"
                                                title="iPod Classic" alt="iPod Classic" src="images/product/product3-1.jpg">
                                        </a> </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating">
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-x"></i></span>
                                    </div>
                                    <span class="price"><span class="amount"><span
                                                class="currencySymbol">$</span>70.00</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                        <li class="item product-layout-left mb_20">
                            <div class="product-list col-xs-4">
                                <div class="product-thumb">
                                    <div class="image product-imageblock"> <a href="product_detail_page.html"> <img
                                                class="img-responsive" title="iPod Classic" alt="iPod Classic"
                                                src="images/product/product4.jpg"> <img class="img-responsive"
                                                title="iPod Classic" alt="iPod Classic" src="images/product/product4-1.jpg">
                                        </a> </div>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <div class="caption product-detail">
                                    <h6 class="product-name"><a href="#">New LCDScreen and HD Video Recording</a></h6>
                                    <div class="rating">
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-1x"></i></span>
                                        <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i><i
                                                class="fa fa-star fa-stack-x"></i></span>
                                    </div>
                                    <span class="price"><span class="amount"><span
                                                class="currencySymbol">$</span>70.00</span>
                                    </span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
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
                                        <input type="number" class="form-control quantity" value="{{ $row->qty }}" name="quantity">
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