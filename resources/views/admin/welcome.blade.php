<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>VeV</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

        <link rel="stylesheet" href="{{asset('welcome/theme.css')}}">

        <link rel="stylesheet" href="{{asset('owlcarousel/assets/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('owlcarousel/assets/owl.theme.green.min.css')}}">
    </head>
    <body class="antialiased">
        <div class="container">
        <header>
            <div>
                <svg id="svg" xmlns="http://www.w3.org/2000/svg" viewBox="-300 0 950 270">
                    <path d="M-314,267 C105,364 400,100 812,279" fill="none" stroke="white" stroke-width="120" stroke-linecap="round" />
                </svg>
            </div>
            <h1 style="text-align:left;">Vev</h1>
                    <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                @if (Route::has('login'))
                                        @auth
                                            <a href="{{ url('/home') }}" class="text-sm text-white-700 ltp" >Home</a>
                                        @else
                                            <a href="{{ route('login') }}" class="text-sm text-white-700 ltp" >Log in</a>

                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}" class="text-sm text-white-700 ltp2">Register</a>
                                            @endif
                                        @endauth
                                    </div>
                                @endif
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                <h2 style="text-align:center; font-size:52px; font-weight: bolder; color: #fff">VeV.ae</h2>
                            </div>
                    </div>
            </div>

            <div class="form-group col-lg-4">
                <center>
                    <div class="form-group has-feedback">
                        <div class="sb-example-1">
                            <div class="search">
                                <input type="text" class="searchTerm" placeholder="What are you looking for?">
                                <button type="submit" class="searchButton">
                                <i class="fa fa-search"></i>
                            </button>
                            </div>
                        </div>
                    </div>
                </center>
            </div>

            </header>

            <section>
                <h3>Top Rated Stores</h3>
                    <div class="owl-carousel owl-theme mt-5" id="srvGall">
                    @if(!$stores === null))
                        @foreach($stores as $stor)
                            @php
                                $i=0;
                            @endphp
                        <div class="item">
                            <img src="{{asset('storage/uploads/stores/logo/'.$stor->store_images[$i]->logo) }}" alt="" style="width: 265px; height: 150px;" />
                            <a href="{{route('storeHome', $stor->id)}}" class="link-light nounderline">{{$stor->store_name}}</a>
                        </div>
                            @php
                            if($i<count($stor->store_images)){
                                $i++;
                            }
                            @endphp
                        @endforeach
                    @endif
                    </div>
            </section>

        </div>
    </body>

    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('owlcarousel/owl.carousel.min.js')}}"></script>

    <script>
        $(document).ready(function(){
            $('#srvGall').owlCarousel({
                loop:true,
                margin:10,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:true
                    },
                    600:{
                        items:3,
                        nav:false
                    },
                    1000:{
                        items:5,
                        nav:true,
                        loop:false
                    }
                }
            });

            $('#prdGall').owlCarousel({
                loop:true,
                margin:10,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:true
                    },
                    600:{
                        items:3,
                        nav:false
                    },
                    1000:{
                        items:5,
                        nav:true,
                        loop:false
                    }
                }
            });
        });
    </script>
</html>
