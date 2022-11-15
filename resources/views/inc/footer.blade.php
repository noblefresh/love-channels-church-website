

<?php
use App\Models\ChurchEvent;
$event = ChurchEvent::latest()->take(2)->get();
?>
<footer>

    <div class="block blackish">

    <div class="parallax" style="background:url({{ asset('front/images/parallax5.jpg') }});"></div>

        <div class="container">

            <div class="row">

                <div class="col-md-4">

                    <div class="widget">

                        <div class="about">

                            <img width="200px" src="{{ asset('front/images/logo.png') }}" alt="" />

                            <span>We Give Best Services</span>

                            <p>Homemade cream cheese mints These are amazing! Made them last Christmas!!- must try!</p>

                            <div class="contact">

                                <ul>

                                    <li><span><i class="fa fa-phone"></i>Phone :</span> ( +185 557 89 89 ) ( +185 557 89 89 )</li>

                                    <li><span><i class="fa fa-envelope"></i>Email:</span> Contactchurch@simple.com</li>

                                    <li><span><i class="fa fa-home"></i>Address:</span> Home Fronts 27# street 7 Road Green</li>

                                </ul>

                            </div>

                            <ul class="social-media">

                                <li><a href="#" title=""><i class="fa fa-linkedin"></i></a></li>

                                <li><a href="#" title=""><i class="fa fa-google-plus"></i></a></li>

                                <li><a href="#" title=""><i class="fa fa-twitter"></i></a></li>

                                <li><a href="#" title=""><i class="fa fa-facebook"></i></a></li>

                            </ul>

                        </div>

                    </div>

                </div><!-- ABOUT WIDGET -->

                <div class="col-md-4">

                    <div class="widget">

                        <div class="widget-title"><h4>Quick Message</h4></div>

                        <div class="quick-message">

                            <div id="message"></div>

                            <form method="post" action="{{ url('/save_contact') }}" name="contactform" id="contactform">
                                @csrf

                                <input name="name" class="half-field form-control" type="text" id="name"  placeholder="Name" />

                                <input name="email" class="half-field form-control" type="text" id="email" placeholder="Email" />

                                <textarea name="message" class="form-control" id="comments" placeholder="Description" ></textarea>

                                <input class="submit" type="submit"  id="submit" value="SUBMIT" />

                            </form><!--- FORM -->

                        </div>

                    </div>

                </div><!-- QUICK MESSAGE WIDGET -->



                <div class="col-md-4">

                    <div class="widget">

                        <div class="widget-title"><h4>Recent Blog</h4></div>

                        <div class="remove-ext">
                            @foreach ($event as $item)
                            <div class="widget-blog">

                                <div class="widget-blog-img"><img src="{{ asset("$item->thumbnail") }}" alt="" /></div>

                                <h6><a href="{{ url('/event-read/'.$item->slug) }}" title=""> {{ $item->name }}</a></h6>
                                @php
                                $string = strip_tags($item->description);
                                if (strlen($string) > 80) {
                                    $stringCut = substr($string, 0, 80);
                                    $endPoint = strrpos($stringCut, ' ');
                                    $string = substr($stringCut, 0, $endPoint);
                                }
                                @endphp
                                <p>{!! $string !!}</p>

                                <span><i class="fa fa-calendar-o"></i> {{ date_format(date_create($item->created_at), 'D jS M, Y.') }}</span>

                            </div>
                            @endforeach

                        </div>



                    </div>

                </div><!-- RECENT BLOG -->

            </div>

        </div>

    </div>

</footer><!-- FOOTER -->



<div class="bottom-footer">

    <div class="container">

        <p>©{{ date('Y') }} <a href="#" title="">Love Channels</a> All rights reserved. Developed by <a target="_blank" href="https://pivvatech.com" title="">PivvaTech</a></p>



    </div>

</div><!-- BOTTOM FOOTER STRIP -->





</div>


