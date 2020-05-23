 @extends('layouts.frontend.app')
@section('title','Home')

@push('css')
@endpush
@section('content')
<div class="banner_bottom">
            <div class="wthree_banner_bottom_left_grid_sub">
            </div>
            <div class="wthree_banner_bottom_left_grid_sub1">
                <div class="col-md-4 wthree_banner_bottom_left">
                    <div class="wthree_banner_bottom_left_grid">
                        <img src="{{asset('assets/frontend/images/4.jpg')}}" alt=" " class="img-responsive" />
                        <div class="wthree_banner_bottom_left_grid_pos">
                            <h4>Discount Offer <span>25%</span></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 wthree_banner_bottom_left">
                    <div class="wthree_banner_bottom_left_grid">
                        <img src="{{asset('assets/frontend/images/5.jpg')}}" alt=" " class="img-responsive" />
                        <div class="wthree_banner_btm_pos">
                            <h3>introducing <span>best store</span> for <i>groceries</i></h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 wthree_banner_bottom_left">
                    <div class="wthree_banner_bottom_left_grid">
                        <img src="{{asset('assets/frontend/images/6.jpg')}}" alt=" " class="img-responsive" />
                        <div class="wthree_banner_btm_pos1">
                            <h3>Save <span>Upto</span> $10</h3>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
    </div>

    <div class="top-brands">
        <div class="container">
            <h3>TOp Seles Product</h3>
            <div class="agile_top_brands_grids">
                @foreach($product as $topview)
                <div class="col-md-3 top_brand_left">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block" >
                                        <div class="snipcart-thumb">
                                            <a href="{{ route('shop',$topview->slug) }}"><img height="140" width="140" title=" " alt=" " src="{{ asset('storage/product/'.$topview->image) }}" /></a>      
                                            <p>{{str_limit($topview->product_name,'15')}}</p>
                                            <h4>{{number_format($topview->price,2)}}TK</h4>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details">
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
        <div class="more_product">
    <nav aria-label="Page navigation">
  <ul class="pagination">
    {{$product->links() }}
  </ul>
</nav>
    </div>

     @endsection
  @push('js')
    @endpush