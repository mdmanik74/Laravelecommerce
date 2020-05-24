 @extends('layouts.frontend.app')
@section('title','Shop Product')

@push('css')
@endpush
@section('content')
<div class="w3l_banner_nav_right">
            <section class="slider">
                <div class="flexslider">
                    <ul class="slides">
                        <li>
                            <div class="w3l_banner_nav_right_banner">
                                <h3>Make your <span>food</span> with Spicy.</h3>
                                <div class="more">
                                    <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="w3l_banner_nav_right_banner1">
                                <h3>Make your <span>food</span> with Spicy.</h3>
                                <div class="more">
                                    <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="w3l_banner_nav_right_banner2">
                                <h3>upto <i>50%</i> off.</h3>
                                <div class="more">
                                    <a href="products.html" class="button--saqui button--round-l button--text-thick" data-text="Shop now">Shop now</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
            <!-- flexSlider -->
                <link rel="stylesheet" href="{{asset('assets/frontend/css/flexslider.css')}}" type="text/css" media="screen" property="" />
                <script defer src="{{asset('assets/frontend/js/jquery.flexslider.js')}}"></script>
                <script type="text/javascript">
                $(window).load(function(){
                  $('.flexslider').flexslider({
                    animation: "slide",
                    start: function(slider){
                      $('body').removeClass('loading');
                    }
                  });
                });
              </script>
            <!-- //flexSlider -->
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- slider end -->
        <div class="w3l_banner_nav_right">
            
             <div class="w3l_banner_nav">
    <h3>Home/Category/{{$category->categroy_name}}/{{$products->count()}}<span class="blink_me"></span></h3>
            </div>
            <div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_sub">
                <h3>{{$category->categroy_name}} Products</h3>
                <div class="w3ls_w3l_banner_nav_right_grid1">
                 @if($products->count() > 0)
                @foreach($products as $product)
                    <div class="col-md-3 w3ls_w3l_banner_left">
                        <div class="hover14 column">
                        <div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid_pos">
                                <img src="images/offer.png" alt=" " class="img-responsive" />
                            </div>
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block">
                                        <div class="snipcart-thumb">
                                            <a href="{{ route('shop',$product->slug) }}"><img height="140" width="140" id="example" src="{{ asset('storage/product/'.$product->image) }}" alt=" " class="img-responsive" /></a>
                                            <p>{{$product->product_name}}</p>
                                            <h4>{{number_format($product->price,2)}}TK</h4>
                                        </div>
                                        <div class="snipcart-details">
                                            <a href="{{route('cart.index')}}"> <input type="submit" name="submit" value="Add to cart" class="button" /> </a>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                        </div>
                    </div>
                     @endforeach
                     @else
                   
                               
           <strong class="error-info">Sorry, No post found :(</strong>
                               
                             
                            
                @endif
                    <div class="clearfix"> </div>
                    <div class="more_product">
    <nav aria-label="Page navigation">
  <ul class="pagination">
    {{$products->links() }}
  </ul>
</nav>
    </div>   
                </div>
               
                <style type="text/css">
            .more_product p{
    text-align: center;
    padding: 15px;
    border: 1px solid #757473;
    width: 250px;
    margin: 0 auto;
    /* background: #46665c; */
    color: red;
}
.more_product {
    margin-top: 50px;
    margin-bottom: 50px;
    text-align: center;
}
.snipcart-thumb {
    text-align: center;
}
.hover14.column {
    margin-bottom: 40px;
}
        </style>
            </style> 
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
<!-- //banner -->


  @endsection
  @push('js')
    @endpush