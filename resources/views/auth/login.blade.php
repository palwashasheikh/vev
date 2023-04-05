@extends('app')
@section('content')
    <section>
        <div class="main-container container">
            <div class="left-div">
                <div class="left-image">
                    <img src="{{asset('asset/images/Group 211.png')}}" alt="">
                </div>
            </div>
            <div class="right-div" id="login-form">
                <img id="logo" src="{{asset('asset/images/Asset 14.png')}}" alt="">
                <h3>Welcome to Vev</h3>
                <h5>New Here? </h5><a class="first-text" href="{{url('registration')}}">Create an account</a>
                <form  method="POST" action="{{route('login.custom')}}" class="right-form">

                    <ul class="box-shadow">
                        @if(session()->has('error'))
                            <div class="error">
                                {{ session()->get('error') }}
                            </div>
                        @endif
                            @csrf
                        <li><img src="{{asset('asset/images/Profile.png')}}" class="img-responsive" alt="Profile">
                            <input type="text"  name="email"  placeholder="email" required></li>
                        <li><img src="{{asset('asset/images/002-password.png')}}"alt="Password" class="img-responsive">
                            <input type="password"  name="password" placeholder="password"></li>
                        <li><a href="{{url('ForgotPassword')}}">Forgot Password</a></li>
                    </ul>
                    <input type="submit" value="Login">
                </form>
                <div class="footer">
                    <h6 class="line-1">or login width</h6>
                    <ul class="social">
                        <li><a href="{{url('facebook')}}"><img class="img-size" src="{{asset('asset/images/facebook.png')}}" alt=""/></a></li>
                        <li><a href="{{url('google')}}"><img class="img-size" src="{{asset('asset/images/google.png')}}" alt=""/></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
