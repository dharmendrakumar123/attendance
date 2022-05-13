@extends('employeelayouts.admin')
@section('content')
		
		@if(session()->has('message'))
			<div class="alert alert-success">
				{{ session()->get('message') }}
			</div>
		@endif
		@if(session()->has('delete_leave'))
			<div class="alert alert-success">
				{{ session()->get('delete_leave') }}
			</div>
		@endif
		@if(session()->has('update'))
			<div class="alert alert-success">
				{{ session()->get('update') }}
			</div>
		@endif
		@if(session()->has('approvedstatus'))
			<div class="alert alert-success">
				{{session()->get('approvedstatus')}}
			</div>
		@endif
		@if(session()->has('declinedstatus'))
			<div class="alert alert-success">
				{{session()->get('declinedstatus')}}
			</div>
		@endif
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Leaves</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
						<li class="breadcrumb-item active">Leaves</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_leave"><i class="fa fa-plus"></i> Add Leave</a>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="stats-info">
					<h6>Annual Leave</h6>
					<h4>12</h4>
				</div>
			</div>
			<div class="col-md-3">
				<div class="stats-info">
					<h6>Medical Leave</h6>
					<h4>3</h4>
				</div>
			</div>
			<div class="col-md-3">
				<div class="stats-info">
					<h6>Other Leave</h6>
					<h4>4</h4>
				</div>
			</div>
			<div class="col-md-3">
				<div class="stats-info">
					<h6>Remaining Leave</h6>
					<h4>5</h4>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
						<div class="row">
							<div class="col-sm-12">
								<div id="leavesEmployee_wrapper" class="dataTables_wrapper no-footer">
									<table class="table table-striped" id="Employee_leaves" role="grid" aria-describedby="leavesEmployee_info">
									<thead>
										<tr role="row">
											@role('hr')
											<th class="sorting sorting_asc" tabindex="0" aria-controls="leavesEmployee" rowspan="1" colspan="1" aria-label="Leave Type: activate to sort column descending" style="width: 135.922px;" aria-sort="ascending">Employee</th>
											@endrole
											<th class="sorting sorting_asc" tabindex="0" aria-controls="leavesEmployee" rowspan="1" colspan="1" aria-label="Leave Type: activate to sort column descending" style="width: 135.922px;" aria-sort="ascending">Leave Type</th>
											<!--<th class="sorting" tabindex="0" aria-controls="leavesEmployee" rowspan="1" colspan="1" aria-label="To: activate to sort column ascending" style="width: 96.5px;">Time</th>-->
											<th class="sorting" tabindex="0" aria-controls="leavesEmployee" rowspan="1" colspan="1" aria-label="From: activate to sort column ascending" style="width: 96.5px;">From</th>
											<th class="sorting" tabindex="0" aria-controls="leavesEmployee" rowspan="1" colspan="1" aria-label="To: activate to sort column ascending" style="width: 96.5px;">To</th>
											<th class="sorting" tabindex="0" aria-controls="leavesEmployee" rowspan="1" colspan="1" aria-label="No of Days: activate to sort column ascending" style="width: 127.141px;">No of Days</th>
											@role('hr')
											<th class="sorting" tabindex="0" aria-controls="leavesEmployee" rowspan="1" colspan="1" aria-label="Reason: activate to sort column ascending" style="width: 151.047px;">Reason</th>
											@endrole
											<th class="text-center sorting" tabindex="0" aria-controls="leavesEmployee" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 120.047px;">Status</th>
											<th class="sorting" tabindex="0" aria-controls="leavesEmployee" rowspan="1" colspan="1" aria-label="Approved by: activate to sort column ascending" style="width: 158.125px;">Approved by</th>
											<th class="text-right sorting" tabindex="0" aria-controls="leavesEmployee" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 92.7188px;">Actions</th>
										</tr>
									</thead>
									<tbody>                                    
										@foreach($show_all_leave as $show_all_leaves)
										<tr class="odd">
											@role('hr')<td></td>@endrole
											<td class="sorting_1" style="text-align: center;">{{$show_all_leaves->leave_type}}</td>
											<!--<td class="sorting_1">{{$show_all_leaves->time}}</td>-->
											<td>{{$show_all_leaves->from}}</td>
											<td>{{$show_all_leaves->to}}</td>
											<td style="text-align: center;">{{$show_all_leaves->number_days}}</td>
											@role('hr')<td></td>@endrole
											<td class="text-center">
												<div class="action-label">
													<a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
														@if($show_all_leaves->status=="New")
															<i class="fa fa-dot-circle-o text-purple"></i> {{$show_all_leaves->status}}
														@elseif($show_all_leaves->status=="Declined")
															<i class="fa fa-dot-circle-o text-danger"></i> {{$show_all_leaves->status}}
														@else	
															<i class="fa fa-dot-circle-o text-success"></i> {{$show_all_leaves->status}}
														@endif
													</a>
												</div>
											</td>
											<td style="text-align: center;">
												{{$show_all_leaves->approved_by}}
											</td>
											@if($show_all_leaves->status=="New")
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<div class="dropdown-menu dropdown-menu-right">
													   <button type="button" class="dropdown-item leaveedit" value="{{$show_all_leaves->id}}"><i class="fa fa-pencil m-r-5"></i> Edit</button>														
														<a class="dropdown-item" href="{{route('leave_request_destroy',$show_all_leaves->id)}}" onclick="return confirm('Are you sure you want to permanently delete that leave?')">
															<i class="fa fa-trash-o m-r-5"></i> Delete
														</a>
														
													</div>
												</div>
											</td>
											@else
											<td class="text-right">
												<div class="dropdown dropdown-action">
													<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
													<div class="dropdown-menu dropdown-menu-right">
													   <button type="button" class="dropdown-item viewleave" value="{{$show_all_leaves->id}}"><i class="fa fa-eye" aria-hidden="true"></i> View</button>																								
													</div>
												</div>
											</td>
											@endif	
										</tr>
										@endforeach
										@role('hr')
											@foreach($hr_show_all_leave as $hr_show_all_leaves)   
												<tr class="odd text-center">
														<td class="sorting_1">
															<h2 class="table-avatar">
																<a href="#" class="avatar"><img alt="" src="images/{{$hr_show_all_leaves->profile_pic}}"></a>
																<a> {{$hr_show_all_leaves->name}} {{$hr_show_all_leaves->last_name}} <span>Web Designer</span></a>
															</h2>
														</td>
														<td>{{$hr_show_all_leaves->leave_type}}</td>
														<td>{{$hr_show_all_leaves->from}}</td>
														<td>{{$hr_show_all_leaves->to}}</td>
														<td>{{$hr_show_all_leaves->number_days}}</td>
														<td><button class="dropdown-item showreason" type="button" value="{{$hr_show_all_leaves->id}}">{{Str::limit($hr_show_all_leaves->leave_reason, 5)}}</button></td>
														<td class="text-center">
															<div class="dropdown action-label">
																<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
																	@if($hr_show_all_leaves->status=="Approved")
																		<i class="fa fa-dot-circle-o text-success"></i> {{$hr_show_all_leaves->status}}
																	@elseif($hr_show_all_leaves->status=="Declined")
																		<i class="fa fa-dot-circle-o text-danger"></i> {{$hr_show_all_leaves->status}}
																	@else	
																		<i class="fa fa-dot-circle-o text-purple"></i> {{$hr_show_all_leaves->status}}
																	@endif
																</a>
																<div class="dropdown-menu dropdown-menu-right">
																	<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> New</a>
																	<a class="dropdown-item" href="{{route('hrapproved',$hr_show_all_leaves->id)}}"><i class="fa fa-dot-circle-o text-success"></i> Approved</a>
																	<a class="dropdown-item" href="{{route('hrdeclined',$hr_show_all_leaves->id)}}"><i class="fa fa-dot-circle-o text-danger"></i> Declined</a>
																</div>
															</div>
														</td>
														<td class="">
															{{$hr_show_all_leaves->approved_by}}
														</td>
													</tr>
												@endforeach
										@endrole
										</tbody>
									</table>
									
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
				
				
		<!--Applye leave popup form-->
		
		<div id="add_leave" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Leave</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="post" id="addleave" action="{{route('employe_leave_request_send')}}">
							@csrf	
						   <div class="form-group">
								<label>Leave Type <span class="text-danger">*</span></label>
								<select name="leave_type" id="leave_type" class="form-control" tabindex="-1" aria-hidden="true" required>
									<option value="">Select Leave Type</option>
									<option value="Full day">Full Day</option>
									<option value="Half day">Half Day</option>
									<option value="Short day">Short Day</option>
								</select>
								<span style="color:red;">{{$errors->first('leave_type')}}</span>
							</div>
							<div class="form-group full-Time">
								<label for="name">Select Time</label>
								<select name="time" id="time" class="form-control">	
									<option value="">Select Time</option>
									<option value="First Half">First Half</option>
									<option value="Second Half">Second Half</option>
								</select>	
							</div>
							<div class="form-group short-time">
								<label for="name">Time</label>
								<select name="leavetime" id="leavetime" class="form-control">	
									<option value="">Select Time</option>
									<option value="First Half">First Half</option>
									<option value="Second Half">Second Half</option>
									<option value="Third Half">Third Half</option>
									<option value="Fourth Half">Fourth Half</option>
								</select>	
							</div>
							
							<div class="form-group">
								<label>From <span class="text-danger">*</span></label>
								<input class="form-control" type="date" name="from" id="from">
								<span style="color:red;">{{$errors->first('from')}}</span>
							</div>
							<div class="form-group">
								<label>To <span class="text-danger">*</span></label>
								<input class="form-control" type="date" name="to" id="to">
								<span style="color:red;">{{$errors->first('to')}}</span>
							</div>
							
							<div class="form-group">
								<label>Number of days <span class="text-danger">*</span></label>
								<input class="form-control" readonly="" type="text" name="number_days" id="number_days" value="" />
							</div>
							<div class="form-group">
								<label>Remaining Leaves <span class="text-danger">*</span></label>
								<input type="hidden" name="total_leave" id="total_leave" value="@if(!empty($get_total_leave)){{$get_total_leave->total_leave}}@else 0 @endif">
								<input class="form-control" readonly="" type="text" name="leave_remaining" id="leave_remaining">
								<span style="color:red;">{{$errors->first('leave_remaining')}}</span>
							</div>
							<div class="form-group">
								<label>Leave Reason <span class="text-danger">*</span></label>
								<textarea rows="4" class="form-control" name="leave_reason" id="leave_reason"></textarea>
								<span style="color:red;">{{$errors->first('leave_reason')}}</span>
							</div>
							<div class="submit-section">
								<input type="submit" value="Submit" class="btn btn-primary">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!--Edit leave popup form-->
		
		
		<div id="employee_leave" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Add Leave</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="post" id="updateleave" action="{{route('update_employee_leave')}}">
							@csrf	
						   
						   <input type="hidden" name="leave_id" id="leave_id">
						   <div class="form-group">
								<label>Leave Type <span class="text-danger">*</span></label>
								<select name="update_leave_type" id="update_leave_type" class="form-control" tabindex="-1" aria-hidden="true" required>
									<option value="">Select Leave Type</option>
									<option value="Full day">Full Day</option>
									<option value="Half day">Half Day</option>
									<option value="Short day">Short Day</option>
								</select>
								<span style="color:red;">{{$errors->first('update_leave_type')}}</span>
							</div>
							<div class="form-group full-Time">
								<label for="name">Select Time</label>
								<select name="time" id="time" class="form-control">	
									<option value="">Select Time</option>
									<option value="First Half">First Half</option>
									<option value="Second Half">Second Half</option>
								</select>	
							</div>
							<div class="form-group short-time">
								<label for="name">Time</label>
								<select name="leavetime" id="leavetime" class="form-control">	
									<option value="">Select Time</option>
									<option value="First Half">First Half</option>
									<option value="Second Half">Second Half</option>
									<option value="Third Half">Third Half</option>
									<option value="Fourth Half">Fourth Half</option>
								</select>	
							</div>
							
							<div class="form-group">
								<label>From <span class="text-danger">*</span></label>
								<input class="form-control" type="date" name="update_from" id="update_from" required>
								<span style="color:red;">{{$errors->first('update_from')}}</span>
							</div>
							<div class="form-group">
								<label>To <span class="text-danger">*</span></label>
								<input class="form-control" type="date" name="update_to" id="update_to" required>
								<span style="color:red;">{{$errors->first('update_to')}}</span>
							</div>
							
							<div class="form-group">
								<label>Number of days <span class="text-danger">*</span></label>
								<input class="form-control" readonly="" type="text" name="update_number_days" id="update_number_days" value="" />
							</div>
							<div class="form-group">
								<label>Remaining Leaves <span class="text-danger">*</span></label>
								<input class="form-control" readonly="" value="12" type="text" name="update_leave_remaining" id="update_leave_remaining">
								<span style="color:red;">{{$errors->first('leave_remaining')}}</span>
							</div>
							<div class="form-group">
								<label>Leave Reason <span class="text-danger">*</span></label>
								<textarea rows="4" class="form-control" name="update_leave_reason" id="update_leave_reason" required></textarea>
								<span style="color:red;">{{$errors->first('leave_reason')}}</span>
							</div>
							<div class="submit-section">
								<input type="submit" value="Submit" class="btn btn-primary">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
		
		<div id="view_leave" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">View Leaves</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<form method="post" id="updateleave" action="{{route('update_employee_leave')}}">
							@csrf	
						   <input type="hidden" name="leave_id" id="leave_id">
						   <div class="form-group">
								<label>Leave Type <span class="text-danger">*</span></label>
								<select name="view_leave_type" id="view_leave_type" class="form-control" tabindex="-1" aria-hidden="true" required>
									<option value="">Select Leave Type</option>
									<option value="Full day">Full Day</option>
									<option value="Half day">Half Day</option>
									<option value="Short day">Short Day</option>
								</select>
								<span style="color:red;">{{$errors->first('update_leave_type')}}</span>
							</div>
							<div class="form-group full-Time">
								<label for="name">Select Time</label>
								<select name="view_time" id="view_time" class="form-control">	
									<option value="">Select Time</option>
									<option value="First Half">First Half</option>
									<option value="Second Half">Second Half</option>
								</select>	
							</div>
							<div class="form-group short-time">
								<label for="name">Time</label>
								<select name="leavetime" id="leavetime" class="form-control">	
									<option value="">Select Time</option>
									<option value="First Half">First Half</option>
									<option value="Second Half">Second Half</option>
									<option value="Third Half">Third Half</option>
									<option value="Fourth Half">Fourth Half</option>
								</select>	
							</div>
							
							<div class="form-group">
								<label>From <span class="text-danger">*</span></label>
								<input class="form-control" type="date" name="view_from" id="view_from" required>
								<span style="color:red;">{{$errors->first('update_from')}}</span>
							</div>
							<div class="form-group">
								<label>To <span class="text-danger">*</span></label>
								<input class="form-control" type="date" name="view_to" id="view_to" required>
								<span style="color:red;">{{$errors->first('update_to')}}</span>
							</div>
							
							<div class="form-group">
								<label>Number of days <span class="text-danger">*</span></label>
								<input class="form-control" readonly="" type="text" name="view_number_days" id="view_number_days" value="" />
							</div>
							<div class="form-group">
								<label>Remaining Leaves <span class="text-danger">*</span></label>
								<input class="form-control" readonly="" value="12" type="text" name="view_leave_remaining" id="view_leave_remaining">
								<span style="color:red;">{{$errors->first('leave_remaining')}}</span>
							</div>
							<div class="form-group">
								<label>Leave Reason <span class="text-danger">*</span></label>
								<textarea rows="4" class="form-control" name="view_leave_reason" id="view_leave_reason" required></textarea>
								<span style="color:red;">{{$errors->first('leave_reason')}}</span>
							</div>
							<!--<div class="submit-section">
								<input type="submit" value="Submit" class="btn btn-primary">
							</div>-->
						</form>
					</div>
				</div>
			</div>
		</div>
		
	<div class="modal custom-modal fade" id="show_leave_reason" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Leave Reason</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<p class="reason_leave text-center">
					</p>
				</div>
			</div>
		</div>
	</div>  
	
	
	

	
@endsection	