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
                <h3>Reset Password</h3>

                <form  method="post" action="{{route('register.custom')}}"  class="right-form pt-10">
                    @csrf
                    <ul class="box-shadow">
                        <li>
                            <input type="password" placeholder="NEW PASSWORD"  name="password" required>
                        </li>
                        <li>
                            <input type="password" placeholder="CONFIRM PASSWORD"  name="password" required>
                        </li>
                        <li></li>
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
    </section>
@endsection
