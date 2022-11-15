@extends('layouts.front')
@section('content')

<div class="page-top">

	<div class="parallax" style="background:url(/front/images/parallax1.jpg);"></div>

	<div class="container">

		<h1>CART <span>PAGE</span></h1>

		<ul>

			<li><a href="/" title="">Home</a></li>

			<li><a href="{{ route('products') }}" title="">Products</a></li>

			<li><a href="#!" title="">Cart</a></li>

		</ul>

	</div>

</div>

<section>

	<div class="block">

		<div class="container">

			<div class="row">

				<div class="col-md-12">

						<div class="cart-table">

							<div class="cart-head">

								<h2>IMAGE</h2>

								<h2 class="long-width">PRODUCT NAME</h2>

								<h2>PRICE</h2>

								<h2>QUANTITY</h2>

								<h2>TOTAL</h2>

							</div>

							<ul class="cart-list">

								@if (count(Session::get('cartItems')) > 0)
									@foreach (Session::get('cartItems') as $item)
										<li>

											<ul class="cart-product">

												<li>

													<img class="dustbin" src="{{ asset('front/images/dustbin.png') }}" alt="" />
													@php($image = $item['thumbnail'])
													<img src="{{ asset("$image") }}" alt="" />

												</li>

												<li class="long-width">{{ $item['name'] }} </li>

												<li>&#8358;{{ number_format($item['price'], 2) }}</li>

												<li>

												1

												</li>

												<li>&#8358;{{ number_format($item['price'], 2) }}</li>

											</ul>

										</li>
									@endforeach

									<li>

										Total: &#8358;{{ number_format(Session::get('cartItemsTotal'), 2) }}

										{{-- <input class="pull-right" type="submit" value="PROCEED TO CHECKOUT" /> --}}



									</li>

								@endif





							</ul>

						</div><!-- CART TABLE -->
				</div>

			</div>

            <div class="row">
                <div class="col-md-12">
                    <div class="checkout-block">

                        <h5>Checkout Information</h5>

                        <div class="checkout-content">

                            <p>Provide us all requested information for a better shoping experience.</p>

                            {{-- <form> --}}

                                <div class="row">

                                    <div class="col-md-6" style="margin-top: 8px">

                                        <input type="text"  id="name" class="form-control" placeholder="NAME" />

                                    </div>

                                    <div class="col-md-6" style="margin-top: 8px">

                                        <input type="email" id="email" class="form-control" placeholder="EMAIL" />

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6" style="margin-top: 8px">

                                        <input type="text"  id="phone" class="form-control" placeholder="PHONE NUMBER" />

                                    </div>

                                    <div class="col-md-6" style="margin-top: 8px">

                                        <textarea rows="3" type="text" id="address" class="form-control" placeholder="ADDRESS" ></textarea>

                                    </div>

                                    {{-- <input type="hidden" name="product_id" id="productID" value="{{ $item['id'] }}" class="w-full rounded-md border-gray-300"> --}}
                                    <input type="hidden" name="orderid" id="orderid" value="{{ time() }}" class="w-full rounded-md border-gray-300">
                                    <input type="hidden" id="transid" value="{{ 'LCC'.time() }}" class="w-full rounded-md border-gray-300">
                                    <input type="hidden" name="amount" type="number" id="amount" value="{{ number_format(Session::get('cartItemsTotal'), 2) }}">


                                    <button class="pull-left button checkOut" style="margin-top: 8px">Checkout</button>
                                    <script src="https://checkout.flutterwave.com/v3.js"></script>
                                    {{-- <script src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script> --}}

                                </div>

                            {{-- </form> --}}


                         </div>

                    </div><!-- LOGIN -->
                </div>
            </div>

		</div>

	</div>

    <div class="blck">
        <div class="container">

        </div>
    </div>

</section>

@endsection

