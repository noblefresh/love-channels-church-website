
<body>

<div class="theme-layout" id="app">



<header class="header2 stick ">

    <div class="topbar">

        <div class="container">

            <div class="header-timer">

                <p>Upcoming Prayers:</p>

                <ul class="headercounter">

                    <li> <span class="days">00</span>

                    <p class="days_ref">DAYS</p>

                    </li>

                    <li> <span class="hours">00</span>

                    <p class="hours_ref">HOURS</p>

                    </li>

                    <li> <span class="minutes">00</span>

                    <p class="minutes_ref">MINTS</p>

                    </li>

                    <li> <span class="seconds">00</span>

                    <p class="seconds_ref">SECS</p>

                    </li>

                </ul>

            </div>

            <p><i class="fa fa-mobile"></i> 24/7 Support: 123-456-7890</p><!--- CONTACT -->

            <p><i class="fa fa-envelope"></i>  Youremail@yourdomain.com</p><!--- EMAIL -->

            <ul class="social-media">

                <li><a title="" href="#"><i class="fa fa-linkedin"></i></a></li>

                <li><a title="" href="#"><i class="fa fa-google-plus"></i></a></li>

                <li><a title="" href="#"><i class="fa fa-twitter"></i></a></li>

                <li><a title="" href="#"><i class="fa fa-facebook"></i></a></li>

            </ul>

            <div class="cart-dropdown">

                <p>
                    <a href="{{ route('products.cart') }}">
                        <i class="fa fa-shopping-cart"></i> <span class="cart_count">{{ (Session::get('cartItems') != null) ? count(Session::get('cartItems')) : 0 }}</span> items -
                    <span>
                        &#8358;<span class="cart_price">{{ (Session::get('cartItemsTotal') != null) ? number_format(Session::get('cartItemsTotal'), 2) : 0.00 }}</span>
                    </span>
                    </a>
                </p>



            </div>

        </div>

    </div><!--- TOP BAR -->

    <nav class="style1">

        <div class="container">

            <div class="logo">

                <a href="/" title=""><img src="{{ asset('front/images/logo.png') }}" alt="" /></a>

            </div><!--- LOGO -->

            <ul>

                <li ><a style="color: #0b06a9;" href="/" title="">Home</a></li>


                <li class=""><a href="{{ route('products') }}" title="">Shop</a>



                </li>

                <li class=""><a href="{{ route('events') }}" title="">Events</a></li>

                <li class=""><a href="{{ route('sermon') }}" title="">Sermons</a></li>

                <li><a href="{{ route('about') }}" title="">About</a></li>

                <li><a href="{{ route('contact') }}" title="">Contact</a></li>

            </ul>

            <form class="header-search">

                <input type="text" placeholder="Enter Your Search Keyword" />

                <input type="submit" value="" />

            </form>

        </div>

    </nav>

</header><!--- HEADER -->





