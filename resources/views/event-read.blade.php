@extends('layouts.front')

@section('content')
<div class="page-top">

	<div class="parallax" style="background:url(images/parallax1.jpg);"></div>

	<div class="container">

		<h1>EVENT <span>SINGLE</span></h1>

		<ul>

			<li><a href="/" title="">Home</a></li>

			<li><a href="{{ route('events') }}" title="">Events</a></li>

			<li><a href="#" title="">Read Events</a></li>

		</ul>

	</div>

</div>
<section>

	<div class="block">

		<div class="container">

            <div class="row">
                @foreach ($event as $item)
				<div class="col-md-8 column">

					<div class="single-page">

						<img src="{{ asset("$item->thumbnail") }}" alt="" />

						<h2>{{ $item->name }}</h2>

						<div class="meta">

							<ul>

								<li><i class="fa fa-reply"></i> Posted In <a href="{{ route('events') }}" title="">Event</a></li>

								<li><i class="fa fa-calendar-o"></i> {{ date_format(date_create($item->start_date), 'D jS M, Y. H:i A') }}</li>

								<li><i class="fa fa-calendar-o"></i> {{ date_format(date_create($item->end_date), 'D jS M, Y. H:i A') }}</li>

							</ul>

							{{-- <img src="front/images/resource/author.jpg" alt="" /> --}}

						</div><!-- POST META -->

					</div><!-- SERMON SINGLE -->



					<p>{!!  $item->description  !!}</p>



					<div class="share-this">

						{{-- <h5><i class="fa fa-share"></i> SHARE THIS SERMON</h5>

						<ul class="social-media">

							<li><a href="#" title=""><i class="fa fa-linkedin"></i></a></li>

							<li><a href="#" title=""><i class="fa fa-google-plus"></i></a></li>

							<li><a href="#" title=""><i class="fa fa-twitter"></i></a></li>

							<li><a href="#" title=""><i class="fa fa-facebook"></i></a></li>

						</ul> --}}

					</div>

				</div>
                @endforeach


				<aside class="col-md-4 sidebar column">

					<div class="widget">

						<div class="widget-title"><h4>ABOUT US</h4></div>

						<div class="footer-logo">

							<img src="{{ asset('front/images/logo.png') }}" alt="jj" />

						</div>

						<p>Suspendisse velit ante, aliquet vel adipi cing auctor, tincidunt a diam orem ipsum.</p>

						<div class="contact">

							<ul>

								<li><i class="fa fa-home"></i>Address : 242 NTB Street, NY, US</li>

								<li><i class="fa fa-envelope"></i>Email: youremail@yourdomain.com</li>

								<li><i class="fa fa-phone"></i>Telephone: +1555 1235</li>

							</ul>

						</div><!-- CONTACT INFO -->

					</div><!-- ABOUT WIDGET -->

				</aside><!-- SIDEBAR -->



			</div>

		</div>

	</div>

</section>

@endsection
