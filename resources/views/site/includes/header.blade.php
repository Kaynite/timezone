<header id="header">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="header-top-left">
                        <div class="contact">
                            <span class="hidden-xs hidden-sm hidden-md">Days a week from 9:00 am to 7:00 pm</span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <ul class="header-top-right text-right">


                        @auth
                        <li class="language dropdown">
                            <span class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                Welcome, {{ Auth::user()->username }} <span class="caret"></span>
                            </span>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="{{ route('profile') }}">Profile</a></li>
                                <li><a onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                        @else
                        <li class="account">
                            <a href="{{ route('login') }}">Login</a>
                        </li>
                        @endauth


                        <li class="language dropdown">
                            <span class="dropdown-toggle" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="button">
                                Language <span class="caret"></span>
                            </span>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a href="#">English</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">German</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="main-search mt_40">
                        <input id="search-input" name="search" value="" placeholder="Search" class="form-control input-lg" autocomplete="off" type="text">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-default btn-lg">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
                <div class="navbar-header col-xs-6 col-sm-4">
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img alt="themini" src="images/logo.png">
                    </a>
                </div>
                <div class="col-xs-6 col-sm-4 shopcart">
                    <div id="cart" class="btn-group btn-block mtb_40">
                        <button type="button" class="btn" data-target="#cart-dropdown" data-toggle="collapse" aria-expanded="true">
                            <span id="shippingcart">Shopping cart</span>
                            <span id="cart-total">items ({{ Cart::count() }})</span>
                        </button>
                    </div>

                    <div id="cart-dropdown" class="cart-menu collapse">
                        <ul>
                            @if (Cart::count() > 0)
                                <li style="max-height: 300px; overflow-y: scroll">
                                    <table class="table table-striped">
                                        <tbody>
                                            @foreach (Cart::content() as $row)
                                            <tr>
                                                <td class="text-center">
                                                    <a href="{{ route('product.show', [$row->model->id, $row->model->slug]) }}">
                                                        <img src="{{ Storage::url($row->model->mainImage->path ?? '') }}" alt="{{ $row->name }}" title="{{ $row->name }}">
                                                    </a>
                                                </td>
                                                <td class="text-left product-name">
                                                    <a href="{{ route('product.show', [$row->model->id, $row->model->slug]) }}">{{ $row->name }}</a>
                                                    <span class="text-left price"> {{ $row->price }} LE</span>
                                                    <input class="cart-qty" name="product_quantity" min="1" value="{{ $row->qty }}" type="number">
                                                </td>
                                                <td class="text-center">
                                                    <form action="{{ route('cart.update', $row->rowId) }}" method="post">
                                                        @csrf
                                                        @method('put')
                                                        <button type="submit" name="delete" style="border:none;background:none;padding:0;text-align:left; ">
                                                            <i class="fa fa-times-circle"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </li>
                                <li style="margin-top: 1rem">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="text-right"><strong>Sub-Total</strong></td>
                                                <td class="text-right">{{ Cart::subtotal() }} LE</td>
                                            </tr>
                                            {{--
                                            <tr>
                                                <td class="text-right"><strong>Eco Tax (-2.00)</strong></td>
                                                <td class="text-right">$2.00</td>
                                            </tr>
                                            --}}
                                            <tr>
                                                <td class="text-right"><strong>VAT (14%)</strong></td>
                                                <td class="text-right">{{ Cart::tax() }} LE</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><strong>Total</strong></td>
                                                <td class="text-right">{{ Cart::total() }} LE</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </li>
                            @else
                                <li class="text-center mb_10">Your Cart is empty!</li>
                            @endif
                            <li>
                                <a href="{{ route('cart.index') }}" class="btn pull-left mt_10" style="margin-right: 1rem">View Cart</a>
                                <a href="{{ route('checkout') }}" class="btn pull-right mt_10">Checkout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <nav class="navbar">
                <p>menu</p>
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
                    <span class="i-bar">
                        <i class="fa fa-bars"></i>
                    </span>
                </button>
                <div class="collapse navbar-collapse js-navbar-collapse">
                    <ul id="menu" class="nav navbar-nav">
                        <li>
                            <a href="{{ route('home') }}">Home</a>
                        </li>

                        <li class="dropdown mega-dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown">Collection</a>
                            <ul class="dropdown-menu mega-dropdown-menu row">
                                <li class="col-md-3">
                                    <ul>
                                        <li class="dropdown-header">Women's</li>
                                        <li><a href="#">Unique Features</a></li>
                                        <li><a href="#">Image Responsive</a></li>
                                        <li><a href="#">Auto Carousel</a></li>
                                        <li><a href="#">Newsletter Form</a></li>
                                        <li><a href="#">Four columns</a></li>
                                        <li><a href="#">Four columns</a></li>
                                        <li><a href="#">Good Typography</a></li>
                                    </ul>
                                </li>
                                <li class="col-md-3">
                                    <ul>
                                        <li class="dropdown-header">Man's</li>
                                        <li><a href="#">Unique Features</a></li>
                                        <li><a href="#">Image Responsive</a></li>
                                        <li><a href="#">Four columns</a></li>
                                        <li><a href="#">Auto Carousel</a></li>
                                        <li><a href="#">Newsletter Form</a></li>
                                        <li><a href="#">Four columns</a></li>
                                        <li><a href="#">Good Typography</a></li>
                                    </ul>
                                </li>
                                <li class="col-md-3">
                                    <ul>
                                        <li class="dropdown-header">Children's</li>
                                        <li><a href="#">Unique Features</a></li>
                                        <li><a href="#">Four columns</a></li>
                                        <li><a href="#">Image Responsive</a></li>
                                        <li><a href="#">Auto Carousel</a></li>
                                        <li><a href="#">Newsletter Form</a></li>
                                        <li><a href="#">Four columns</a></li>
                                        <li><a href="#">Good Typography</a></li>
                                    </ul>
                                </li>
                                <li class="col-md-3">
                                    <ul>
                                        <li id="myCarousel" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="item active">
                                                    <a href="#">
                                                        <img src="images/menu-banner1.jpg" class="img-responsive" alt="Banner1">
                                                    </a>
                                                </div>
                                                <div class="item">
                                                    <a href="#">
                                                        <img src="images/menu-banner2.jpg" class="img-responsive" alt="Banner1">
                                                    </a>
                                                </div>
                                                <div class="item">
                                                    <a href="#">
                                                        <img src="images/menu-banner3.jpg" class="img-responsive" alt="Banner1">
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- End Carousel Inner -->
                                        </li>
                                        <!-- /.carousel -->
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li> <a href="{{ route('shop') }}">Shop</a></li>
                        <li> <a href="{{ route('blog') }}">Blog</a></li>
                        <li> <a href="about.html">About us</a></li>
                        <li> <a href="contact_us.html">Contact us</a></li>
                    </ul>
                </div>
                <!-- /.nav-collapse -->
            </nav>
        </div>
    </div>
</header>