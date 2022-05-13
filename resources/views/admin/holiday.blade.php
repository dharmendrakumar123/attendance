@extends('layouts.admin')
@section('content')
		@if(session()->has('addholiday'))
			<div class="alert alert-success">
				{{session()->get('addholiday')}}
			</div>
		@endif
		@if(session()->has('deleteholiday'))
			<div class="alert alert-success">
			{{session()->get('deleteholiday')}}
			</div>
		@endif	
		@if(session()->has('updateholiday'))
			<div class="alert alert-success">
			{{session()->get('updateholiday')}}
			</div>
		@endif	
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Holidays 2019</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Holidays</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_holiday"><i class="fa fa-plus"></i> Add Holiday</a>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0">
						<thead>
							<tr class="text-center">
								<th>#</th>
								<th>Title </th>
								<th>Holiday Date</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@php($i=1)
							@foreach($getallholiday as $getallholidays)
							<tr class="text-center">
								<td>{{$i}}</td>
								<td>{{$getallholidays->name}}</td>
								<td>{{$getallholidays->date}}</td>
								<td>
									<div class="dropdown dropdown-action">
										<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
										<div class="dropdown-menu dropdown-menu-right">
											<button class="dropdown-item editholiday" value="{{$getallholidays->id}}"><i class="fa fa-pencil m-r-5"></i> Edit</button>
											<a class="dropdown-item" href="{{route('deleteholiday',$getallholidays->id)}}" onclick="return confirm('Are you sure you want to delete this ?')"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
										</div>
									</div>
								</td>
							</tr>
							@php($i++)
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>

	<div class="modal custom-modal fade" id="add_holiday" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Holiday</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" id="addholiday" action="{{route('addholiday')}}">
						@csrf
						<div class="form-group">
							<label>Holiday Name <span class="text-danger">*</span></label>
							<input class="form-control" type="text" name="name" id="name" required>
							<span class="text-danger">{{$errors->first('name')}}</span>
						</div>
						<div class="form-group">
							<label>Holiday Date <span class="text-danger">*</span></label>
							<input class="form-control" type="date" name="date" id="date" required>
							<span class="text-danger">{{$errors->first('date')}}</span>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn" id="multiplebtn">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<div class="modal custom-modal fade" id="edit_holiday" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Holiday</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" id="updateholiday" action="{{route('updateholiday')}}">
						@csrf
						<input type="hidden" name="id" id="id">
						<div class="form-group">
							<label>Holiday Name <span class="text-danger">*</span></label>
							<input class="form-control" type="text" name="update_name" id="update_name">
							<span class="text-danger">{{$errors->first('name')}}</span>
						</div>
						<div class="form-group">
							<label>Holiday Date <span class="text-danger">*</span></label>
							<input class="form-control" type="date" name="update_date" id="update_date">
							<span class="text-danger">{{$errors->first('date')}}</span>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
      
@endsection