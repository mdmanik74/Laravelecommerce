 @extends('layouts.frontend.app')
@section('title','Shop Product')

@push('css')
@endpush
@section('content')

        <div class="w3l_banner_nav_right">
            <div class="w3l_banner_nav">
                <h3>Home/Shop/{{$product->category->categroy_name}}<span class="blink_me"></span></h3>
            </div>
            <div class="agileinfo_single">
                <h5>{{$product->product_name}}</h5>
                <div class="col-md-4 agileinfo_single_left">
                    <img height="140" width="140" id="example" src="{{ asset('storage/product/'.$product->image) }}" alt=" " class="img-responsive" />
                </div>
                <div class="col-md-8 agileinfo_single_right">
                    <div class="rating1">
                        <span class="starRating">
                            <input id="rating5" type="radio" name="rating" value="5">
                            <label for="rating5">5</label>
                            <input id="rating4" type="radio" name="rating" value="4">
                            <label for="rating4">4</label>
                            <input id="rating3" type="radio" name="rating" value="3" checked>
                            <label for="rating3">3</label>
                            <input id="rating2" type="radio" name="rating" value="2">
                            <label for="rating2">2</label>
                            <input id="rating1" type="radio" name="rating" value="1">
                            <label for="rating1">1</label>
                        </span>
                    </div>
                    <div class="w3agile_description">
                        <h4>Description :</h4>
                        <p>{!! $product->descr !!}</p>
                    </div>
                    <div class="snipcart-item block">
                        <div class="nipcart_price">
                            <h4>{{number_format($product->price,2)}}TK</h4>
                        </div>
                        <div class="snipcart-details agileinfo_single_right_details">
                            <form action="#" method="post">
                                <fieldset>
                                   
                                    <input type="submit" name="submit" value="Add to cart" class="button" />
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
<!-- //banner -->
<!-- brands -->
    <div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_popular">
        <div class="container">
            <h3>Related Products</h3>
                <div class="w3ls_w3l_banner_nav_right_grid1">
                   
                    @foreach($randomposts as $randm)
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
                                            <a href="single.html"><img height="140" width="140" src="{{ asset('storage/product/'.$randm->image) }}" alt=" " class="img-responsive" /></a>
                                            <p>{{str_limit($randm->product_name,'25')}}</p>
                                            <h4>{{number_format($randm->price,2)}}TK</h4>
                                        </div>
                                        <div class="snipcart-details">
                                            <form action="#" method="post">
                                                <fieldset>
                                                   
                                                    <input type="submit" name="submit" value="Add to cart" class="button" />
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                        </div>
                    </div>
                    @endforeach
                
                    <div class="clearfix"> </div>
                </div>
                
            <style type="text/css">
                .snipcart-thumb {
    text-align: center;
}.img-responsive {
    height: 150px;
    width: 150px;
}
.col-md-4.agileinfo_single_left {
    text-align: center;
    margin: o auto;
    width: 212px;
}.nipcart_price {
    margin-bottom: 20px;
}
.w3l_banner_nav {
    color: brown;
}
            </style>    
        </div>
    </div>
  @endsection
  @push('js')
    @endpush