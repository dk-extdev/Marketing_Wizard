@extends('admin.layouts.home')

@section('title', 'Settings')

@section('content')

<section class="content-header">
	<h1>
		Settings
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-home"></i> Home</a></li>
		<li class="active">Settings</li>
	</ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">
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
      <div class="box box-info">
      	<div class="col-md-4">
      		<div class="box-header">
	          <h3 class="box-title">Change Admin Password</h3>
	        </div>
	        {!! Form::open(['route'=>'update_admin_password','method'=>'POST','data-parsley-validate'=>'']) !!}
	        <div class="box-body">
	        	<div class="form-group">
              <label>Current Password:</label>

              <div >
                <input type="password" class="form-control"  name="old_password" required data-parsley-required-message="Current password is required" data-parsley-trigger="change">
              </div>
            </div>
            <div class="form-group">
              <label>New Password:</label>
              <div >
                <input id="new_password" type="password" class="form-control" name="new_password" required data-parsley-required-message="New password is required" data-parsley-trigger="change">
              </div>
            </div>
            <div class="form-group">
              <label>Repeat New Password:</label>
              <div >
                <input type="password" class="form-control" name="conf_password" required data-parsley-required-message="New password confirm is required" data-parsley-equalto="#new_password" data-parsley-equalto-message="New password confirm should be equal to New Password">
              </div>
            </div>
            <button type="submit" class="btn btn-info center-block">Update</button>
	        </div>
	        {!! Form::close() !!}
      	</div>
      	<div class="col-md-4">
      		<div class="box-header">
	          <h3 class="box-title">Email Notifications</h3>
	        </div>
	        {!! Form::open(['route'=>'update_admin_email','method'=>'POST','data-parsley-validate'=>'']) !!}
	        <div class="box-body">
	        	<div class="form-group">
              <label>Administrator Email:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-envelope"></i>
                </div>
                <input type="email" name="new_admin_email" required="true" value="{{ $contact->email }}" class="form-control">
              </div>
            </div>
            <button type="submit" class="btn btn-info center-block">Update</button>
	        </div>
	        {!! Form::close() !!}
      	</div>
        <div class="box-footer">

        </div>
      </div>
    </div>
    
  </div>
</section>
@endsection
						