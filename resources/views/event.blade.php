@extends('layouts.front')

@section('content')
<div class="page-top">

	<div class="parallax" style="background:url(front/images/parallax1.jpg);"></div>

	<div class="container">

		<h1>EVENTS <span>LISTING</span></h1>

		<ul>

			<li><a href="index-2.html" title="">Home</a></li>

			<li><a href="events-grid.html" title="">Events Grid View</a></li>

		</ul>

	</div>

</div><!--- PAGE TOP -->
<section>

	<div class="block">

		<div class="container">

			<div class="row">

				<div class="col-md-8 column">

					<div class="events-gridview remove-ext">

						<div class="row">

							@foreach ($events as $event)
                            <div class="col-md-6">

								<div class="category-box">

									<div class="category-block">

										<div class="category-img">

									 		<img src="{{ asset("$event->thumbnail") }}" alt="" />

											<ul>

												<li class="date"><a href="#" title=""><i class="fa fa-calendar-o"></i> {{ date_format(date_create($event->start_date), 'D jS M, Y. H:i A') }}</a></li>

												<li class="date"><a href="#" title=""><i class="fa fa-calendar-o"></i>{{ date_format(date_create($event->end_date), 'D jS M, Y. H:i A') }}</a></li>

											</ul>

										</div>

										<h3><a href="{{ url('/event-read/'.$event->slug) }}" title="">{{ $event->name }}</a></h3>

										<span><i class="fa fa-map-marker"></i> {{ date_format(date_create($event->start_date), 'D jS M, Y. H:i A') }}</span>

									</div>

								</div><!-- EVENTS -->

							</div>
                            @endforeach

						</div>

					</div><!-- EVENTS GRID VIEW -->

				</div>



				<aside class="col-md-4 sidebar column">

					<div class="widget">

						<form class="search-form">

							<input type="text" placeholder="START SEARCHING" />

							<input type="submit" value="" />

						</form>

					</div><!-- SEARCH FORM -->

					<div class="widget">

						<div class="widget-title"><h4>META</h4></div>

						<ul>

							<li><a href="{{ route('events') }}" title=""><i class="fa fa-hand-o-right"></i>Events</a></li>

							<li><a href="{{ route('sermon') }}" title=""><i class="fa fa-hand-o-right"></i>Sermon</a></li>

							<li><a href="{{ route('products') }}" title=""><i class="fa fa-hand-o-right"></i>Shop</a></li>

						</ul>

					</div><!-- META -->
				</aside><!-- SIDEBAR -->



			</div>

		</div>

	</div>

</section>

@endsection
