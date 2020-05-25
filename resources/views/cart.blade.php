 @extends('layouts.frontend.app')
@section('title','Cart page ')

@push('css')

@endpush
@section('content')
<div class="products-breadcrumb">
		
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Home</a><span>|</span></li>
				<li>Checkout</li>
			</ul>
		
	</div>
		<div class="w3l_banner_nav_right">
<!-- about -->
		<div class="privacy about">
			<h3>Chec<span>kout</span></h3>
			
	      <div class="checkout-right">
					<h4>Your shopping cart contains: <span style="color:red">@if(Cart::instance('default')->count()>0)
			{{ Cart::instance('default')->count() }}
			@endif Products</span></h4>
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Product Name</th>
							<th>Qty</th>
							<th>Qty Update</th>
							<th>Price</th>
							<th>total</th>
							<th>Remove</th>
						</tr>
					</thead>
					<tbody>
						 @if($cart_products->count() < 1)
                                <div class="header bg-green">
                                        No Product Added
                                    </div>
                                @else
                                 @foreach($cart_products as $product)
						<tr class="rem1">

						<td class="invert">{{ $loop->iteration }}</td>
						<td class="invert-name">{{ $product->name }}</td>
						<td class="invert">
							<form action="{{ route('cart.update', $product->rowId) }}" method="post">
                                @csrf
                               @method('PUT')
							 <div class="quantity"> 
								<div class="quantity-select">                           
								<input class="cartqtys" type="number" name="qty" value="{{ $product->qty }}">
								</div>
							</div>
						</td>
					
						<td>
							
     
                     	 <button type="submit"  class="btn btn-info waves-effect"><i class="fa fa-check-circle"></i>
                    	</button>
                    	 <button type="submit"  class="btn btn-info waves-effect">
                    	 	Save for later
                    	</button>
                    
                  
						</td>
			</form>
						<td class="invert">{{ $price = number_format($product->price, 2) }}</td>
						
						<td class="invert">{{ number_format($product->price * $product->qty,2) }}</td>
						<td class="invert">

							<div class="rem">
								<a href="" type="button" onclick="if(confirm('Are you Sure, You want to remove this?')){
									event.preventDefault();
									document.getElementById('delete-form-{{ $product->id }}').submit();
									}else{
									event.preventDefault();
									}">
											<div class="close1"> </div>
									</a>
									<form id="delete-form-{{ $product->id }}" action="{{ route('cart.destroy', $product->rowId) }}" method="post"
                                                          style="display:none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
							
							</div>

						</td>
					</tr>
					@endforeach
					 @endif

				</tbody></table>
			</div>
			<div class="checkout-left">	
				<div class="col-md-4 checkout-left-basket">
					<a href="{{route('home')}}">
					<h4>Continue to Shopping</h4></a>
					@foreach($cart_products as $product)
					<ul>
						<li>{{ str_limit($product->name,20) }} <i>=</i> <span>{{ number_format($product->price * $product->qty,2) }} </span></li>
						<li> <i></i> <span></span></li>
						<li><i></i> <span></span></li>
						<li>Total Service Charges <i>=</i> <span>{{ Cart::tax() }}</span></li>
						<li>Total <i>-</i> <span>{{ Cart::total() }}</span></li>
					</ul>
					@endforeach
				</div>
				<div class="col-md-8 address_form_agile">
					  <h4>(@if(Cart::instance('default')->count()>0)
			{{ Cart::instance('default')->count() }}
			@endif ) items Save For Later Details</h4>
				<form action="payment.html" method="post" class="creditly-card-form agileinfo_form">

					<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Product Name</th>
							<th>Button</th>
							<th>Price</th>
							<th>Remove</th>
						</tr>
					</thead>
					<tbody>
						 @if($cart_products->count() < 1)
                                <div class="header bg-green">
                                        No Saved Product Added
                                    </div>
                                @else
                                 @foreach($cart_products as $product)
						<tr class="rem1">

						<td class="invert">{{ $loop->iteration }}</td>
						<td class="invert-name">{{ $product->name }}</td>
						<td class="invert">
							<form action="{{ route('cart.update', $product->rowId) }}" method="post">
                                @csrf
                               @method('PUT')
						
                    	<button type="submit"  class="btn btn-info waves-effect">move to cart
                    	</button>

                    
                  
						</td>
			</form>
						<td class="invert">{{ $price = number_format($product->price, 2) }}</td>
						
						<td class="invert">

							<div class="rem">
								<a href="" type="button" onclick="if(confirm('Are you Sure, You want to remove this?')){
									event.preventDefault();
									document.getElementById('delete-form-{{ $product->id }}').submit();
									}else{
									event.preventDefault();
									}">
											<div class="close1"> </div>
									</a>
									<form id="delete-form-{{ $product->id }}" action="{{ route('cart.destroy', $product->rowId) }}" method="post"
                                                          style="display:none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
							
							</div>

						</td>
					</tr>
					@endforeach
					 @endif

				</tbody></table>
									
								</form>
									<div class="checkout-right-basket">
				        	<a href="payment.html">Make a Payment <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
			      	</div>
					</div>
			
				<div class="clearfix"> </div>
				
			</div>

		</div>
<!-- //about -->
		</div>
		<style type="text/css">
			.fa.fa-home {
	margin-left: 40px;
}.cartqtys {
	width: 50px;
	border: 0px solid;
}.header.bg-green {
	font-size: 30px;
	color: red;
	background: whitesmoke;
	text-align: center;
	padding: 10px;
	margin-bottom: 30px;
}
		</style>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->

     @endsection
  @push('js')
    @endpush