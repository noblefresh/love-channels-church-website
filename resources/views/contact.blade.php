@extends('layouts.front')

@section('content')
<div class="page-top">
    <div class="parallax" style="background:url(front/images/parallax1.jpg);"></div>
    <div class="container">
        <h1>CONTACT <span>US</span></h1>
        <ul>
            <li><a href="index-2.html" title="">Home</a></li>
            <li><a href="contact.html" title="">Contact Us</a></li>
        </ul>
    </div>
</div><!--- PAGE TOP -->

<section>
    <div class="block">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="map">
                        <iframe src="https://www.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=uk&amp;aq=&amp;sll=18.312811,-4.306641&amp;sspn=46.292419,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=United+Kingdom&amp;ll=52.352119,-2.647705&amp;spn=0.685471,1.352692&amp;t=p&amp;z=10&amp;output=embed"></iframe>
                    </div><!--- GOOGLE MAP -->
                </div>
            </div>
        </div>
    </div>
</section>


<section>
    <div class="block remove-gap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title2">
                        <span>Pellent Esque Tellus</span>
                        <h2>LET'S <span>GET IN TOUCH</span></h2>
                    </div>

                    <div class="row">
                        <div class="col-md-6 column">
                            <h4>CONTACT INFORMATION</h4>
                            <div class="space"></div>
                            <p>The Lovechannels is a place where everyone is recognized, valued and assured of God’s 100% love. It is an atmosphere of friendship where the Lord lavishes His blessings on all and even forever more.</p>
                            <div class="space"></div>
                            <p>So, come and experience something different that will transform you into all that God wants you to be. </p>
                            <div class="space"></div>

                        </div><!--- CONTACT INFORMATION -->
                        <div class="col-md-6 column">
                            <h4>FILL IN THE FORM BELOW</h4>
                            <div class="space"></div>
                            <div id="message"></div>
                            <form class="theme-form" method="post" action="{{ url('/save_contact') }}" name="contctfom" id="contactform">
                                @csrf
                                <input name="name" class="half-field form-control" type="text" id="name"  placeholder="Name" />
                                <input name="email" class="half-field form-control" type="text" id="email" placeholder="Email" />
                                <textarea name="message" class="form-control" id="comments" placeholder="Message" ></textarea>
                                <input class="submit" type="submit"  id="submit" value="SUBMIT" />
                            </form><!--- FORM -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="block remove-gap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="contact-info">
                        <div class="col-md-3">
                            <div class="info-block">
                                <i class="fa fa-home"></i>
                                <p>Plot 175 Ada George Rd, Port Harcourt, R/S</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-block">
                                <i class="fa fa-info"></i>
                                <p>www.thelovechannelng.com</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-block">
                                <i class="fa fa-envelope-o"></i>
                                <p>thelovechannelng@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-block">
                                <i class="fa fa-mobile"></i>
                                <p>+234-703-9979-215</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--- CONTACT INFORMATION -->
@endsection
