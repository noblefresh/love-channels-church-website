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
                                @if(Session::get('cartItems') !== null)
                                    @if (count(Session::get('cartItems')) > 0)
                                    @foreach (Session::get('cartItems') as $item)
                                        <li>

                                            <ul class="cart-product">

                                                <li>

                                                    <img class="dustbin" src="{{ asset('front/images/dustbin.png') }}" alt="" />
                                                    @php($image = $item['thumbnail'])
                                                    <img src="{{ asset("$image") }}" alt="" />

                                                </li>

                                                <li class="long-width">{{ $item['name'] }}</li>

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

                                        <a href="{{ route('products.checkout') }}" class="pull-right">PROCEED TO CHECKOUT</a>



                                    </li>

                                @endif
                                @endif






							</ul>

						</div><!-- CART TABLE -->













				</div>

			</div>

		</div>

	</div>

</section>

@endsection
