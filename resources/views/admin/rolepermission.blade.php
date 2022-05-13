@extends('layouts.admin')
@section('content')
	
	@if(session()->has('addroles'))
			<div class="alert alert-success">
				{{session()->get('addroles')}}
			</div>
	@endif	
	@if(session()->has('updaterole'))
			<div class="alert alert-success">
				{{session()->get('updaterole')}}
			</div>
	@endif	
	<section id="deletasset"></section>
	
	<div class="content container-fluid">
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<!--<h3 class="page-title">Roles &amp; Permissions</h3>-->
					<h3 class="page-title">Roles </h3>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-4 col-md-4 col-lg-4 col-xl-3">
				<a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#add_role"><i class="fa fa-plus"></i> Add Roles</a>
				<div class="roles-menu">
					<ul class="showallrole">
						@foreach($getallroles as $allroles)
						<li>
							<a href="javascript:void(0);">{{$allroles->name}}
								<span class="role-action">
									<button type="button" class="action-circle large editroles" value="{{$allroles->id}}">
										<i class="fa fa-pencil"></i>
									</button>
									<button type="button" class="action-circle large delete-btn deleteroles" value="{{$allroles->id}}" onclick="return confirm('Are you sure you want to permanently delete that role?')">
										<i class="fa fa-trash-o"></i>
									</button>
								</span>
							</a>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
			<!--<div class="col-sm-8 col-md-8 col-lg-8 col-xl-9">
				<h6 class="card-title m-b-20">Module Access</h6>
				<div class="table-responsive">
					<table class="table table-striped custom-table">
						<thead>
							<tr>
								<th>Module Permission</th>
								<th class="text-center">Read</th>
								<th class="text-center">Write</th>
								<th class="text-center">Create</th>
								<th class="text-center">Delete</th>		
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Employee</td>
								<td class="text-center">
									<input type="checkbox" checked="">
								</td>
								<td class="text-center">
									<input type="checkbox" checked="">
								</td>
								<td class="text-center">
									<input type="checkbox" checked="">
								</td>
								<td class="text-center">
									<input type="checkbox" checked="">
								</td>
								
							</tr>
							<tr>
								<td>Holidays</td>
								<td class="text-center">
									<input type="checkbox" checked="">
								</td>
								<td class="text-center">
									<input type="checkbox" checked="">
								</td>
								<td class="text-center">
									<input type="checkbox" checked="">
								</td>
								<td class="text-center">
									<input type="checkbox" checked="">
								</td>		
							</tr>
							<tr>
								<td>Leaves</td>
								<td class="text-center">
									<input type="checkbox" checked="">
								</td>
								<td class="text-center">
									<input type="checkbox" checked="">
								</td>
								<td class="text-center">
									<input type="checkbox" checked="">
								</td>
								<td class="text-center">
									<input type="checkbox" checked="">
								</td>
							</tr>
							<tr>
								<td>Events</td>
								<td class="text-center">
									<input type="checkbox" checked="">
								</td>
								<td class="text-center">
									<input type="checkbox" checked="">
								</td>
								<td class="text-center">
									<input type="checkbox" checked="">
								</td>
								<td class="text-center">
									<input type="checkbox" checked="">
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>-->
		</div>
	</div>


	<div id="add_role" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Role</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="addroles" method="post" action="{{route('addroles')}}">
						@csrf
						<div class="form-group">
							<label>Role Name <span class="text-danger">*</span></label>
							<input class="form-control" type="text" name="name" id="name">
							<span class="text-danger">{{$errors->first('name')}}</span>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div id="edit_role" class="modal custom-modal fade" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content modal-md">
				<div class="modal-header">
					<h5 class="modal-title">Edit Role</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="editrole" method="post" action="{{route('updaterole')}}">
						@csrf
						<input type="hidden" name="editrole_id" id="editrole_id">
						<div class="form-group">
							<label>Role Name <span class="text-danger">*</span></label>
							<input class="form-control" type="text" name="edit_role_name" id="edit_role_name" required>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<div class="modal custom-modal fade" id="delete_role" aria-hidden="true" style="display: none;">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-body">
					<div class="form-header">
						<h3>Delete Role</h3>
						<p>Are you sure want to delete?</p>
					</div>
					<div class="modal-btn delete-action">
						<div class="row">
							<div class="col-6">
								<a href="javascript:void(0);" class="btn btn-primary continue-btn">Delete</a>
							</div>
							<div class="col-6">
								<a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">Cancel</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
       
@endsection