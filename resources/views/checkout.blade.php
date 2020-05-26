 @extends('layouts.frontend.app')
@section('title','Checkout page ')

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
					<h4>Your Order Products</span></h4>
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>SL No.</th>	
							<th>Product name</th>
							<th>Quality</th>
							<th>Price</th>
						</tr>
					</thead>
					<tbody>
						@foreach($cart_product as $product)
						<tr class="rem1">
						<td class="invert">{{ $loop->iteration }}</td>
						<td class="invert-image">
							{{ $product->name }}
						</td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                         
									<div class="entry value"><span>1</span></div>
								
								</div>
							</div>
						</td>
						
						<td class="invert">{{ number_format($product->price,2) }}</td>
						
					</tr>
					
				</tbody>
				@endforeach
			</table>
			</div>
			<div class="checkout-left">	
				<div class="col-md-4 checkout-left-basket">
					<h4>Continue to basket</h4>

					<ul>
						@foreach($cart_product as $product)
						<li>{{ $product->name }}<i>-</i> <span>{{ number_format($product->price,2) }}</span></li>
						@endforeach
						<li>Tax<i></i> <span>{{ Cart::tax() }} Taka</span></li>
						<hr/>
						<li>Total <i>-</i> <span>{{ Cart::total() }} Taka</span></li>
						
					</ul>
				</div>
				<div class="col-md-8 address_form_agile">
					  <h4>Billing Details</h4>
				<form action="payment.html" method="post" class="creditly-card-form agileinfo_form">
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
												<div class="controls">
													<label class="control-label">Email Address: </label>
													<input class="billing-address-name form-control" type="email" name="name" placeholder="Email Address">
												</div>
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
		<div class="clearfix"></div>
	</div>
<!-- //banner -->

  @endsection
  @push('js')
    @endpush