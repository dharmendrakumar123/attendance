@extends('employeelayouts.admin')

@section('content')
	<div class="section_load" id="mydiv">	
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
		@can('attendacen_create')
			<div class="row">
				<div class="col-md-4">
					<div class="card punch-status">
						<div class="card-body">
							<h5 class="card-title">Timesheet <small class="text-muted">{{$currentdate}}</small></h5>
							<div class="punch-det">
								@if(!empty($activityInOut))	
									@if($activityInOut->time_out=="")
										<h6>Punch In at</h6>
										<p>@if($activityInOut!=""){{$activityInOut->day}} at {{$activityInOut->time_in}}@else{{12}}@endif </p>
									@else
										<h6>Punch Out at</h6>
										<p>@if($activityInOut!=""){{$activityInOut->day}} at {{$activityInOut->time_out}}@else{{12}}@endif </p>
									@endif
								@else
									<h6>Punch In at</h6>
									<p>00 </p>
									<h6>Punch Out at</h6>
									<p>00</p>
								@endif		
							</div>
							<div class="punch-info">
								<div class="punch-hours">
									<span class="digital-clock">00:00:00</span>
									<!--<span id='ct6'>00:00:00</span>-->
								</div>
							</div>
							<?php
									$totaltodayhours = strtotime("");
									foreach($alldayswork as $alldaysworks){
											$time_in  = strtotime($alldaysworks->time_in);
											$time_out = strtotime($alldaysworks->time_out);  
											$totalworkcount = $time_out - $time_in;
											$totaltodayhours += $totalworkcount;
									}
									$totalhours = floor($totaltodayhours/(60*60));
									$totalmins = floor(($totaltodayhours-($totalhours*60*60))/(60));
									$work = $totalhours."h ".$totalmins."m";
									
									$inbreaktime = array();
									foreach($breakincount as $breakincounts){	
										if(!empty($breakincounts)){
											$inbreaktime[] = $breakincounts->time_in;
										}else{
											$inbreaktime[] = '0';
										}	
									}
				
									$outbreaktime = array();
									foreach($breakoutcount as $breakoutcounts){
											if(!empty($breakoutcounts->time_out)){
												$outbreaktime[] .= $breakoutcounts->time_out;
											}else{
												$outbreaktime[] .= '0';
											}	
									} 
									
									if(count($outbreaktime)== 1){
										$outbreaktime; 
									}else{
										array_pop($outbreaktime);  
									}
									$totalbreak = strtotime("");
									foreach(array_combine($inbreaktime,$outbreaktime) as $inbreaktimes =>$outbreaktimes){
										if($outbreaktimes=="0"){
											$intimes = 0;
											$outtimes = 0;
										}else{	
											$intimes = strtotime($inbreaktimes);
											$outtimes = strtotime($outbreaktimes);
										}						
										//$totalbreakworkcount = $intimes - $outtimes;
										$totalbreakworkcount = $intimes - $outtimes;
										$totalbreak +=$totalbreakworkcount;
										/* $totalbreakhours = floor($totalbreak/(60*60));
										$totalbreakmins = floor(($totalbreak-($totalbreakhours*60*60))/(60));		
										echo $totalbreakhours."h ".$totalbreakmins."m<br/>";  */
									} 
										$totalbreakhours = floor($totalbreak/(60*60));
										$totalbreakmins = floor(($totalbreak-($totalbreakhours*60*60))/(60));		
										$break = $totalbreakhours."h ".$totalbreakmins."m"; 
										$_SESSION["user_id"] = $break;
							?>		
							
							<div class="punch-btn-section">
								<!--<button type="button" class="btn btn-primary punch-btn">Punch Out</button>-->
								@if(!empty($PunchInTime->time_in))
									<!--<a href="{{route('punchout',$PunchInTime->id)}}" class="btn btn-primary punch-btn punch-out">Punch out</a>-->
								@endif
								@if($PunchInTime!="")
									@php($punchid = $PunchInTime->id)
								@else
									@php($punchid = 1)
								@endif		
								<input type="hidden" value="<?php echo $break; ?>" class="count_total_break">
								<input type="hidden" value="<?php echo $punchid; ?>" class="punch_id">
								<input type="hidden" value="{{$work}}" class="count_total_work">
								@if(!empty($activityInOut))	
									@if($activityInOut->time_out=="")
										<!--<a href="{{route('punchout',['id'=>$punchid,'break'=>$break,'activity_id'=>$PunchInactive->id])}}" class="btn btn-primary punch-btn punch-out">Punch out</a>-->	
										<button class="btn btn-primary punch-btn punch-out" value="{{$punchid}}" placeholder="<?php echo $break; //echo $break; ?>" name="{{$PunchInactive->id}}">Punch out</button>
									@else
										<!--<a href="{{route('punchin',['id'=>$punchid,'work'=>$work])}}" class="btn btn-success punch-btn punch-in">Punch In</a>-->
										<button class="btn btn-success punch-btn punch-in" value="{{$punchid}}" placeholder="{{$work}}">Punch In</button>
									@endif
								@else
									<button class="btn btn-success punch-btn punch-in" value="{{$punchid}}" placeholder="{{$work}}">Punch In</button>
								@endif
							
							</div>
							<div class="statistics">
								<div class="row">
									<div class="col-md-6 col-6 text-center">
										<div class="stats-box">
											<p>Production</p>
											@foreach($total_product as $total_products)
												<h6>{{$total_products->hours}}</h6>
											@endforeach
										</div>
									</div>
									<div class="col-md-6 col-6 text-center">
										<div class="stats-box">
											<p>Break</p>
											<h6><?php echo $break; ?></h6>
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
								@foreach($todayactivity as $todayactivitys)
									@if(!empty($todayactivitys->time_in))
									<li>
										<p class="mb-0">Punch In at</p>
										<p class="res-activity-time">
											<i class="fa fa-clock-o"></i> {{$todayactivitys->time_in}}.
										</p>
									</li>
									@endif
									@if(!empty($todayactivitys->time_out))
									<li>
										<p class="mb-0">Punch Out at</p>
										<p class="res-activity-time">
											<i class="fa fa-clock-o"></i> {{$todayactivitys->time_out}}.
										</p>
									</li>
									@endif
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		@endcan
		
		@can('attendacen_read')
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
									
								</tr>
							</thead>
							<tbody>
								<?php
									$i=1;
									foreach($AllTotalTime as $AllTotalTime){
										echo "<tr>";
										echo "<td>".$i."</td>";
										echo "<td><button type='button' value=".$AllTotalTime->day." class='datedrop'>".date('d F Y', strtotime($AllTotalTime->day))."</button></td>";
										echo "<td>".$AllTotalTime->time_in."</td>";
										echo "<td>".$AllTotalTime->time_out."</td>";
										echo "<td>".$AllTotalTime->hours."</td>";
										echo "<td>".$AllTotalTime->break."</td>";
										echo "</tr>";
										$i++;
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		@endcan
			<div id="showallactivity" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Activity</h5>
						<button type="button" class="close" id="but" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="col-md-12">
							<div class="card recent-activity">
								<div class="card-body">									
									<ul class="res-activity-list timeOut">
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>       
@endsection	


