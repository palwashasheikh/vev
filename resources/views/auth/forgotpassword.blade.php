@extends('app')

@section('content')
<section>
    <div class="main-container container">
        <div class="left-div">
            <div class="left-image">
                <img src="{{asset('asset/images/forgotpassword.png')}}" alt="">
            </div>
        </div>
        <div class="right-div" >
            <img id="logo" src="{{asset('asset/images/Asset 14.png')}}" alt="">
            <h3>Forgot Password</h3>
            <div> <span>Enter the email address you used to create your<br>
                        account and we will email you a link to reset
                                    your password</span> </div>
            <form  method="post" action="{{route('validateUser')}}"  class="right-form pt-10">
                @csrf
                <ul class="box-shadow">
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{session()->get('error') }}
                        </div>
                    @endif
                    <li><img src="{{asset('asset/images/mail1.png')}}" alt="Mail">
                        <input type="text" placeholder="email/phone"  name="email_phone"  id="number"></li>
                    <li></li>
                        <div id="recaptcha-container"></div>
                </ul>
                <input type="submit" value="Next">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/firebase/8.0.1/firebase.js"></script>
<script src="{{ asset('asset/js/firebase.js') }}"></script>
@endsection
