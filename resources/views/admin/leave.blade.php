@extends('layouts.admin')
@section('content')
		
		@if(session()->has('pendingstatus'))
			<div class="alert alert-success">
				{{session()->get('pendingstatus')}}
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
						<li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Leaves</li>
					</ul>
				</div>
			</div>
		</div>
	
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
						<div class="row">
							<div class="col-sm-12">
								<div id="leavesAdmin_wrapper" class="dataTables_wrapper no-footer">
								
								<table class="table table-striped" id="adminleavetable" role="grid" aria-describedby="leavesAdmin_info">
									<thead>
										<tr role="row"><th class="sorting sorting_asc" tabindex="0" aria-controls="leavesAdmin" rowspan="1" colspan="1" aria-label="Employee: activate to sort column descending" style="width: 221.922px;" aria-sort="ascending">Employee</th><th class="sorting" tabindex="0" aria-controls="leavesAdmin" rowspan="1" colspan="1" aria-label="Leave Type: activate to sort column ascending" style="width: 127.688px;">Leave Type</th><th class="sorting" tabindex="0" aria-controls="leavesAdmin" rowspan="1" colspan="1" aria-label="From: activate to sort column ascending" style="width: 88.4531px;">From</th><th class="sorting" tabindex="0" aria-controls="leavesAdmin" rowspan="1" colspan="1" aria-label="To: activate to sort column ascending" style="width: 87.7812px;">To</th><th class="sorting" tabindex="0" aria-controls="leavesAdmin" rowspan="1" colspan="1" aria-label="No of Days: activate to sort column ascending" style="width: 116.734px;">No of Days</th><th class="sorting" tabindex="0" aria-controls="leavesAdmin" rowspan="1" colspan="1" aria-label="Reason: activate to sort column ascending" style="width: 140.016px;">Reason</th><th class="text-center sorting" tabindex="0" aria-controls="leavesAdmin" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 110.922px;">Status</th><th class="text-right sorting" tabindex="0" aria-controls="leavesAdmin" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 84.4844px;">Approved By</th></tr>
									</thead>
									<tbody>
										 
									 @foreach($showallleave as $showallleaves)   
										<tr class="odd text-center">
												<td class="sorting_1">
													<h2 class="table-avatar">
														<a href="#" class="avatar"><img alt="" src="images/{{$showallleaves->profile_pic}}"></a>
														<a> {{$showallleaves->name}} {{$showallleaves->last_name}} <span>Web Designer</span></a>
													</h2>
												</td>
												<td>{{$showallleaves->leave_type}}</td>
												<td>{{$showallleaves->from}}</td>
												<td>{{$showallleaves->to}}</td>
												<td>{{$showallleaves->number_days}}</td>
												<td><button class="dropdown-item showreason" type="button" value="{{$showallleaves->id}}">{{Str::limit($showallleaves->leave_reason, 5)}}</button></td>
												<td class="text-center">
													<div class="dropdown action-label">
														<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
															@if($showallleaves->status=="Approved")
																<i class="fa fa-dot-circle-o text-success"></i> {{$showallleaves->status}}
															@elseif($showallleaves->status=="Declined")
																<i class="fa fa-dot-circle-o text-danger"></i> {{$showallleaves->status}}
															@else	
																<i class="fa fa-dot-circle-o text-purple"></i> {{$showallleaves->status}}
															@endif
														</a>
														<div class="dropdown-menu dropdown-menu-right">
															<a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> New</a>
															<a class="dropdown-item" href="{{route('approved',$showallleaves->id)}}"><i class="fa fa-dot-circle-o text-success"></i> Approved</a>
															<a class="dropdown-item" href="{{route('declined',$showallleaves->id)}}"><i class="fa fa-dot-circle-o text-danger"></i> Declined</a>
														</div>
													</div>
												</td>
												<td class="">
													{{$showallleaves->approved_by}}
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
  


	<div id="leave_reason" class="modal custom-modal fade" role="dialog">
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