@extends('employeelayouts.admin')
@section('content')
		@if(session()->has('addedproject'))
		<div class="alert alert-success">
			{{session()->get('addedproject')}}
		</div>
	@endif
	@if(session()->has('projectdelete'))
		<div class="alert alert-success">
			{{session()->get('projectdelete')}}
		</div>
	@endif
	
	@if(session()->has('updateproject'))
		<div class="alert alert-success">
			{{session()->get('updateproject')}}
		</div>
	@endif
   <div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<h3 class="page-title">Projects</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Projects</li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_project"><i class="fa fa-plus"></i> Create Project</a>
			</div>
		</div>
	</div>


	<div class="row">
		@foreach($project as $allprojects)
		<div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
			<div class="card">
				<div class="card-body">
					<div class="dropdown dropdown-action profile-action">
						<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
						<div class="dropdown-menu dropdown-menu-right">
							<button type="button" class="dropdown-item projectedit" value="{{$allprojects->id}}"><i class="fa fa-pencil m-r-5"></i> Edit</button>
							<a class="dropdown-item" href="{{route('managerprojectdelete',$allprojects->id)}}" onclick="return confirm('Are you sure you wish to permanently delete that project?')"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
						</div>
					</div>
					<h4 class="project-title"><a href="{{route('managerprojectview',$allprojects->id)}}">{{$allprojects->project_name}}</a></h4>             
					<p class="text-muted">{{$allprojects->description}}</p>
					<div class="pro-deadline m-b-15">
						<div class="sub-title">
							Deadline:
						</div>
						<div class="text-muted">
						   {{$allprojects->deadline}}
						</div>
					</div>
					<div class="project-members m-b-15">
						<div>Project Leader :</div>
						<ul class="team-members">
							@foreach($allprojects->users as $users)
							<li>
								{{$users->name}} {{$users->last_name}}
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>

	<div id="create_project" class="modal custom-modal fade" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Create Project</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" id="addproject" action="{{route('managercreateproject')}}" enctype="multipart/form-data">
						@csrf	
					   <div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Project Name</label>
									<input class="form-control" type="text" name="project_name" id="project_name" required>
									<span class="text-danger">{{$errors->first('project_name')}}</span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Deadline</label>
									<input class="form-control" type="date" name="enddate" id="enddate">
									<span class="text-danger">{{$errors->first('enddate')}}</span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label>Add Project Leader</label>
									<select class="form-control" name="projectlead[]" id="projectlead" multiple>
										<option value="">--</option>
										@foreach($getalluser as $getallusers)
										<option value="{{$getallusers->id}}">{{$getallusers->name}} {{$getallusers->last_name}}</option>
										@endforeach
									</select>
									<span class="text-danger">{{$errors->first('projectlead')}}</span>
								</div>
							</div>                                  
						</div>
						<div class="row">
						    <div class="col-sm-12">
								<div class="form-group">
									<label>Priority</label>
									<select class="form-control" name="priority" id="priority">
										<option value="">---</option>
										<option value="High">High</option>
										<option value="Medium">Medium</option>
										<option value="Low">Low</option>
									</select>
									<span class="text-danger">{{$errors->first('priority')}}</span>
								</div>
							</div>
						</div>
						<div class="row">
						    <div class="col-sm-12">
								<div class="form-group">
									<label>Status</label>
									<select class="form-control" name="status" id="status">
										<option value="">---</option>
										<option value="Open">Open</option>
										<option value="Progress">Progress</option>
										<option value="Review">Review</option>
										<option value="completed">completed</option>
									</select>
									<span class="text-danger">{{$errors->first('status')}}</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea rows="8" class="form-control" placeholder="Enter your message here.." name="description" id="description"></textarea>
							<span class="text-danger">{{$errors->first('description')}}</span>
						</div>
						<div class="form-group">
							<label>Upload Files (optional)</label>
							<input class="form-control" type="file" name="image" id="image">							
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<div id="edit_project" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Project</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" id="editproject" action="{{route('managerupdateproject')}}" enctype = "multipart/form-data">
						@csrf	
					   <input type="hidden" name="project_id" id="project_id">
					   <div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Project Name</label>
									<input class="form-control" type="text" name="edit_project_name" id="edit_project_name">
									<span class="text-danger">{{$errors->first('edit_project_name')}}</span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Deadline</label>
									<input class="form-control" type="date" name="edit_enddate" id="edit_enddate">
									<span class="text-danger">{{$errors->first('edit_enddate')}}</span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<label>Add Project Leader</label>
									<select class="form-control" name="edit_projectlead[]" id="edit_projectlead" multiple>
										<option value="">--</option>
										@foreach($getalluser as $getallusers)
											<option value="{{$getallusers->id}}">{{$getallusers->name}} {{$getallusers->last_name}}</option>
										@endforeach
									</select>
									<span class="text-danger">{{$errors->first('edit_projectlead')}}</span>
								</div>
							</div>                                  
						</div>
						<div class="row">
						    <div class="col-sm-12">
								<div class="form-group">
									<label>Priority</label>
									<select class="form-control" name="edit_priority" id="edit_priority">
										<option value="">---</option>
										<option value="High">High</option>
										<option value="Medium">Medium</option>
										<option value="Low">Low</option>
									</select>
									<span class="text-danger">{{$errors->first('edit_priority')}}</span>
								</div>
							</div>
						</div>
						<div class="row">
						    <div class="col-sm-12">
								<div class="form-group">
									<label>Status</label>
									<select class="form-control" name="edit_status" id="edit_status">
										<option value="">---</option>
										<option value="Open">Open</option>
										<option value="Progress">Progress</option>
										<option value="Review">Review</option>
										<option value="completed">completed</option>
									</select>
									<span class="text-danger">{{$errors->first('status')}}</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Description</label>
							<textarea rows="4" class="form-control" placeholder="Enter your message here" name="edit_description" id="edit_description"></textarea>
							<span class="text-danger">{{$errors->first('description')}}</span>
						</div>
						<div class="form-group">
							<label>Upload Files (optional)</label>
							<input class="form-control" type="file" name="edit_image" id="edit_image">
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