@extends('employeelayouts.admin')
@section('content')	
	@if(session()->has('addupdate'))
		<div class="alert alert-success">
			{{session()->get('addupdate')}}
		</div>
	@endif
	<div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Latest Update</li>
				</ul>
			</div>
			@role('hr')
				<div class="col-auto float-right ml-auto">
					<div class="col-auto float-right ml-auto">
						<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_holiday"><i class="fa fa-plus"></i> Add update</a>
					</div>
				</div>
			@endrole
			@role('manager')
				<div class="col-auto float-right ml-auto">
					<div class="col-auto float-right ml-auto">
						<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_holiday"><i class="fa fa-plus"></i> Add update</a>
					</div>
				</div>
			@endrole
			
		</div>
	</div>
	<div class="container">		
		<div class="card">
			<div class="card-body">
				@foreach($getlatestupdate as $getlatestupdates)
					<p>{{$getlatestupdates->message}}</p>
				@endforeach
			</div>
		</div>
	</div>
	
	<div class="modal custom-modal fade" id="add_holiday" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add updates</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" id="addlatestupdate" action="{{route('addlatestupdate')}}">
						@csrf
						<div class="form-group">
							<label>Message <span class="text-danger">*</span></label>
							<textarea id="message" name="message" rows="4" cols="50" class="form-control" required>
							</textarea>
							<span class="text-danger">{{$errors->first('message')}}</span>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn" id="multiplebtn">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
@endsection