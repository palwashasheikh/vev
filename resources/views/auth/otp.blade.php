@extends('app')

@section('content')
    <section style="background:url({{asset('asset/images/otp.png')}});object-fit:cover; background-attachment: fixed;
        background-position: center;background-repeat: no-repeat;margin-left: 12px">
        <div class="container height-100 d-flex justify-content-center align-items-center">
            <div class="position-relative">
                <div class="card p-2 text-center">
                    <img id="logo" src="{{asset('asset/images/Asset 14.png')}}" alt="">
                    <h6>Enter OTP</h6>
                    <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>
                    <div> <span>Check your SMS messages. We've sent you the
                            </br>  PIN at (+1) 080-744-5078</span> </div>

                    <form  method="post" action="javascript:;">
                    <div id="verifPhNum" class="d-flex flex-row justify-content-center pt-10">
                        <input class="form-control m-2 text-center form-control rounded" name="verifyOtp[]"  type="number" id="verificationCode" min = "1" />
                        <input class="form-control m-2 text-center form-control rounded"  name="verifyOtp[]" type="number" id="verificationCode"minlength="1" />
                        <input class="form-control m-2 text-center form-control rounded" name="verifyOtp[]" type="number" id="verificationCode" minlength="1" />
                        <input class="form-control m-2 text-center form-control rounded" name="verifyOtp[]" type="number" id="verificationCode"minlength="1" />
                        <input class="form-control m-2 text-center form-control rounded" name="verifyOtp[]" type="number" id="verificationCode" minlength="1" />
                        <input class="form-control m-2 text-center form-control rounded"  name="verifyOtp[]" type="number" id="verificationCode" minlength="1" />
                    </div>
                    <div class="mt-4">
                        <input type="submit" id="verify_otp"  value="SIGN UP"></div>
                        <div id="recaptcha-container"></div>
                    </form>
                    <div class="mt-2 d-flex  justify-content-center">
                        <p>Didn't you receive any code?</p>
                        <a href="">Re-send code</a>
                    </div>
                    <div class="footer mt-2">
                        <ul class="d-flex social">
                            <li><a href="#"> العربية</a></li>
                            <li><a href="#">English</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script src="{{ asset('asset/js/firebase.js') }}"></script>
@endsection
