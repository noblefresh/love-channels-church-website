@extends('layouts.front')

@section('content')
<div class="page-top">

	<div class="parallax" style="background:url(images/parallax1.jpg);"></div>	

	<div class="container"> 

		<h1>PRODUCTS <span>PAGE</span></h1>

		<ul>

			<li><a href="/" title="">Home</a></li>

			<li><a href="#!" title="">Products</a></li>

		</ul>

	</div>

</div>

<section>

	<div class="block">

		<div class="container">

			<div class="row">

				<div class="col-md-12">

					<div class="our-products products-page">

						<div class="row">

							@if ($products->count() > 0)
								@foreach ($products as $product)
									<div class="col-md-3">

										<div class="product">

											<img src="{{ asset("$product->thumbnail") }}" alt="" />

											<i>{{ $product->category->name }}</i>

											<h3><a href="#" title="">{{ $product->name }}</a></h3>

											<div class="product-bottom">

												<span>&#8358;{{ number_format($product->price, 2) }}</span>	

												<a href="#" title="" data-product_id="{{ $product->id }}" class="addCartBtn"><i class="fa fa-shopping-cart"></i>ADD TO CART</a>

											</div>

										</div><!-- BOOK -->

									</div>
								@endforeach
							@endif


						</div>





						<div class="theme-pagination">
							{{ $products->links() }}
							

						</div><!-- PAGINATION -->

						

					</div>

				</div>

			</div>

		</div>

	</div>

</section>


@endsection