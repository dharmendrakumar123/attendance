@extends('employeelayouts.admin')

@section('content')
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Attendance</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
						<li class="breadcrumb-item active">Attendance</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="card punch-status">
					<div class="card-body">
						<h5 class="card-title">Timesheet <small class="text-muted">{{$currentdate}}</small></h5>
						<div class="punch-det">
							<h6>Punch In at</h6>
							<p>{{$currentdate}} at {{$InTime->time_in}}</p>
						</div>
						<div class="punch-info">
							<div class="punch-hours">
								<span>{{$total_shift_time}}</span>
							</div>
						</div>
						<div class="punch-btn-section">
							<a  href="{{route('punchout')}}" class="btn btn-primary punch-btn punch-out">Punch out</a>
						</div>
						<div class="statistics">
							<div class="row">
								<div class="col-md-6 col-6 text-center">
									<div class="stats-box">
										<p>Break</p>
										<h6>1.21 hrs</h6>
									</div>
								</div>
								<div class="col-md-6 col-6 text-center">
									<div class="stats-box">
										<p>Overtime</p>
										<h6>3 hrs</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card att-statistics">
					<div class="card-body">
						<h5 class="card-title">Statistics</h5>
						<div class="stats-list">
							<div class="stats-info">
								<p>Today <strong>3.45 <small>/ 8 hrs</small></strong></p>
								<div class="progress">
									<div class="progress-bar bg-primary" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
							<div class="stats-info">
								<p>This Week <strong>28 <small>/ 40 hrs</small></strong></p>
								<div class="progress">
									<div class="progress-bar bg-warning" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
							<div class="stats-info">
								<p>This Month <strong>90 <small>/ 160 hrs</small></strong></p>
								<div class="progress">
									<div class="progress-bar bg-success" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
							<div class="stats-info">
								<p>Remaining <strong>90 <small>/ 160 hrs</small></strong></p>
								<div class="progress">
									<div class="progress-bar bg-danger" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
							<div class="stats-info">
								<p>Overtime <strong>4</strong></p>
								<div class="progress">
									<div class="progress-bar bg-info" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card recent-activity">
					<div class="card-body">
						<h5 class="card-title">Today Activity</h5>
						<ul class="res-activity-list">
							<li>
								<p class="mb-0">Punch In at</p>
								<p class="res-activity-time">
									<i class="fa fa-clock-o"></i> 10.00 AM.
								</p>
							</li>
							<li>
								<p class="mb-0">Punch Out at</p>
								<p class="res-activity-time">
									<i class="fa fa-clock-o"></i> 11.00 AM.
								</p>
							</li>
							<li>
								<p class="mb-0">Punch In at</p>
								<p class="res-activity-time">
									<i class="fa fa-clock-o"></i> 11.15 AM.
								</p>
							</li>
							<li>
								<p class="mb-0">Punch Out at</p>
								<p class="res-activity-time">
									<i class="fa fa-clock-o"></i> 1.30 PM.
								</p>
							</li>
							<li>
								<p class="mb-0">Punch In at</p>
								<p class="res-activity-time">
									<i class="fa fa-clock-o"></i> 2.00 PM.
								</p>
							</li>
							<li>
								<p class="mb-0">Punch Out at</p>
								<p class="res-activity-time">
									<i class="fa fa-clock-o"></i> 7.30 PM.
								</p>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		
		<div class="row">
			<div class="col-lg-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0" id="total_working">
						<thead>
							<tr>
								<th>#</th>
								<th>Date </th>
								<th>Punch In</th>
								<th>Punch Out</th>
								<th>Production</th>
								<th>Break</th>
								<th>Overtime</th>
							</tr>
						</thead>
						<tbody>
							@php($i=1)
							@foreach($AllTotalTime as $AllTotalTime)
							<tr>
								<td>{{$i}}</td>
								<td>{{$AllTotalTime->day}}</td>
								<td>{{$AllTotalTime->time_in}}</td>
								<td>{{$AllTotalTime->time_out}}</td>
								<td>9 hrs</td>
								<td>1 hrs</td>
								<td>0</td>
							</tr>
							@php($i++)
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
            
@endsection	

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
	$(document).ready( function () {
		$('#total_working').DataTable();
} );
</script>