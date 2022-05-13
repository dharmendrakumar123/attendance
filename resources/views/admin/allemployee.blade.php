@extends('layouts.admin')
@section('content')
		
		@if(session()->has('deleteemployee'))
			<div class="alert alert-success">
				{{ session()->get('deleteemployee')}}
			</div>
		@endif
		
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Employee</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Employee</li>
					</ul>
				</div>
				<!--<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i class="fa fa-plus"></i> Add Employee</a>
					
				</div>-->
			</div>
		</div>


		<!--<div class="row filter-row">
			<div class="col-sm-6 col-md-3">
				<div class="form-group form-focus">
					<input type="text" class="form-control floating">
					<label class="focus-label">Employee ID</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="form-group form-focus">
					<input type="text" class="form-control floating">
					<label class="focus-label">Employee Name</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<div class="form-group form-focus select-focus focused">
					<select class="form-control floating" tabindex="-1" aria-hidden="true">
						<option>Select Designation</option>
						<option>Web Developer</option>
						<option>Web Designer</option>
						<option>Android Developer</option>
						<option>Ios Developer</option>
					</select>
					<label class="focus-label">Designation</label>
				</div>
			</div>
			<div class="col-sm-6 col-md-3">
				<a href="#" class="btn btn-success btn-block"> Search </a>
			</div>
		</div>-->

		<div class="row staff-grid-row">
			@foreach($allemployee as $allemployees)
				<div class="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
					<div class="profile-widget">
						<div class="profile-img">
							<a href="{{route('allemployeeprofile',$allemployees->uid)}}" class="avatar"><img src="images/{{$allemployees->profile_pic}}" alt=""></a>
						</div>
						<div class="dropdown profile-action">
							<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="{{route('deleteemployee',$allemployees->id)}}" onclick="return confirm('Are you sure you want to delete this user ?')"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
							</div>
						</div>
						<h4 class="user-name m-t-10 mb-0 text-ellipsis"><a href="profile.html">{{$allemployees->name}} {{$allemployees->last_name}}</a></h4>
						<div class="small text-muted">{{$allemployees->designation}}</div>
					</div>
				</div>
			@endforeach
		</div>
      
@endsection