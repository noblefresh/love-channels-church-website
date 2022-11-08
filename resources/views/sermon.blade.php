@extends('layouts.front')

@section('content')

<section>

	<div class="block">

		<div class="container">

			<div class="row">

				<div class="col-md-8 column">

					<div class="latest-sermons remove-ext">

						<div class="sermon">

							<div class="row">

								<div class="col-md-3">

									<div class="image">

										<img src="images/resource/sermon1.jpg" alt="" />

										<a href="sermon-single.html" title=""><i class="fa fa-link"></i></a>

									</div>

								</div>

								<div class="col-md-9">

									<h3><a href="sermon-single.html" title="">Global Warning and the End of the Age</a></h3>

									<span><i class="fa fa-calendar-o"></i> November 01, 2014</span>

									<p>Aenean leo vene quam. Pellntes ique ornare sem wedte venenatis. Pellntes ornew vestibum.Aenean leo vene quam. Pellntes ique ornare sem wedte venenatis Aenean leo vene quam. Pellntes ique ornare sem wedte venenatis</p>

								</div>

								<div class="hover-in">

									<ul class="sermon-media">

										<li><a href="http://vimeo.com/44867610" data-rel="prettyPhoto" title=""><i class="fa fa-film"></i></a></li>

										<li><a title=""><i class="audio-btn fa fa-headphones"></i>

											<div class="audioplayer"><audio  src="sermon.mp3"></audio><span class="cross">X</span></div>

										</a></li>

										<li><a target="_blank" href="http://themes.webinane.com/deeds/test.doc" title=""><i class="fa fa-download"></i></a></li>

										<li><a target="_blank" href="http://themes.webinane.com/deeds/test.pdf" title=""><i class="fa fa-book"></i></a></li>

									</ul>

								</div>

							</div>

						</div><!-- SERMON -->

					</div><!-- LATEST SERMONS -->

				</div>



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