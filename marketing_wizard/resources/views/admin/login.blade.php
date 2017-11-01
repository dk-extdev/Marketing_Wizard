@extends('admin.layouts.auth')

@section('title', 'Dynamic Video | Log in')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Dynamic Video</b></a>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
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
    {!! Form::open(['route'=>'admin_login','method'=>'POST']) !!}
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="adminemail" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="adminpassword" required="true" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <!--label>
              <input type="checkbox"> Remember Me
            </label-->
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
      {!! Form::close() !!}
    <!--div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div-->
    <!-- /.social-auth-links -->
    <!--a href="register.html" class="text-center">Register a new membership</a-->
  </div>
</div>
@endsection