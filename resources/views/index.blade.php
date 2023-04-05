@extends('app')
@section('content')

    <div class="parent"  id="intro-example">
        <header>
            <nav class="navbar fixed-top navbar-expand-md custom-navbar navbar-dark">
                <div class="container">
                    <img class="navbar-brand" src="{{asset('asset/images/logo_2.png')}}" id="logo_custom" width="10%"  alt="logo">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                                <a class="nav-link" href="#offer"> العربية</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#offer">English</a>
                            </li>
                            @if(session()->has('email'))
                                <li class="nav-item">
                                    <a class="nav-link" href="#offer">ABOUT US</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('SignOut') }}">LOG OUT</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fas fa-bell" style="font-size: 1.73em;"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"> <i class="w-icon-cart" style="font-size: 1.73em;">
                                            <span class="cart-count"></span>
                                        </i>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="" class="nav-link">{{Session::get('user')['user_name']}}
                                        <img src="{{asset('vev/content/user/user-default/user.png')}}" id="profilepic">

                                    </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('SignIn')}}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('registration')}}">SignUp</a>
                                </li>

                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="mask">
                <div class="d-flex justify-content-center align-items-center h-100">
                        <p class="h1">VeV.ae</p>
                        <div class="s004 ">
                            <form>
                                <fieldset>
                                    <div class="inner-form">
                                        <div class="input-field">
                                            <div class="choices" data-type="text" aria-haspopup="true" aria-expanded="false" dir="ltr">
                                                <div class="choices__inner">
                                                    <input class="choices__input is-hidden" id="choices-text-preset-values" type="text" placeholder="Type to search..." tabindex="-1" style="display:none;" aria-hidden="true" data-choice="active" value="">
                                                    <div class="choices__list choices__list--multiple"></div>
                                                    <input type="text" class="choices__input choices__input--cloned" autocomplete="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="Enter  your Full Address"></div>
                                                <div class="choices__list choices__list--dropdown" aria-expanded="false">
                                                </div>
                                            </div>
                                            <span role="presentation" class="locate-me">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="ic-locate-me-round" width="25" height="25" >
                                            <defs><path id="a" d="M11.5 18a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM12 4v2.019A6.501 6.501 0 0 1 17.981 12H20v1h-2.019a6.501 6.501 0 0 1-5.98 5.981L12 21h-1v-2.019a6.501 6.501 0 0 1-5.981-5.98L3 13v-1h2.019A6.501 6.501 0 0 1 11 6.02V4h1zm-.5 11a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5zm0 1a3.5 3.5 0 1 1 0-7 3.5 3.5 0 0 1 0 7zm0-2.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"></path></defs><use fill="white" xlink:href="#a"></use></svg></span>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                </div>
            </div>
        </header>
        <main class="main">
            <div class="page-content mb-8">
                <div class="container">
                    <div class="vendor-search-wrapper">
                        <form class="vendor-search-form">
                            <input type="text" class="form-control mr-4 bg-white" name="vendor" id="vendor"
                                   placeholder="Search Vendors" />
                            <button class="btn btn-primary btn-rounded" type="submit">Apply</button>
                        </form>
                        <!-- End of Vendor Search Form -->
                    </div>
                    <div class="row cols-lg-3 cols-md-2 cols-sm-2 cols-1 mt-4">
                        <div class="store-wrap mb-4">
                            <div class="store store-grid">
                                <div class="store-header">
                                    <figure class="store-banner">
                                        <img src="{{asset('asset/images/vendor/dokan/vendor2.jpeg')}}" alt="Vendor"
                                             style="background-color: #40475E; width:400px; height: 194px" />
                                    </figure>
                                </div>
                                <!-- End of Store Header -->
                                <div class="store-content">
                                    <h4 class="store-title">
                                        <a href="vendor-dokan-store.html">Sanaullah</a>
                                        <label class="featured-label">Featured</label>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                    </div>
                                    <div class="store-address">
                                        Steven Street, El Carjon
                                        California, United States (US)
                                    </div>
                                    <ul class="seller-info-list list-style-none">
                                        <li class="store-phone">
                                            <a href="tel:1234567890"><i class="w-icon-phone"></i>1234567890</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- End of Store Content -->
                                <div class="store-footer">
                                    <figure class="seller-brand">
                                        <img src="{{asset('asset/images/vendor/brand/brand-logo.jpeg')}}" alt="Brand" width="80" height="80" />
                                    </figure>
                                    <a href="{{url('store_profile')}}" class="btn btn-dark btn-link btn-underline btn-icon-right btn-visit">
                                        Visit Store<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                                <!-- End of Store Footer -->
                            </div>
                            <!-- End of Store -->
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script type="text/javascript">
        function initialize() {
            var input = document.getElementById('searchTextField');
            var autocomplete = new google.maps.places.Autocomplete(input);
            google.maps.event.addListener(autocomplete, 'place_changed', function () {
                var place = autocomplete.getPlace();
                var lat = place.geometry.location.lat();
                var long = place.geometry.location.lng()

                alert('latitude'+' '+lat+','+ 'longitude'+' '+long);
                document.getElementById('city2').value = place.name;
                document.getElementById('cityLat').value = place.geometry.location.lat();
                document.getElementById('cityLng').value = place.geometry.location.lng();
                //alert("This function is working!");
                //alert(place.name);
                // alert(place.address_components[0].long_name);

            });
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?libraries=places" type="text/javascript"></script>


@endsection
