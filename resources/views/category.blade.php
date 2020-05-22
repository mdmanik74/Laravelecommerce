 @extends('layouts.frontend.app')
@section('title','Shop Product')

@push('css')
@endpush
@section('content')
        <div class="w3l_banner_nav_right">
             @if($products->count() > 0)
             <div class="w3l_banner_nav">
                <h3>Home/Category/{{$category->categroy_name}}/{{$products->count()}}<span class="blink_me"></span></h3>
            </div>
            <div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_sub">
                <h3>{{$category->categroy_name}} Products</h3>
                <div class="w3ls_w3l_banner_nav_right_grid1">
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
                                            <a href="single.html"><img height="140" width="140" id="example" src="{{ asset('storage/product/'.$product->image) }}" alt=" " class="img-responsive" /></a>
                                            <p>{{$product->product_name}}</p>
                                            <h4>{{number_format($product->price,2)}}TK</h4>
                                        </div>
                                        <div class="snipcart-details">
                                            <form action="#" method="post">
                                                <fieldset>
                                                   
                                                    <input type="hidden" name="cancel_return" value=" " />
                                                    <input type="submit" name="submit" value="Add to cart" class="button" />
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </figure>
                            </div>
                        </div>
                        </div>
                          @endforeach
                    </div>
                    <div class="clearfix"> </div>
                       @else
                       <strong>Sorry, No post found :(</strong>
                        @endif
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
        <div class="clearfix"></div>
    </div>
<!-- //banner -->


  @endsection
  @push('js')
    @endpush