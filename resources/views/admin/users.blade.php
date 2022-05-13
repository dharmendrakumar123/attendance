@extends('layouts.admin')
@section('content')
		@if(session()->has('adduser'))
			<div class="alert alert-success">
				{{ session()->get('adduser') }}
			</div>
		@endif
		@if(session()->has('userdelete'))
			<div class="alert alert-success">
				{{ session()->get('userdelete')}}
			</div>
		@endif
		
		@if(session()->has('updateuser'))
			<div class="alert alert-success">
				{{ session()->get('updateuser')}}
			</div>
		@endif
	
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Users</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Users</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_user"><i class="fa fa-plus"></i> Add User</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
						<div class="row">
							<div class="col-sm-12">
								<div id="users_wrapper" class="dataTables_wrapper no-footer">
												
								<table class="table table-striped" id="users" role="grid" aria-describedby="users_info">
									<thead>
										<tr role="row"><th class="sorting sorting_asc" tabindex="0" aria-controls="users" rowspan="1" colspan="1" aria-label="Name: activate to sort column descending" style="width: 213.391px;" aria-sort="ascending">Name</th><th class="sorting" tabindex="0" aria-controls="users" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 276.172px;">Email</th><th class="sorting" tabindex="0" aria-controls="users" rowspan="1" colspan="1" aria-label="Company: activate to sort column ascending" style="width: 242.516px;">Company</th><th class="sorting" tabindex="0" aria-controls="users" rowspan="1" colspan="1" aria-label="Created Date: activate to sort column ascending" style="width: 159.531px;">Created Date</th><th class="sorting" tabindex="0" aria-controls="users" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 72.1562px;">Role</th><th class="text-right sorting" tabindex="0" aria-controls="users" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 87.1094px;">Action</th></tr>
									</thead>
									<tbody>							
									
										@foreach($showuser as $showusers)
										<tr class="odd">
											<td class="sorting_1">
												<h2 class="table-avatar">
													<a class="avatar"><img src="images/{{$showusers->profile_pic}}" alt=""></a>
													<a href="{{route('admin_side_chat',$showusers->uid)}}">{{$showusers->name}} {{$showusers->last_name}}</a>
												</h2>
											</td>
											<td>{{$showusers->email}}</td>
											<td>{{$showusers->company}}</td>
											<td>{{date_format($showusers->created_at,'d M Y')}}</td>
											<td>
												@foreach($showusers->roles as $role)
													@if($role->name=="Superadmin")
														<span class="badge bg-inverse-danger">Admin</span>
													@elseif($role->name=="Employee")
														<span class="badge bg-inverse-success">Employee</span>
													@else
														<span class="badge bg-inverse-info">Client</span>
													@endif
												@endforeach
											</td>
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<div class="dropdown-menu dropdown-menu-right">
														<!--<button type="button" class="dropdown-item edituser" value="{{$showusers->id}}" placeholder="{{$showusers->uid}}"><i class="fa fa-pencil m-r-5"></i> Edit</button>-->
														<a class="dropdown-item" href="{{route('edituser',[$showusers->id,$showusers->uid])}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>
														<!--<a class="dropdown-item" href="{{route('edituser',$showusers->id)}}"><i class="fa fa-pencil m-r-5"></i> Edit</a>-->
														<a class="dropdown-item" href="{{route('userdelete',$showusers->id)}}" onclick="return confirm('Are you sure you want to permanently delete that user?')"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
													</div>
												</div>
											</td>
										</tr>
										@endforeach	
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="add_user" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="{{route('adduser')}}" id="commentForm">
						@csrf
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label">First Name <span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="first_name" id="first_name" required>
									<span class="text-danger">{{$errors->first('first_name')}}</span>
									<p id="first" class="text-danger"></p>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label">Last Name</label>
									<input class="form-control" type="text" name="last_name" id="last_name" required>
									<span class="text-danger">{{$errors->first('last_name')}}</span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label">Username <span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="username" id="username" required readonly onfocus="this.removeAttribute('readonly');" />
									<span class="text-danger">{{$errors->first('username')}}</span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label">Email <span class="text-danger">*</span></label>
									<input class="form-control" type="email" name="email" id="email" required>
									<span class="text-danger">{{$errors->first('email')}}</span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label">Password</label>
									<input class="form-control" type="password" name="password" id="password" required>
									<span class="text-danger">{{$errors->first('password')}}</span>
									 <div class="form-group ">           
										  <div class="alert alert-warning mt-0 custom-password-validation" role="alert">
											  <div class="row">
												  <span class="col-6 lower-case">Lower case letter</span>
												  <span class="col-6 upper-case">Upper case letter</span>
												  <span class="col-6 number">Number</span>
												  <span class="col-6 symbols">Symbol allowed @#$%^&*()+</span>
												  <span class="col-6 min-six">Minimum 6 charachers</span>
											  </div>
										  </div>
									</div>
									
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label">Confirm Password</label>
									<input class="form-control" type="password" name="password_confirmation" id="password_confirmation" required>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label">Employee ID <span class="text-danger">*</span></label>
									<input type="text" class="form-control floating" name="uid" id="uid" required>
									<span class="text-danger">{{$errors->first('uid')}}</span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
									<input class="form-control" type="date" name="join_date" id="join_date" required>
									<span class="text-danger">{{$errors->first('join_date')}}</span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label">Phone </label>
									<input class="form-control" type="text" name="phone" id="phone" required>
									<span class="text-danger">{{$errors->first('phone')}}</span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label">Company</label>
									<select class="form-control" tabindex="-1" aria-hidden="true" name="company" id="company" required>
										<option value="">--</option>
										<option value="Global Technologies">Global Technologies</option>
										<option value="Delta Infotech">Delta Infotech</option>
									</select>
									<span class="text-danger">{{$errors->first('company')}}</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Department <span class="text-danger">*</span></label>
									<select class="form-control" tabindex="-1" aria-hidden="true" name="department" id="department" required>
										<option value="">Select Department</option>
										<option value="Web Development">Web Development</option>
										<option value="IT Management">IT Management</option>
										<option value="Marketing">Marketing</option>
									</select>
									<span class="text-danger">{{$errors->first('department')}}</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Designation <span class="text-danger">*</span></label>
									<select class="form-control" tabindex="-1" aria-hidden="true" name="designation" id="designation" required>
										<option value="">Select Designation</option>
										<option value="Web Designer">Web Designer</option>
										<option value="Web Developer">Web Developer</option>
										<option value="Android Developer">Android Developer</option>
									</select>
									<span class="text-danger">{{$errors->first('designation')}}</span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Role <span class="text-danger">*</span></label>
									<select class="form-control" tabindex="-1" aria-hidden="true" name="role" id="role" required>
										<option value="">--</option>
										@foreach($roles as $role)
											<option value="{{$role->id}}">{{$role->name}}</option>
										@endforeach
									</select>
									<span class="text-danger">{{$errors->first('role')}}</span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Gender <span class="text-danger">*</span></label>
									<select class="form-control" tabindex="-1" aria-hidden="true" name="gender" id="gender" required>
										<option value="">--</option>
										<option value="Female">Female</option>
										<option value="Male">Male</option>
									</select>
									<span class="text-danger">{{$errors->first('gender')}}</span>
								</div>
							</div>
						</div>
						<div class="table-responsive m-t-15">
							<table class="table table-striped custom-table">
								<thead>
									<tr>
										<th>Module Permission</th>
										<th class="text-center">Read</th>
										<th class="text-center">Create</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Attendance</td>
										@foreach($Permission as $Permissions)
											<td class="text-center">
												<input type="checkbox" name="attendace[]" id="attendace" value="{{$Permissions->id}}">
											</td>
										@endforeach
									</tr>
									<!--<tr>
										<td>Holidays</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
									</tr>
									<tr>
										<td>Leaves</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										
									</tr>
									<tr>
										<td>Events</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
									</tr>-->
								</tbody>
							</table>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<!--<div id="edit_user" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" id="editform" action="{{route('updateuser')}}">
						@csrf
						<input type="hidden" name="user_id" id="user_id">
						<input type="hidden" name="permission_uid" id="permission_uid">
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>First Name <span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="firstname" id="firstname">
									<span class="text-danger">{{$errors->first('firstname')}}</span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Last Name <span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="lastname" id="lastname">
									<span class="text-danger">{{$errors->first('lastname')}}</span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Username <span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="usernames" id="usernames">
									<span class="text-danger">{{$errors->first('usernames')}}</span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Email <span class="text-danger">*</span></label>
									<input class="form-control" type="email" name="user_email" id="user_email">
									<span class="text-danger">{{$errors->first('user_email')}}</span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Phone <span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="user_phone" id="user_phone">
									<span class="text-danger">{{$errors->first('user_phone')}}</span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label">Company</label>
									<select class="form-control" tabindex="-1" aria-hidden="true" name="user_company" id="user_company">
										<option value="">--</option>
										<option value="Global Technologies">Global Technologies</option>
										<option value="Delta Infotech">Delta Infotech</option>
									</select>
									<span class="text-danger">{{$errors->first('user_company')}}</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Department <span class="text-danger">*</span></label>
									<select class="form-control" tabindex="-1" aria-hidden="true" name="user_department" id="user_department">
										<option value="">Select Department</option>
										<option value="Web Development">Web Development</option>
										<option value="IT Management">IT Management</option>
										<option value="Marketing">Marketing</option>
									</select>
									<span class="text-danger">{{$errors->first('user_department')}}</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Designation <span class="text-danger">*</span></label>
									<select class="form-control" tabindex="-1" aria-hidden="true" name="user_designation" id="user_designation">
										<option value="">Select Designation</option>
										<option value="Web Designer">Web Designer</option>
										<option value="Web Developer">Web Developer</option>
										<option value="Android Developer">Android Developer</option>
									</select>
									<span class="text-danger">{{$errors->first('user_designation')}}</span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Role <span class="text-danger">*</span></label>
									<select class="form-control" tabindex="-1" aria-hidden="true" name="user_role" id="user_role">
										<option value="">--</option>
										@foreach($roles as $role)
											<option value="{{$role->id}}">{{$role->name}}</option>
										@endforeach
									</select>
									<span class="text-danger">{{$errors->first('user_role')}}</span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Gender <span class="text-danger">*</span></label>
									<select class="form-control" tabindex="-1" aria-hidden="true" name="genders" id="genders">
										<option value="">--</option>
										<option value="Female">Female</option>
										<option value="Male">Male</option>
									</select>
									<span class="text-danger">{{$errors->first('genders')}}</span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Employee ID <span class="text-danger">*</span></label>
									<input type="text" class="form-control floating" name="user_uid" id="user_uid">
									<span class="text-danger">{{$errors->first('user_uid')}}</span>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
									<input class="form-control" type="date" name="joining_date" id="joining_date">
									<span class="text-danger">{{$errors->first('joining_date')}}</span>
								</div>
							</div>
						</div>
					
						<div class="table-responsive m-t-15">
							<table class="table table-striped custom-table">
								<thead>
									<tr>
										<th>Module Permission</th>
										<th class="text-center">Read</th>
										<th class="text-center">Create</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td class="hello">Attendance</td>
										<td class="text-center">
											<input  type="checkbox" name="attendace[]" id="att_read" value="1" checked>
										</td>
										<td class="text-center">
											<input type="checkbox" name="attendace[]" id="att_read1" value="5" checked>
										</td>
										<td class="text-center">
											<input type="checkbox" name="attendace[]" id="att_read2" value="7" checked>
										</td>
										<td class="text-center">
											<input type="checkbox" name="attendace[]" id="att_read3" value="9" checked>
										</td>
										<span class="text-danger">{{$errors->first('attendace')}}</span>										
									</tr>
									<tr>
										<td>Holidays</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
									</tr>
									<tr>
										<td>Leaves</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
									</tr>
									<tr>
										<td>Events</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
										<td class="text-center">
											<input checked="" type="checkbox">
										</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>-->
	
@endsection
