@extends('site.layout.main')

@section('content')

<div class="container">
    <div class="row">

        @include('site.includes.breadcrumb')

        <div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">
            @include('site.includes.categoriesMenu')
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
            @error('card_error')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @enderror
            <form action="{{ route('checkout') }}" method="post" id="payment-form">
                @csrf
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true">Billing & Delivery Details
                                    <i class="fa fa-caret-down"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" aria-expanded="true">
                            <div class="panel-body">
                                <div class="form-horizontal">
                                    <div id="shipping-new">
                                        <div class="form-group required">
                                            <label for="input-first_name" class="col-sm-2 control-label">First Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-first_name" placeholder="First Name" value="{{ old('first_name') }}" name="first_name" required>
                                            </div>
                                            @error('first_name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-last_name" class="col-sm-2 control-label">Last Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-last_name" placeholder="Last Name" value="{{ old('last_name') }}" name="last_name" required>
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-email" class="col-sm-2 control-label">E-mail Address</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-email" placeholder="E-mail Address" value="{{ old('email') }}" name="email" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-phone" class="col-sm-2 control-label">Phone Number</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-phone" placeholder="Phone Number" name="phone" value="{{ old('phone') }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-country" class="col-sm-2 control-label">Country</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="input-country" name="country_id" required>
                                                    @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-city" class="col-sm-2 control-label">City</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" id="input-city" name="city_id" required>
                                                    @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-state" class="col-sm-2 control-label">Region / State</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-state" placeholder="Region / State" value="{{ old('state') }}" name="state" required>
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-address-1" class="col-sm-2 control-label">Address 1</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-address-1" placeholder="Address 1" value="{{ old('address_1') }}" name="address_1" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-address-2" class="col-sm-2 control-label">Address 2</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-address-2" placeholder="Address 2" value="{{ old('address_2') }}" name="address_2">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-postcode" class="col-sm-2 control-label">Post Code</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-postcode" placeholder="Post Code" name="post_code" value="{{ old('post_code') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="buttons clearfix">
                                        <div class="pull-right">
                                            <input type="button" class="btn" value="Continue" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed" aria-expanded="false">
                                    Payment Method <i class="fa fa-caret-down"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <div class="panel-body">
                                <p>Please select the preferred payment method to use on this order.</p>
                                <div class="radio">
                                    <label>
                                        <input type="radio" checked="checked" value="cod" name="payment_method"> Cash On Delivery
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="card" name="payment_method"> Using Debit/Credit Card
                                    </label>
                                </div>
                                <div id="payment-card" style="display: none">
                                    <div class="form-group">
                                        <label for="card-element" style="margin-bottom: 10px">
                                            Credit or debit card
                                        </label>
                                        <div id="card-element"></div>
                                        <div id="card-errors" role="alert"></div>
                                    </div>
                                </div>
                                <div>
                                    <p><strong>Add Comments About Your Order</strong></p>
                                    <p><textarea class="form-control" rows="8" name="comment"></textarea></p>
                                </div>

                                <div class="buttons">
                                    <div class="pull-right mt_20">I have read and agree to the <a class="agree" href="#"><b>Terms &amp; Conditions</b></a>
                                        <input type="checkbox" value="1" name="agree" required> &nbsp;
                                        <input type="button" class="btn" id="button-payment-method" value="Continue" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" aria-expanded="false">
                                    Confirm Order <i class="fa fa-caret-down"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                            <div class="panel-body">
                            @if(Cart::count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <td class="text-left">Product Name</td>
                                                <td class="text-right">Quantity</td>
                                                <td class="text-right">Unit Price</td>
                                                <td class="text-right">Total</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(Cart::content() as $row)
                                            <tr>
                                                <td class="text-left">
                                                    <a href="{{ route('product.show', [$row->model->id, $row->model->slug]) }}">{{ $row->name }}</a>
                                                </td>
                                                <td class="text-right">{{ $row->qty }}</td>
                                                <td class="text-right">{{ $row->price }} LE</td>
                                                <td class="text-right">{{ $row->subtotal() }} LE</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td class="text-right" colspan="3"><strong>Sub-Total:</strong></td>
                                                <td class="text-right">{{ Cart::subtotal() }} LE</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right" colspan="3"><strong>Tax(14%):</strong></td>
                                                <td class="text-right">{{ Cart::tax() }} LE</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right" colspan="3"><strong>Discount:</strong></td>
                                                <td class="text-right">{{ Cart::getCost('discount') }} LE</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right" colspan="3"><strong>Total:</strong></td>
                                                <td class="text-right">{{ Cart::total() }} LE</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="buttons">
                                    <div class="pull-right">
                                        <input type="submit" id="confirm-btn" data-loading-text="Loading..." class="btn" id="button-confirm" value="Confirm Order">
                                    </div>
                                </div>
                            @else
                                <div>
                                    <p class="text-center">Your cart is empty, <a href="#">Start Shopping Now!</a></p> 
                                </div>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>

@include('site.includes.footer')
@endsection

@section('styles')
<script src="https://js.stripe.com/v3/"></script>
<link rel="stylesheet" href="{{ asset('css/stripe.css') }}">
@endsection

@section('scripts')
  <script>
    $('input[name=\'payment_method\']').on('change', function() {
        if (this.value == 'cod') {
            $('#payment-card').hide();
        } else {
            $('#payment-card').show();
        }
    });
    // Create a Stripe client.
    var stripe = Stripe('pk_test_51HZfCNDqnWdb5W3S2pL9dcWuydWTgNuqaFzB76KztPW60xF3bYamzJUhV6tV3dsSjkRn1Sf67AkABurphMMZTYmj00dXqCD99T');

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            fontFamily: "'Poppins', sans-serif",
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {
        style: style,
        hidePostalCode: true
    });

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element.
    card.on('change', function (event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission.
    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function (event) {
        document.getElementById('confirm-btn').disabled = true;
        if(form.querySelector('input[name="payment_method"]:checked').value == 'cod') {
            form.submit();
        } else {
            event.preventDefault();
            // TODO: Pass card data (like: name and address)
            stripe.createToken(card).then(function (result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                    document.getElementById('confirm-btn').disabled = false;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        }
    });

    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }

</script>
@endsection