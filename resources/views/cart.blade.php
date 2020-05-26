 @extends('layouts.frontend.app')
@section('title','Cart page ')

@push('css')

@endpush
@section('content')
<div class="products-breadcrumb">
		
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="{{route('home')}}">Home</a><span>|</span></li>
				<li>Cart</li>
			</ul>
		
	</div>
		<div class="w3l_banner_nav_right">
<!-- about -->
		<div class="privacy about">
			<h3>Car<span>t</span></h3>
			
	      <div class="checkout-right">
					<h4>Your shopping cart contains: <span style="color:red">
						@if(Cart::instance('default')->count()>0)
			{{ Cart::instance('default')->count() }}
			 Products</span></h4>
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
							<th>Button</th>
						</tr>
					</thead>
					<tbody>
						
                               
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
						<td>
			 <form action="{{route('cart.SaveForLater',$product->rowId)}}" method="post">
                  	@csrf
                    	 <button type="submit"  class="btn btn-info waves-effect">
                    	 	Save for later
                    	</button>
                    </form>
						</td>
					</tr>
					@endforeach
					

				</tbody></table>
				@else

 						<div class="header bg-green">
                                     You have no Product Added.
                                    </div>
            @endif
			</div>
			<hr/><hr/><hr/>
			<div class="checkout-left">	
				<div class="col-md-4 checkout-left-basket">
					<a href="{{route('home')}}">
					<h4>Continue to Shopping</h4></a>
					<div class="cartsub">
					<table class="table table-bordered">
                            	 <tbody>
                            <tr>
							 <td>Quantity :</td>
							  <td>{{ Cart::count() }}</td>		
							</tr>
							<tr>
							 <td>Sub Total :</td>
							  <td>{{ Cart::subtotal() }} Taka</td>		
							</tr>
							<tr>
							 <td>Tax :</td>
							  <td>{{ Cart::tax() }} Taka</td>		
							</tr>
							<tr class="header bg-deep-orange">
							 <td>Total :</td>
							  <td>{{ Cart::total() }} Taka</td>		
							</tr>

                            	 </tbody>

                            	</table>
					</div>
				</div>
				<div class="col-md-8 address_form_agile">
					  <h4>@if (Cart::instance('SaveForLater')->count() > 0)
		({{ Cart::instance('SaveForLater')->count() }}) items Save For Later Details</h4>

  
				<form action="" method="post" class="creditly-card-form agileinfo_form">

					<table class="timetable_sub">
					<thead>
						<tr>
							<th>Product Name</th>
							<th>Button</th>
							<th>Price</th>
							<th>Remove</th>
						</tr>
					</thead>
					<tbody>
						
                                	
                          @foreach (Cart::instance('SaveForLater')->content() as $product)
						<tr class="rem1">

						<td class="invert-name">{{ $product->name }}</td>
						<td class="invert">
				
                    	<form action="{{ route('switchToCart', $product->rowId) }}" method="POST">
                               @csrf

          
		<button type="submit"  class="btn btn-info waves-effect">move to cart
                    	</button>
                            </form>
						</td>
		
						<td class="invert">{{ $price = number_format($product->price, 2) }}</td>
						
						<td class="invert">

							<div class="rem">
		
						 <form action="{{ route('SaveForLater.destroy', $product->rowId) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                           <button type="submit" class="cart-options">X</button>
                            </form>
			
							</div>

						</td>
					</tr>
					@endforeach
					

				</tbody></table>
			</form>
			@else

 						<div class="header bg-green">
                                     You have no Product Saved for Later.
                                    </div>
            @endif
									<div class="checkout-right-basket">
				        	<a href="{{route('checkout.index')}}">Make a Payment <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a>
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
	font-size: 20px;
	color: red;
	background: whitesmoke;
	text-align: center;
	padding: 25px;
	margin-top: 30px;
}
.cartsub {

	font-size: 20px;
	background: black;
}
		</style>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->

     @endsection
  @push('js')
    @endpush