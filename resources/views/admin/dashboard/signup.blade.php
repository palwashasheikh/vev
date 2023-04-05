@include("dashboard.layouts.main")
<body id="kt_body" style="background-image: url(theme/html/demo2/dist/assets/media/bg/bg-10.jpg)" class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
<div class="d-flex flex-column flex-root">
    <div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid wizard" id="kt_login">
        <div class="login-container d-flex flex-center flex-row flex-row-fluid order-2 order-lg-1 flex-row-fluid bg-white py-lg-0 pb-lg-0 pt-15 pb-12">
            <div class="login-content login-content-signup d-flex flex-column">
                <a href="#" class="login-logo pb-xl-20 pb-15">
                    <h1 class="heading-pink">Vev.ae</h1>
                </a>
                <div class="login-form">
                    <form class="form px-10"  id="kt_login_signup_form" method="post" action="{{   route('admin.SignUp')  }}">
                        {{ csrf_field() }}
                        <div class="" data-wizard-type="step-content" data-wizard-state="current">
                            <div class="pb-10 pb-lg-12 heading-pink">
                                <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Create Account</h3>
                                <div class="text-muted font-weight-bold font-size-h4">Already have an Account ?
                                    <a href="{{url('login')}}" class="text-primary font-weight-bolder ">Sign In</a></div>
                            </div>
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">User Name</label>
                                <input type="text" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="name" placeholder="User Name" value="" />
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">User Email</label>
                                <input type="text" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="email" placeholder="user Email" value="" />
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">User phone</label>
                                <input type="text" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="phone" placeholder="user Email" value="" />
                                @if ($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="font-size-h6 font-weight-bolder text-dark">Password</label>
                                <input type="password" class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6" name="password" placeholder="user Password" value="" />
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pt-7">
                            <button type="submit" id="kt_login_singin_form_submit_button" class="btn btn-light-danger font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="login-aside order-1 order-lg-2 bgi-no-repeat bgi-position-x-right">
            <div class="login-conteiner bgi-no-repeat bgi-position-x-right bgi-position-y-bottom" style="background-image: url(https://preview.keenthemes.com/metronic/theme/html/demo2/dist/assets/media/svg/illustrations/login-visual-4.svg);">
                <h3 class="pt-lg-40 pl-lg-20 pb-lg-0 pl-10 py-20 m-0 d-flex justify-content-lg-start font-weight-boldest display5 display1-lg text-white">We Got
                    <br />A Surprise
                    <br />For You</h3>
            </div>
        </div>
    </div>
</div>

@extends("dashboard.footer")
