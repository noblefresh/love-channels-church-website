
    <!-- SCRIPTS-->

    <script type="text/javascript" src="{{ asset('front/js/modernizr.custom.17475.js') }}"></script>



    <script src="{{ asset('front/js/jquery.1.10.2.js') }}" type="text/javascript"></script>
    {{-- <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous" defer></script> --}}

    <script src="{{ asset('front/js/shoppingCart.js') }}" type="text/javascript"></script>


    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('front/js/jquery.poptrox.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('front/js/enscroll-0.5.2.min.js') }}"></script>

    <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('front/js/mediaelement-and-player.min.js') }}"></script>

    <script src="{{ asset('front/js/script.js') }}"></script>

    <script src="{{ asset('front/js/styleswitcher.js') }}"></script>

    <script type="text/javascript" src="{{ asset('front/js/jquery.downCount.js') }}"></script>

    <script class="source" type="text/javascript">



        $('.countdown').downCount({

            date: '09/09/2015 12:00:00',

            offset: +10

        });

    </script>





    <script>

    $(document).ready(function() {

        $(".tweets-slides").owlCarousel({

            autoPlay: 5000,

            slideSpeed:1000,

            singleItem : true,

            transitionStyle : "fadeUp",

            navigation : false

        }); /*** TWEETS CAROUSEL ***/



        $(".products-carousel").owlCarousel({

            autoPlay: false,

            rewindSpeed : 3000,

            slideSpeed:2000,

            items : 2,

            itemsDesktop : [1199,2],

            itemsDesktopSmall : [979,2],

            itemsTablet : [768,2],

            itemsMobile : [479,1],

            navigation : false,

        }); /*** PRODUCTS CAROUSEL ***/



    });

    $('audio,video').mediaelementplayer();

    </script>





    <!-- SLIDER REVOLUTION -->

    <script type="text/javascript" src="{{ asset('front/js/revolution/jquery.themepunch.tools.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('front/js/revolution/jquery.themepunch.revolution.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('front/js/revolution/extensions/revolution.extension.slideanims.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('front/js/revolution/extensions/revolution.extension.layeranimation.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('front/js/revolution/extensions/revolution.extension.navigation.min.js') }}"></script>

    <script type="text/javascript">

        jQuery(document).ready(function() {

           jQuery("#slider1").revolution({

              sliderType:"standard",

              sliderLayout:"fullwidth",

              delay:9000,

              navigation: {

                  arrows:{enable:true}

              },

              gridwidth:1100,

              gridheight:500

            });

        });



    </script>


    @if (session('success'))
    <script>
        swal({
            title: "Bravo",
            text: "{{ session('success') }}",
            icon: "success",
            button: "Ok!",
        });
    </script>
    @endif

    @if (session('error'))
    <script>
        swal({
            title: "Error",
            text: "{{ session('error') }}",
            icon: "error",
            button: "Ok!",
        });
    </script>
    @endif



</body>
