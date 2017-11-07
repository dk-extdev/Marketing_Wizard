@extends('admin.layouts.home')

@section('title', 'Edit Customer')

@section('content')

<section class="content-header">
  <h1>
    Edit Customer
  </h1>
  <ol class="breadcrumb">
    <li class="treeview menu-open"><a href="{{ route('admin_dashboard') }}"><i class="fa fa-home"></i> Home</a></li>
    <li><a href="#"><i class="fa fa-user"></i> Customer</a></li>
    <li class="active">Edit Customer</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-md-12">
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
      {{ Form::open(array('method'=>'POST','route' => array('admin_update_customer', $userdata->id))) }}
      <div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Edit Customer '{{$userdata->name}}'</h3>
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label>Name:</label>

              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-user"></i>
                </div>
                <input type="text" name="new_customer_name" required="true" class="form-control" value="{{ $userdata->name }}">
              </div>
              <!-- /.input group -->
            </div>
            <div class="form-group">
              <label>Email:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-envelope"></i>
                </div>
                <input type="email" name="new_customer_email" required="true" class="form-control" value="{{ $userdata->email }}">
              </div>
              <!-- /.input group -->
            </div>
            <div class="form-group">
              <label>Password:</label>
              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-lock"></i>
                </div>
                <input type="text" id="new_customer_password" name="new_customer_password" class="form-control">
                <span class="input-group-btn">
                  <button type="button" id="btn_generate" class="btn btn-info btn-flat">Regenerate</button>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Account Type:</label>
              <select name="new_customer_type" class="form-control">
                <option>Basic</option>
                <option>Standard</option>
              </select>
            </div>
            <div class="form-group">
              <label>Phone (optional):</label>

              <div class="input-group">
                <div class="input-group-addon">
                  <i class="fa fa-phone"></i>
                </div>
                <input type="text" name="new_customer_phone" value="{{ $userdata->phone }}" class="form-control">
              </div>
              <!-- /.input group -->
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" <?php if($userdata->status==1){echo "checked";}?>  name="new_customer_active">
                  Active (if unchecked, customer can not login.)
                </label>
              </div>
            </div>
            <div class="form-group">
              <div class="checkbox">
                <label>
                  <input type="checkbox" checked disabled="disabled" name="new_customer_confirm">
                  Send by email with password.
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-info pull-right">Update Customer</button>
        </div>
      </div>
      {!! Form::close() !!}
    </div>
    
  </div>
</section>
@endsection