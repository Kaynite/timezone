@extends('site.layout.main')

@section('content')


<div class="container">
    <div class="row">

        {{-- @include('site.includes.breadcrumb') --}}

      <div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">
          @include('site.includes.categoriesMenu')
          <div class="left_banner left-sidebar-widget mt_30 mb_40">
              <a href="#">
                  <img src="images/left1.jpg" alt="Left Banner" class="img-responsive" />
              </a>
          </div>
          <div class="filter left-sidebar-widget mb_50">
            <div class="heading-part mtb_20 ">
              <h2 class="main_title">Refine Search</h2>
            </div>
            <div class="filter-block">
              <p>
                <label for="amount">Price range:</label>
                <input type="text" id="amount" readonly="">
              </p>
              <div id="slider-range" class="mtb_20 ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 15%; width: 45%;"></div><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 15%;"></span><span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 60%;"></span></div>
              <div class="list-group">
                <div class="list-group-item mb_10">
                  <label>Color</label>
                  <div id="filter-group1">
                    <div class="checkbox">
                      <label>
                        <input value="" type="checkbox"> Red (10)</label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input value="" type="checkbox"> Green (06)</label>
                    </div>
                    <div class="checkbox ">
                      <label>
                        <input value="" type="checkbox"> Blue(09)
                      </label>
                    </div>
                  </div>
                </div>
                <div class="list-group-item mb_10">
                  <label>Size</label>
                  <div id="filter-group3">
                    <div class="checkbox">
                      <label>
                        <input value="" type="checkbox"> Big (3)</label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input value="" type="checkbox"> Medium (2)</label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input value="" type="checkbox"> Small (1)</label>
                    </div>
                  </div>
                </div>
                <button type="button" class="btn">Refine Search</button>
              </div>
            </div>
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
								<a href="{{ route('product.show', $product->id) }}">
									<img data-name="product_image" src="{{ Storage::url($product->mainImage->path ?? '') }}" alt="iPod Classic" title="iPod Classic" class="img-responsive" />
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
		max: 500,
		values: [75, 300],
		slide: function(event, ui) {
		  $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
		}
	  });
	  $("#amount").val("$" + $("#slider-range").slider("values", 0) +
		" - $" + $("#slider-range").slider("values", 1));
    });
    
    var limit = document.getElementById('input-limit');
    limit.addEventListener('change', function() {
        $.ajax({
            type: "GET",
            url: "{{ route('shop') }}",
            data: {
                perPage: limit.value,
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

</script>

<script>



</script>
@endsection