@extends('layouts.admin')
@section('content')
            
			
			@if(session()->has('total_leave'))
			<div class="alert alert-success">
				{{session()->get('total_leave')}}
			</div>
			@endif
			<div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col">
                            <h3 class="page-title">Leave Report</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Leave Report</li>
                            </ul>
                        </div> 
						<div class="col-auto float-right ml-auto">
							<a href="#" class="btn add-btn" data-toggle="modal" data-target="#added_total_leaves"><i class="fa fa-plus"></i> Add Total Leave</a>
						</div>		
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div id="leaveReport_wrapper" class="dataTables_wrapper no-footer">
											<table class="table table-striped custom-table" id="leaveReport" role="grid" aria-describedby="leaveReport_info">
												<thead>
													<tr role="row">
														<th class="sorting sorting_asc" tabindex="0" aria-controls="leaveReport" rowspan="1" colspan="1" aria-label="Employee: activate to sort column descending" style="width: 142.594px;" aria-sort="ascending">
															Employee
														</th>
														<th class="sorting" tabindex="0" aria-controls="leaveReport" rowspan="1" colspan="1" aria-label="Department: activate to sort column ascending" style="width: 126.094px;">
															Department
														</th>
														<th class="sorting" tabindex="0" aria-controls="leaveReport" rowspan="1" colspan="1" aria-label="No.of Days: activate to sort column ascending" style="width: 91.5781px;">
															No.of leaves
														</th>
														<th class="sorting" tabindex="0" aria-controls="leaveReport" rowspan="1" colspan="1" aria-label="Remaining Leave: activate to sort column ascending" style="width: 143.609px;">
															Remaining Leave
														</th>
														<th class="sorting" tabindex="0" aria-controls="leaveReport" rowspan="1" colspan="1" aria-label="Total Leaves: activate to sort column ascending" style="width: 105.344px;">
															Total Leaves
														</th>
													</tr>
												</thead>
												<tbody>
													@foreach($leave_report as $key => $leave_reports)	
														<tr class="odd">
															<td class="sorting_1">
																<h2 class="table-avatar">
																	<a href="#" class="avatar"><img alt="" src="{{asset('images')}}/{{$leave_reports->profile_pic}}"></a>
																	<a href="#">{{$leave_reports->name}} {{$leave_reports->last_name}}<span>#{{$leave_reports->uid}}</span></a>
																</h2>
															</td>
															<td>{{$leave_reports->department}} </td>
															<td class="text-center"><span class="btn btn-danger btn-sm">{{$leave_reports->number_leave}}</span></td>
															<td class="text-center"><span class="btn btn-warning btn-sm"><b>{{$leave_reports->leave_remaining= $leave_reports->total_leave-$leave_reports->number_leave}}</b></span></td>
															<td class="text-center"><span class="btn btn-success btn-sm" style="width:30%">
															{{$leave_reports->total_leave}}</span><button class="dropdown-item add_empl_leave" type="button" type="button" value="{{$leave_reports->uid}}"><i class="fa fa-plus" aria-hidden="true"></i></button></td>
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
            </div>
			
			
	<div id="added_total_leaves" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add total Number of leave.</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="{{route('insertotal')}}" id="added_leave">
						@csrf
						<div class="form-group">
							<label for="pwd">Employee</label>
							<select class="form-control" name="uid" id="uid">
								<option value="">..Select..</option>
								@foreach($get_all_user as $get_all_users)
									<option value="{{$get_all_users->uid}}">{{$get_all_users->name}} {{$get_all_users->last_name}}</option>
								@endforeach
							</select>
							<span style="color:red">{{$errors->first('uid')}}</span>
						</div>
						<div class="form-group">
							<label for="pwd">Total leave</label>
							<input type="text" class="form-control" name="leave_total" id="leave_total">
							<span style="color:red">{{$errors->first('leave_total')}}</span>
						</div>
						<input type="submit" name="submit" class="btn btn-success text-right">
					</form>
				</div>
			</div>
		</div>
	</div> 
	
	<div id="employee_total_leaves" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Update total Number of leave.</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{route('update_total_leave')}}" method="post" id="update_leave">
						@csrf
						<input type="hidden" class="form-control leave_totalss" name="leave_total_uid">
						<div class="form-group">
							<label for="pwd">Total leave:</label>
							<input type="text" class="form-control" name="update_leave_total" id="update_leave_total">
							<span style="color:red">{{$errors->first('update_leave_total')}}</span>
						</div>
						<input type="submit" name="submit" class="btn btn-success text-right">
					</form>
				</div>
			</div>
		</div>
	</div>   	
@endsection