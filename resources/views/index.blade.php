@extends("layout")

@section('title',"Home")

@section('content')
     <form>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <button class="btn btn-outline-secondary form-control" type="button" id="button-addon1"><i class="fa fa-search fa-2x" aria-hidden="true"></i></button>
          </div>
          <input type="text" class="form-control" placeholder="Search KloudTransact.." aria-label="Search KloudTransact.. " aria-describedby="button-addon1">
        </div>
     </form>
     
     <!--Start Inner CATEGORIES menu -->
       <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#"> </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#categoriesCollapse" aria-controls="categoriesCollapseContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="pull-right navbar-toggler-icon"></span>
          </button>
             <div class="collapse navbar-collapse" id="categoriesCollapse">
               <ul class="navbar-nav mr-auto">           
                 <li class="nav-item active">
                   <a class="nav-link" href="#">All Categories <span class="sr-only">(current)</span></a>
                  </li>
                  @foreach($c as $key => $value)
                   <li class="nav-item">
				    <?php $u = url('deals').'?q='.$key;?>
                    <a class="nav-link" href="{{$u}}">{{$value}}</a>
                  </li>
                  @endforeach
                              
               </ul>
             </div>
           </nav>
          </div>
     <!--End Inner CATEGORIES menu -->
       <!-- Start WOWSlider.com BODY section -->
<div id="wowslider-container1">
<div class="ws_images"><ul>
		<li><a href="http://wowslider.net"><img src="data1/images/3.jpg" alt="responsive slider" title="PRODUCT TITLE HERE" id="wows1_0"/></a>STARTING AT &#8358;50000
</li>
		<li><img src="data1/images/4.jpg" alt="PRODUCT TITLE HERE" title="PRODUCT TITLE HERE" id="wows1_1"/>STARTING AT &#8358;5000</li>
	</ul></div>
	<div class="ws_bullets"><div>
		<a href="#" title="PRODUCT TITLE HERE"><span><img src="data1/tooltips/3.jpg" alt="PRODUCT TITLE HERE"/>1</span></a>
		<a href="#" title="PRODUCT TITLE HERE"><span><img src="data1/tooltips/4.jpg" alt="PRODUCT TITLE HERE"/>2</span></a>
	</div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">javascript carousel</a> by WOWSlider.com v8.8</div>
<div class="ws_shadow"></div>
</div>	
<script type="text/javascript" src="engine1/wowslider.js"></script>
<script type="text/javascript" src="engine1/script.js"></script>
<!-- End WOWSlider.com BODY section -->

<br>
<!-- Start Up sells section -->
<div class="container">
   <div class="row">
     <div class="col-12">
       <div class="card" style="">
         <a href="{{url('airtime')}}" class="d-inline mr-3">
           <img class="card-img-top" src="img/bills.png" alt="Pay Your Bills">
         </a>
         <a href="{{url('hotels')}}">
           <img class="card-img-top" src="img/hotel.jpg" alt="Book Your Room Online">
         </a>
         <a href="{{url('travelstart')}}">
           <img class="card-img-top" src="img/travel.jpg" alt="Book Your Vacations">
         </a>
       </div>
     </div>
   </div>
</div>
<!-- End Upsells section -->
<br>
        <h2 class="category-header">Hottest Deals</h2>
        <!-- Product Catagories Area 1 Start -->
            <div class="row">
            @for($i = 0; $i < 6; $i++)
                    <!-- Single Product Area -->
                    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                                <img src="img/product-img/product1.jpg" alt="">
                                <!-- Hover Thumb -->
                                <img class="hover-img" src="img/product-img/product2.jpg" alt="">
                            </div>

                            <!-- Product Description -->
                            <div class="product-description d-flex align-items-center justify-content-between">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    <p class="product-price">&#8358;70,000</p>
                                    <a href="{{url('deal')}}">
                                        <h6>Modern Chair</h6>
                                    </a>
                                </div>
                                <!-- Ratings & Cart -->
                                <div class="ratings-cart text-right">
                                    <div class="ratings">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                    <div class="cart">
                                        <a href="{{url('cart')}}" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="img/core-img/cart.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>              
                    @endfor
            </div>
        <!-- Product Catagories Area 1 End -->
       <br>
       <div class="row">
           <div class="col-12"><img src="img/8.jpg" class="img img-responsive"></div>
       </div>
       <br>
	   <h2 class="category-header">New Arrivals</h2>
		<!-- Product Catagories Area 2 Start -->
            <div class="amado-pro-catagory clearfix">

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{url('deal')}}">
                        <img src="img/bg-img/1.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From &#8358;9,000</p>
                            <p>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                            </p>
                            <h4>Modern Chair</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{url('deal')}}">
                        <img src="img/bg-img/2.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From &#8358;9,000</p>
                            <p>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                            </p>
                            <h4>Minimalistic Plant Pot</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{url('deal')}}">
                        <img src="img/bg-img/3.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From &#8358;9,000</p>
                            <p>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                            </p>
                            <h4>Modern Chair</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{url('deal')}}">
                        <img src="img/bg-img/4.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From &#8358;9,000</p>
                            <p>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                            </p>
                            <h4>Night Stand</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{url('deal')}}">
                        <img src="img/bg-img/5.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From &#8358;9,000</p>
                            <p>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                            </p>
                            <h4>Plant Pot</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{url('deal')}}">
                        <img src="img/bg-img/6.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From &#8358;33,000</p>
                            <p>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                            </p>
                            <h4>Small Table</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{url('deal')}}">
                        <img src="img/bg-img/7.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From &#8358;15,000</p>
                            <p>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                            </p>
                            <h4>Metallic Chair</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{url('deal')}}">
                        <img src="img/bg-img/8.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From &#8358;15,000</p>
                            <p>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                            </p>
                            <h4>Modern Rocking Chair</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{url('deal')}}">
                        <img src="img/bg-img/9.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From &#8358;15,000</p>
                            <p>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                            </p>
                            <h4>Home Deco</h4>
                        </div>
                    </a>
                </div>
            </div>
        <!-- Product Catagories Area 2 End -->
		<br>
       <div class="row">
           <div class="col-12"><img src="img/9.jpg" class="img img-responsive"></div>
       </div>
	   <h2 class="category-header">Best Sellers</h2>
		<!-- Product Catagories Area 5 Start -->
            <div class="amado-pro-catagory clearfix">

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{url('deal')}}">
                        <img src="img/bg-img/1.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From &#8358;9,000</p>
                            <p>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                            </p>
                            <h4>Modern Chair</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{url('deal')}}">
                        <img src="img/bg-img/2.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From &#8358;9,000</p>
                            <p>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                            </p>
                            <h4>Minimalistic Plant Pot</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{url('deal')}}">
                        <img src="img/bg-img/3.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From &#8358;9,000</p>
                            <p>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                            </p>
                            <h4>Modern Chair</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{url('deal')}}">
                        <img src="img/bg-img/4.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From &#8358;9,000</p>
                            <p>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                            </p>
                            <h4>Night Stand</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{url('deal')}}">
                        <img src="img/bg-img/5.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From &#8358;9,000</p>
                            <p>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                            </p>
                            <h4>Plant Pot</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{url('deal')}}">
                        <img src="img/bg-img/6.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From &#8358;33,000</p>
                            <p>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                            </p>
                            <h4>Small Table</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{url('deal')}}">
                        <img src="img/bg-img/7.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From &#8358;15,000</p>
                            <p>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                            </p>
                            <h4>Metallic Chair</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{url('deal')}}">
                        <img src="img/bg-img/8.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From &#8358;15,000</p>
                            <p>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                            </p>
                            <h4>Modern Rocking Chair</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{url('deal')}}">
                        <img src="img/bg-img/9.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From &#8358;15,000</p>
                            <p>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                            </p>
                            <h4>Home Deco</h4>
                        </div>
                    </a>
                </div>
            </div>
        <!-- Product Catagories Area 5 End -->
		<br>
       <div class="row">
           <div class="col-12"><img src="img/10.jpg" class="img img-responsive"></div>
       </div>
	   <h2 class="category-header">Hot Categories</h2>
		<!-- Product Catagories Area 6 Start -->
            <div class="amado-pro-catagory clearfix">

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{url('deal')}}">
                        <img src="img/bg-img/1.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From &#8358;9,000</p>
                            <p>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                            </p>
                            <h4>Modern Chair</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{url('deal')}}">
                        <img src="img/bg-img/2.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From &#8358;9,000</p>
                            <p>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                            </p>
                            <h4>Minimalistic Plant Pot</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{url('deal')}}">
                        <img src="img/bg-img/3.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From &#8358;9,000</p>
                            <p>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                            </p>
                            <h4>Modern Chair</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{url('deal')}}">
                        <img src="img/bg-img/4.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From &#8358;9,000</p>
                            <p>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                            </p>
                            <h4>Night Stand</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{url('deal')}}">
                        <img src="img/bg-img/5.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From &#8358;9,000</p>
                            <p>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                            </p>
                            <h4>Plant Pot</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{url('deal')}}">
                        <img src="img/bg-img/6.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From &#8358;33,000</p>
                            <p>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                            </p>
                            <h4>Small Table</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{url('deal')}}">
                        <img src="img/bg-img/7.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From &#8358;15,000</p>
                            <p>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                            </p>
                            <h4>Metallic Chair</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{url('deal')}}">
                        <img src="img/bg-img/8.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From &#8358;15,000</p>
                            <p>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                            </p>
                            <h4>Modern Rocking Chair</h4>
                        </div>
                    </a>
                </div>

                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <a href="{{url('deal')}}">
                        <img src="img/bg-img/9.jpg" alt="">
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p>From &#8358;15,000</p>
                            <p>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star rating-star"></i>
                              <i class="fa fa-star-o rating-star"></i>
                            </p>
                            <h4>Home Deco</h4>
                        </div>
                    </a>
                </div>
            </div>
        <!-- Product Catagories Area 6 End -->
        <br>
        <!-- Start Guarantee section -->
<div class="container">
   <div class="row">
     <div class="col-12 col-xs-12">
       <div class="card" style="">
         <div class="card-body">
            <i class="fa fa-percent fa-2x" aria-hidden="true"></i>
            <div class="">
            <h5 class="card-title">100% Guarantee</h5>
            <p class="card-text">100% Guarantee on all deals</p>
            </div>
         </div>
       </div>
     </div>
   </div>
</div>
<!-- End Guarantee section -->
<br>
@stop