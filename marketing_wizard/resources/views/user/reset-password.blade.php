@extends('layouts.auth')

@section('title', 'User Password Reset')

@section('content')

<!--Main Content Wrap Start-->
<div class="gt_main_content_wrap">
    <!--About Us Wrap Start-->
    <section class="gt_about_bg">
        <div class="container">

        </div>
    </section>
    <!--About Us Wrap End-->

</div>
<!--Main Content Wrap End-->

<!-- Password Reset Start -->
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name">DV</h1>

        </div>

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

        <div class="ibox-content" style="">
            <h2 class="font-bold">User Password Reset</h2>
            <p>
                Enter your email address and your password will be reset and emailed to you.
            </p>
            {!! Form::open(['route'=>'user-forget-password-submit']) !!}

            <div class="row">
                <div class="col-lg-12">
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Enter Your Email Address" id="" class="form-control" style="border: 1px solid greenyellow" required>
                        </div>
                        <input type="submit" value="Reset Password" class="btn btn-primary block full-width m-b" >
                </div>
            </div>
            {!! Form::close() !!}

            <a href="{{ action('UserAuthController@getLogin') }}"><small>Back to login</small></a>
        </div>

        <p class="m-t"> <small><strong>Copyright</strong> Dynamic Video&copy; 2014-2017</small> </p>
    </div>
</div>
<!-- Password Reset End -->
@endsection