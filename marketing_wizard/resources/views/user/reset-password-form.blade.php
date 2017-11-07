@extends('layouts.auth')

@section('title', 'User Password Reset')

@section('content')

    <!--Main Content Wrap Start-->
    <div class="gt_main_content_wrap">
        <!--About Us Wrap Start-->
        <section class="gt_about_bg">
            <div class="container">
                <div class="row">
                    <div class="middle-box text-center animated fadeInDown">
                        <div>
                            <h1 class="logo-name">DV</h1>
                        </div>
                        <h3>User Password Reset</h3>
                        @if (session()->has('message'))
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        @if(Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <strong>Success ..! </strong> {{ Session::get('success') }}
                            </div>
                        @elseif(Session::has('error'))
                            <div class="alert alert-danger" role="alert">
                                <strong>Error ..! </strong> {{ Session::get('error') }}
                            </div>
                        @elseif(count($errors) > 0)
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <h4 class="text-center"><strong>Error ..! </strong> You have Something Error.</h4>
                                <ul class="text-center">
                                    @foreach($errors->all() as $error)
                                        <li><p style="color: red">{!! $error !!}</p></li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="gt_about_wrap" style="margin-bottom: 10px;">
                            {!! Form::open(['route'=>'user-reset-password-submit']) !!}

                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <h5> Email : </h5>
                                </div>
                                <div class="col-md-8">
                                    <input type="email" name="email" placeholder="Enter Your Email Address" id="" class="form-control" style="border: 1px solid greenyellow" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <h5> New Password : </h5>
                                </div>
                                <div class="col-md-8">
                                    <input type="password" name="password" placeholder="Enter New Password" id="" class="form-control" style="border: 1px solid greenyellow" required>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <h5> Confirm Password : </h5>
                                </div>
                                <div class="col-md-8">
                                    <input type="password" name="password_confirmation" placeholder="Enter Confirm Password" id="" class="form-control" style="border: 1px solid greenyellow" required>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-8 col-md-offset-3">
                                    <input type="submit" value="Reset Password" class="btn btn-primary btn-block" style="margin-top: 10px">
                                </div>

                            </div>
                            {!! Form::close() !!}
                        </div>
                </div>
                
            </div>
        </section>
        <!--About Us Wrap End-->
    </div>
    <!--Main Content Wrap End-->


@endsection