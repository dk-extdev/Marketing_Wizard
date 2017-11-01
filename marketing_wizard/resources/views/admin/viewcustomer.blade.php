@extends('admin.layouts.home')

@section('title', 'CreateCustomer')

@section('content')

<section class="content-header">
	<h1>
		View Customer
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-home"></i> Home</a></li>
		<li><a href="#"><i class="fa fa-user"></i> Customer</a></li>
		<li class="active">View Customer</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box box-success">
				<div class="box-header">
					<h3 class="box-title">View Customer</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<table id="customerTable" class="table table-bordered table-striped">
						<thead>
						<tr>
							<th>ID</th>
							<th>Account Type</th>
							<th>Name</th>
							<th>Email</th>
							<th>Data Created</th>
							<th>Completed</th>
							<th>Pending</th>
							<th>Active</th>
							<th>Actions</th>
						</tr>
						</thead>
						<tbody>
							@foreach($customersdata as $customer) 
							<tr data-id="{{ $customer->id }}">
									<td>{{ $customer->id }}</td>
									<td>{{ $customer->type }}</td>
									<td>{{ $customer->name }}</td>
									<td>{{ $customer->email }}</td>
									<td>{{ $customer->created_at }}</td>
									<td><a href="#" class="video_modal" customerid="{{ $customer->id }}" customername="{{ $customer->name }}" data-videos="{{ isset($videosdata[$customer->id]) ? $videosdata[$customer->id] : '' }}">{{ $customer->completed_video_num }}  Vidoes</a></td>
									<td>{{ $customer->rendering_video_num }}  Vidoes</td>
									<td>{{ $customer->status }}</td>
									<td><a href="{{ route('admin_edit_customer', [$customer->id]) }}" class="view-video-hyper"><span class="fa fa-edit"></span></a><a href="#" id="hypercustomerid{{ $customer->id }}" customerid="{{ $customer->id }}" customertype="{{ $customer->type }}" class="transaction_modal view-video-hyper"><span class="fa fa-dollar"></span></a><a href="#" data-id="{{ $customer->id }}" class="delete-customer-id view-video-hyper"><span class="fa fa-trash"></span></a></td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
						<tr>
							<th>ID</th>
							<th>Account Type</th>
							<th>Name</th>
							<th>Email</th>
							<th>Data Created</th>
							<th>Completed</th>
							<th>Pending</th>
							<th>Active</th>
							<th>Actions</th>
						</tr>
						</tfoot>
					</table>
					<div class="box-footer">
	          <a href="{{ route('admin_create_customer') }}" type="button" class="btn btn-success">Create Customer</a>
	        </div>
				</div>
				<div id="videoModal" class="modal fade">
					<div class="modal-dialog" style="top:25%">
						<div class="modal-content">
							<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Customer Videos</h4>
							</div>
							<div class="modal-body">
							</div>
						</div>
					</div>
				</div>
				<div id="transactionModal" class="modal fade">
					<div class="modal-dialog" style="top:25%">
						<div class="modal-content">
							<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
									<h4 class="modal-title">Customer Videos</h4>
							</div>
							<div class="modal-body">
								<div class="row">
									<div class="col-md-6">
				            <div class="form-group">
				              <label>Transactions:</label>
				              <p>2017-08-03 12:23PM</p>
				              <p>Transaction ID: 2848939032</p>
				              <p>Payment Processor: PayPal</p>
				              <p>Amount: $99.99</p>
				              <p>Product ID: dynamic-video-premium</p>
				            </div>
				          </div>
				          <div class="col-md-6">
				            <div class="form-group">
				              <label>Change Account Type:</label>
				              <select name="account_type" id="account_type" class="form-control">
				                <option value='Basic'>Basic</option>
				                <option value='Standard'>Standard</option>
				              </select>
				            </div>
				            <input type="hidden" id="accountid"/>
				            <button type="button" id="update_type" class="btn btn-info pull-right">Update</button>
				            <span class="update-type-success">Successfully Updated!</span>
				          </div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
