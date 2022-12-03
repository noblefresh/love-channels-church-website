@extends('layouts.front')

@section('content')
<section>

    <div class="page-top">

        <div class="parallax" style="background:url(front/images/parallax1.jpg);"></div>

        <div class="container">

            <h1>ABOUT <span>US</span></h1>

            <ul>

                <li><a href="index-2.html" title="">Home</a></li>

                <li><a href="about.html" title="">About Us</a></li>

            </ul>

        </div>

    </div>

	<div class="block">

		<div class="container">

			<div class="row">

				<div class="col-md-6 column">

					<div class="simple-text">

						<h3>THE CHURCH WE ARE</h3>

						<p>The Lovechannels is a church for all. Our doors are always open and we tolerate and accommodate every tribe, all types and categories of men and women. <br/>
                            God's love is unconditional and for all of us at The Lovechannels, we receive it with open arms and channel this love by demonstrating and allowing it to flow through us to others around us.
                            With us always look out for a smile and a warm hand shake and be not surprised if you get a big hug. <br/>
                            The Lovechannels is a place where everyone is recognized, valued and assured of God’s 100% love. It is an atmosphere of friendship where the Lord lavishes His blessings on all and even forever more.
                            So, come and experience something different that will transform you into all that God wants you to be.
                        </p>

					</div>

				</div>

				<div class="col-md-6 column">

					<div class="video">

						<div class="video-img lightbox">

							<img src="{{ asset('front/images/resource/video.jpg') }}" alt="" />

							<a href="http://vimeo.com/44867610" title="" data-poptrox="vimeo"><i class="fa fa-play"></i></a>

						</div>

					</div><!-- VIDEO -->

				</div>

			</div>



		</div>

        <div class="container" style="margin-top: 50px">

			<div class="row">

				<div class="col-md-6 column">

					<div class="simple-text">

						<h3>OUR VISION AND MISSION STATEMENT</h3>

						<p>The Lovechannels exist for the purpose of connecting people to God via the gospel and training them into a community that is unified in love, changing their word. </p>
						<p>The Lovechannels is a community of God that is committed to grooming men/women that function in harmony with one another through the Acronym - <b>CDCCBR</b>.<br>
                            •	Celebrating the Unconditional Love of God<br>
                            •	Demonstrating that Love<br>
                            •	Communicating the Word of God<br>
                            •	Cultivating His Character<br>
                            •	Building lives and Families<br>
                            •	Raising Leaders (Purpose Discovery)
                            </p>

					</div>

				</div>

				<div class="col-md-6 column">

					<div class="video">

						<div class="video-img lightbox">

							<img src="{{ asset('front/images/resource/video.jpg') }}" alt="" />

							<a href="http://vimeo.com/44867610" title="" data-poptrox="vimeo"><i class="fa fa-play"></i></a>

						</div>

					</div><!-- VIDEO -->

				</div>

			</div>



		</div>

	</div>

</section>





<section>

	<div class="block blackish">

	<div class="parallax" style="background:url(front/images/parallax3.jpg);"></div>

		<div class="container">

			<div class="row">

				<div class="col-md-12 column">

					<div class="pastors-carousel">

						<div class="pastors-message">

							<div class="row">

								<div class="col-md-3">

									<img src="front/images/resource/pastor1.jpg" alt="" />

								</div>

								<div class="col-md-9">

									<h4>CHIOMA & NDUBUISI RUFUS</h4>

									<span>RESIDENT PASTOR</span>

									<p>We believe that God deserves our best. That superior quality should mark what a Christian does. That it is a good testimony for a Christian to produce superior quality. It is a poor testimony for a Christian to have inferior quality. We strive for excellence in everything that we do. We strive for it in worship. We strive for it in music, in messages, in teaching, in pastoral care, in evangelism, in organization, in advertising.</p>

									<ul class="sermon-media">

										<li><a href="" data-rel="prettyPhoto" title=""><i class="fa fa-film"></i></a></li>

										<li><a title=""><i class="audio-btn fa fa-headphones"></i>

											<div class="audioplayer"><audio src="sermon.mp3"></audio><span class="cross">X</span></div>

										</a></li>

										<li><a target="_blank" href="" title=""><i class="fa fa-download"></i></a></li>

										<li><a target="_blank" href="" title=""><i class="fa fa-book"></i></a></li>

									</ul>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</section>

@endsection
