@extends('app')
@section('content')
    <script src="{{ asset('asset/js/firebase.js') }}"></script>
    <section>
        <div class="main-container container">
            <div class="left-div">
                <div class="left-image">
                    <img src="{{asset('asset/images/signup.png')}}" alt="">
                </div>
            </div>
            <div class="right-div " id="signup-form">
                <div class="alert alert-danger" id="error" style="display: none;"></div>
                <img id="logo" src="{{asset('asset/images/Asset 14.png')}}" alt="">
                <h3>Welcome to Vev</h3>
                <h5>Have already an account</h5><a class="first-text" href="{{url('SignIn')}}">Login</a>
                <form  method="post" action="javascript:;"  class="right-form">
                    @csrf
                    <div class="alert alert-success" id="sentSuccess" style="display: none;"></div>
                    <ul class="box-shadow ">
                        <li><img src="{{asset('asset/images/mail1.png')}}" alt="Mail">
                            <input type="text" placeholder="email"  name="email" required></li>
                        <li><img src="{{asset('asset/images/Profile.png')}}" alt="Profile">
                            <input type="text" placeholder="username" name="name" required></li>
                        <li><img src="{{asset('asset/images/phone.png')}}"alt="Phone">
                            <input type="tel" placeholder="phone" name="phone" id="phone">
                            <div id="recaptcha-container"></div><br>
                        </li>
                        <li><img src="{{asset('asset/images/002-password.png')}}"alt="Password">
                            <input type="password" placeholder="password" name="password">
                        </li>
                        <li>
                            <input type="hidden" value="{{url('/otp')}}" id="url" name="url">
                        </li>

                    </ul>
                    <input type="submit" value="Send OTP"   id="GetCode">
                </form>
                <div class="footer">
                    <ul class="social">
                        <li><a href="#"> العربية</a></li>
                        <li><a href="#">English</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
