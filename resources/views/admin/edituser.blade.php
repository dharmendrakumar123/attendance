@extends('layouts.admin')
@section('content')	
	
	<div class="container">	
		<div class="card p-5">	
			<h2 class="edit_user text-center mb-5">Edit User</h2>
			<form method="post" id="editform" action="{{route('updateuser')}}">
				@csrf
				<input type="hidden" name="user_id" id="user_id" value="{{$edituser->id}}">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>First Name <span class="text-danger">*</span></label>
							<input class="form-control" type="text" name="firstname" id="firstname" value="{{$edituser->name}}">
							<span class="text-danger">{{$errors->first('firstname')}}</span>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Last Name <span class="text-danger">*</span></label>
							<input class="form-control" type="text" name="lastname" id="lastname" value="{{$edituser->last_name}}">
							<span class="text-danger">{{$errors->first('lastname')}}</span>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Username <span class="text-danger">*</span></label>
							<input class="form-control" type="text" name="usernames" id="usernames" value="{{$edituser->username}}">
							<span class="text-danger">{{$errors->first('usernames')}}</span>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Email <span class="text-danger">*</span></label>
							<input class="form-control" type="email" name="user_email" id="user_email" value="{{$edituser->email}}">
							<span class="text-danger">{{$errors->first('user_email')}}</span>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Phone <span class="text-danger">*</span></label>
							<input class="form-control" type="text" name="user_phone" id="user_phone" value="{{$edituser->phone}}">
							<span class="text-danger">{{$errors->first('user_phone')}}</span>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="col-form-label">Company</label>
							<select class="form-control" tabindex="-1" aria-hidden="true" name="user_company" id="user_company">
								<option value="{{$edituser->company}}">{{$edituser->company}}</option>
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
								<option value="{{$edituser->department}}">{{$edituser->department}}</option>
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
								<option value="{{$edituser->designation}}">{{$edituser->designation}}</option>
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
								@foreach($edituser->roles as $role)
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
								<option value="{{$edituser->gender}}">{{$edituser->gender}}</option>
								<option value="Female">Female</option>
								<option value="Male">Male</option>
							</select>
							<span class="text-danger">{{$errors->first('genders')}}</span>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Employee ID <span class="text-danger">*</span></label>
							<input type="text" class="form-control floating" name="user_uid" id="user_uid" value="{{$edituser->uid}}">
							<span class="text-danger">{{$errors->first('user_uid')}}</span>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="col-form-label">Joining Date <span class="text-danger">*</span></label>
							<input class="form-control" type="date" name="joining_date" id="joining_date" value="{{$edituser->joining_date}}">
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
								@foreach($permission as $permissions)
									<td class="text-center">
										{{ Form::checkbox('attendac_permission[]',$permissions->id, in_array($permissions->id, $userPermission) ? true : false, array('class' => 'attendace'))}}
									</td>
								@endforeach		
								<span class="text-danger">{{$errors->first('attendace')}}</span>										
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
@endsection
	