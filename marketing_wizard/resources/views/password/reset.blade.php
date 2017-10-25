@extends('layouts.auth')

@section('title', 'Reset Password')

@section('content')

    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEADER-->

            <!-- BEGIN PAGE TITLE-->
            <h3 class="page-title"> Change your Password
                <small></small>
            </h3>
            <!-- END PAGE TITLE-->

            <hr>


            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">

                        <div class="portlet-body form">


                            <div class="panel-heading">Reset Password</div>
                            <div class="panel-body">

                                @if(Session::has('success'))
                                    <div class="alert alert-success" role="alert">
                                        <strong>Message : </strong>{!! Session::get('success') !!}
                                    </div>
                                @endif
                                @if(count($errors) > 0)
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Error: </strong>
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{!! $error !!}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                {!! Form::open() !!}

                                {!! Form::label('current_password', 'Current Password:') !!}
                                {!! Form::password('current_password',['class'=>'form-control']) !!}

                                {!! Form::label('password', 'New Password:') !!}
                                {!! Form::password('password',['class'=>'form-control']) !!}

                                {!! Form::label('password_confirmation', 'Confirm New Password:') !!}
                                {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}

                                {!! Form::submit('Reset password', ['class'=>'btn btn-primary btn-lg margin-top-20']) !!}

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div><!---ROW-->

        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->

@endsection