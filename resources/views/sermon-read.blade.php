@extends('layouts.front')

@section('content')

<section>

	<div class="block">

		<div class="container">

			<div class="row">

                @foreach ($sermon as $item)
				<div class="col-md-8 column">

					<div class="single-page">

						<img src="{{ asset("$item->thumbnail") }}" alt="" />

						<h2>{{ $item->title }}</h2>

						<div class="meta">

							<ul>

								<li><i class="fa fa-reply"></i> Posted In <a href="{{ route('sermon') }}" title="">Sermons</a></li>

								<li><i class="fa fa-calendar-o"></i>{{ date_format(date_create($item->created_at), 'D jS M, Y.') }}</li>

								<li><i class="fa fa-user"></i> <a href="#" title="">{{ $item->minister_name }}</a></li>

							</ul>

							{{-- <img src="front/images/resource/author.jpg" alt="" /> --}}

						</div><!-- POST META -->

					</div><!-- SERMON SINGLE -->



					<p>{!!  $item->description  !!}</p>



					<div class="share-this">


					</div><!-- SHARE THIS -->


				</div>
                @endforeach



				<aside class="col-md-4 sidebar column">

					<div class="widget">

						<div class="widget-title"><h4>CATEGORIES</h4></div>

						<ul>

							<li><a href="blog.html" title=""><i class="fa fa-hand-o-right"></i>Events</a></li>

							<li><a href="blog.html" title=""><i class="fa fa-hand-o-right"></i>News</a></li>

							<li><a href="blog.html" title=""><i class="fa fa-hand-o-right"></i>Blog</a></li>

						</ul>

					</div><!-- CATEGORIES -->

				</aside><!-- SIDEBAR -->



			</div>

		</div>

	</div>

</section>
@endsection
