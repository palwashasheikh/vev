@extends("admin.dashboard.layouts.main")
{{--@extends('admin.layouts.app')--}}
@section('content')
<style>
    .bs-example{
        margin: 20px;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="bs-example">
            <div class="card" style="width: 300px;">
                <img src="{{asset('img/default.svg')}}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                    <h5 class="card-title">{{Auth::user()->user_name}}</h5>
                    <p class="card-text"></p>
                    <a href="#" class="btn btn-primary stretched-link">View Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
