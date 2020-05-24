 @extends('layouts.frontend.app')
@section('title','Cart page ')

@push('css')

@endpush
@section('content')
<div class="products-breadcrumb">
		
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.html">Home</a><span>|</span></li>
				<li>Checkout</li>
			</ul>
		
	</div>
		<div class="w3l_banner_nav_right">
<!-- about -->
		<div class="privacy about">
			<h3>Chec<span>kout</span></h3>
			
	      <div class="checkout-right">
					<h4>Your shopping cart contains: <span>3 Products</span></h4>
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
						<td class="invert-image">{{ $product->name }}</td>
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
								<div class="close1"> </div>
							</div>

						</td>
					</tr>
					@endforeach
					 @endif

				</tbody></table>
			</div>
			<div class="checkout-left">	
				<div class="col-md-4 checkout-left-basket">
					<h4>Continue to basket</h4>
					<ul>
						<li>Product1 <i>-</i> <span>$15.00 </span></li>
						<li>Product2 <i>-</i> <span>$25.00 </span></li>
						<li>Product3 <i>-</i> <span>$29.00 </span></li>
						<li>Total Service Charges <i>-</i> <span>$15.00</span></li>
						<li>Total <i>-</i> <span>$84.00</span></li>
					</ul>
				</div>
				<div class="col-md-8 address_form_agile">
					  <h4>Add a new Details</h4>
				<form action="payment.html" method="post" class="creditly-card-form agileinfo_form">
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
												<div class="controls">
													<label class="control-label">Full name: </label>
													<input class="billing-address-name form-control" type="text" name="name" placeholder="Full name">
												</div>
												<div class="w3_agileits_card_number_grids">
													<div class="w3_agileits_card_number_grid_left">
														<div class="controls">
															<label class="control-label">Mobile number:</label>
														    <input class="form-control" type="text" placeholder="Mobile number">
														</div>
													</div>
													<div class="w3_agileits_card_number_grid_right">
														<div class="controls">
															<label class="control-label">Landmark: </label>
														 <input class="form-control" type="text" placeholder="Landmark">
														</div>
													</div>
													<div class="clear"> </div>
												</div>
												<div class="controls">
													<label class="control-label">Town/City: </label>
												 <input class="form-control" type="text" placeholder="Town/City">
												</div>
													<div class="controls">
															<label class="control-label">Address type: </label>
												     <select class="form-control option-w3ls">
																				ce</option>
																							<option>Home</option>
																							<option>Commercial</option>
							
																					</select>
													</div>
											</div>
											<button class="submit check_out">Delivery to this Address</button>
										</div>
									</section>
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