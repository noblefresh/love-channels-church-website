@extends('layouts.front')
@section('content')

<div class="page-top">

	<div class="parallax" style="background:url(images/parallax1.jpg);"></div>

	<div class="container">

		<h1>CHECKOUT <span>PAGE</span></h1>

		<ul>

			<li><a href="/" title="">Home</a></li>

			<li><a href="{{ route('products') }}" title="">Products</a></li>

			<li><a href="#" title="">Order Recieved</a></li>

		</ul>

	</div>

</div>



<section>

	<div class="block">

		<div class="container">

			<div class="row">

				<div class="col-md-12">

					<div class="thanks-message">

						<span><i class="fa fa-check-square"></i></span>

						<h5>THANK YOU</h5>

						<p>Your Order Has Been Recieved</p>

					</div>

				</div>

			</div>

		</div>

	</div>

</section>



</section>

@endsection

