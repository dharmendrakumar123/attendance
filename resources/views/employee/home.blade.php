@extends('employeelayouts.admin')
@section('content')
	@if(session()->has('addupdate'))
		<div class="alert alert-success">
			{{session()->get('addupdate')}}
		</div>
	@endif
	<div class="page-header">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="page-title">Welcome {{Auth::user()->name}} {{Auth::user()->last_name}}</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item active">Dashboard</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="section_load" id="mydiv">
		<div class="row">
		@can('attendacen_create')
			<div class="col-md-4">
				<div class="card punch-status">
					<div class="card-body">
						<h5 class="card-title">Timesheet <small class="text-muted">{{$currentdate}}</small></h5>
						<div class="punch-det">
							@if(!empty($emp_activityInOut))	
								@if($emp_activityInOut->time_out=="")
									<h6>Punch In at</h6>
									<p>@if($emp_activityInOut!=""){{$emp_activityInOut->day}} at {{$emp_activityInOut->time_in}}@else{{12}}@endif </p>
								@else
									<h6>Punch Out at</h6>
									<p>@if($emp_activityInOut!=""){{$emp_activityInOut->day}} at {{$emp_activityInOut->time_out}}@else{{12}}@endif </p>
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
								foreach($emp_alldayswork as $emp_alldaysworks){
										$time_in  = strtotime($emp_alldaysworks->time_in);
										$time_out = strtotime($emp_alldaysworks->time_out);  
										$totalworkcount = $time_out - $time_in;
										$totaltodayhours += $totalworkcount;
								}
								$totalhours = floor($totaltodayhours/(60*60));
								$totalmins  = floor(($totaltodayhours-($totalhours*60*60))/(60));
								$work 		= $totalhours."h ".$totalmins."m";
								
								
								$inbreaktime = array();
								foreach($emp_breakincount as $emp_breakincounts){	
									if(!empty($emp_breakincounts)){
										$inbreaktime[] = $emp_breakincounts->time_in;
									}else{
										$inbreaktime[] = '0';
									}	
								}
			
								$outbreaktime = array();
								foreach($emp_breakoutcount as $emp_breakoutcounts){
										if(!empty($emp_breakoutcounts->time_out)){
											$outbreaktime[] .= $emp_breakoutcounts->time_out;
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
							@if(!empty($Emp_PunchInTime->time_in))
								<!--<a href="{{route('punchout',$Emp_PunchInTime->id)}}" class="btn btn-primary punch-btn punch-out">Punch out</a>-->
							@endif
							@if($Emp_PunchInTime!="")
								@php($punchid = $Emp_PunchInTime->id)
							@else
								@php($punchid = 1)
							@endif		
							<input type="hidden" value="<?php echo $break; ?>" class="count_total_break">
							<input type="hidden" value="<?php echo $punchid; ?>" class="punch_id">
							<input type="hidden" value="{{$work}}" class="count_total_work">
							@if(!empty($emp_activityInOut))	
								@if($emp_activityInOut->time_out=="")
									<button class="btn btn-primary punch-btn punch-out" value="{{$punchid}}" placeholder="<?php echo $break; //echo $break; ?>" name="{{$emp_PunchInactive->id}}">Punch out</button>
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
										@foreach($emp_total_product as $emp_total_products)
											<h6>{{$emp_total_products->hours}}</h6>
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
				<div class="card recent-activity">
					<div class="card-body">
						<h5 class="card-title">Today Activity</h5>
						<ul class="res-activity-list">
							@foreach($emp_todayactivity as $emp_todayactivitys)
								@if(!empty($emp_todayactivitys->time_in))
								<li>
									<p class="mb-0">Punch In at</p>
									<p class="res-activity-time">
										<i class="fa fa-clock-o"></i> {{$emp_todayactivitys->time_in}}.
									</p>
								</li>
								@endif
								@if(!empty($emp_todayactivitys->time_out))
								<li>
									<p class="mb-0">Punch Out at</p>
									<p class="res-activity-time">
										<i class="fa fa-clock-o"></i> {{$emp_todayactivitys->time_out}}.
									</p>
								</li>
								@endif
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		@endcan	
			
			<div class="col-md-4">
				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<h2 class="today-birthday text-center mt-3">Today Birthday</h2>
							@if(count($birthday)>0)
								@foreach($birthday as $birthdays)
										<div class="profile-img">
											<p class="avatar"><img src="images/{{$birthdays->profile_pic}}" alt=""></p>
										</div>
										<div class="card-body text-center">
											<h4 class="user-name m-t-10 mb-0">{{$birthdays->name}} {{$birthdays->last_name}}</h4>
											<div class="small text-muted">{{$birthdays->designation}}</div>
											<p class="card-text">{{$birthdays->birth_date}}</p>
										</div>
								@endforeach
							@else
								<div class="card-body text-center">
									<p>Today not Birthday Anyone</p>
								</div>
							@endif	
						</div>
					</div>
					<div class="col-sm-12">
						<div class="card text-center">
							<h2 class="today-birthday text-center  mt-3">Tomorrow Holiday</h2>
							@if(count($get_tomorrow_holiday) > 0) 
							@foreach($get_tomorrow_holiday as $get_tomorrow_holidays)
								<div class="card-body">
									<p>{{$get_tomorrow_holidays->name}}</p>
									<p>{{$get_tomorrow_holidays->date}}</p>
								</div>
							@endforeach
							@else
								<div class="card-body">
									<p>No Any Holiday</p>
								</div>
							@endif	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12 col-lg-6 col-xl-4 d-flex">
			<div class="card flex-fill">
				<div class="card-body">
					<h4 class="card-title">Task Statistics</h4>
					<div class="statistics">
						<div class="row">
							<div class="col-md-6 col-6 text-center">
								<div class="stats-box mb-4">
									<p>Total Tasks</p>
									<h3>{{count($current_employee_task)}}</h3>
								</div>
							</div>
							<div class="col-md-6 col-6 text-center">
								<div class="stats-box mb-4">
									<p>Overdue Tasks</p>
									<h3>{{count($complete_employee_task)}}</h3>
								</div>
							</div>
						</div>
					</div>
					<div class="progress mb-4">
						<div class="progress-bar bg-purple" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">30%</div>
						<div class="progress-bar bg-warning" role="progressbar" style="width: 22%" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">22%</div>
						<div class="progress-bar bg-success" role="progressbar" style="width: 24%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100">24%</div>
						<div class="progress-bar bg-danger" role="progressbar" style="width: 26%" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100">21%</div>
						<div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100">10%</div>
					</div>
					<div>
						<p><i class="fa fa-dot-circle-o text-purple mr-2"></i>Completed Tasks <span class="float-right">{{count($complete_employee_task)}}</span></p>
						<p><i class="fa fa-dot-circle-o text-warning mr-2"></i>Inprogress Tasks <span class="float-right">{{count($Inprogress_employee_task)}}</span></p>
						<p><i class="fa fa-dot-circle-o text-success mr-2"></i>On Hold Tasks <span class="float-right">{{count($onhold_employee_task)}}</span></p>
						<p><i class="fa fa-dot-circle-o text-danger mr-2"></i>Pending Tasks <span class="float-right">{{count($Pending_employee_task)}}</span></p>
						<p class="mb-0"><i class="fa fa-dot-circle-o text-info mr-2"></i>Review Tasks <span class="float-right">{{count($review_employee_task)}}</span></p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 col-lg-6 col-xl-4 d-flex">
			<div class="card flex-fill">
				<div class="card-body">
					<span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
					<div class="dash-widget-info">
						<h3>{{count($project)}}</h3>
						<span>Projects</span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 col-lg-6 col-xl-4 d-flex">
			<div class="card flex-fill">
				<div class="card-body">
					<span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
					<div class="dash-widget-info">
						<h3>{{count($current_employee_task)}}</h3>
						<span>Tasks</span>
					</div>
				</div>
			</div>
		</div>
	</div>
		
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-6">
					<h2>Latest Update</h2>
				</div>
				<div class="col-sm-6">
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
			<div id="more_latestupdate">	
				@foreach($getlatestupdate as $getlatestupdates)
					<p class="mt-2">{{$getlatestupdates->message}}</p>
				@endforeach
			</div>	
			<div class="text-center mt-5">
				<button class="see-more-updates btn btn-primary text-center" data-page="2" data-link="{{route('employee_dashboard')}}?page=" data-div="#more_latestupdate">Load More</button> 
			</div>
		</div>
	</div>	
	
	<div class="card">
		<div class="card-body">	
			<div class="text-center">
				<h2 class="feed_show">Feeds</h2>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<form id="feed" enctype='multipart/form-data'>
						@csrf
						<div class="row">
							<div class="col-sm-11">
								<textarea class="form-control" name="message" id="message"></textarea>
								<label class="filebutton">
									<img src="images/385487.png" width="20px" height="17px">
									<input type="file" name="files" id="fiels">
								</label>
							</div>
							<div class="col-sm-1 mt-5">		
								<input type="submit" value="send" class="btn btn-primary send-message">
							</div>
						</div>
					</form>		
				</div>
			</div>
			<div class="row mt-5">
				<div class="col-sm-12">
					<div class="row" id="empl_feeds">
						@foreach($get_all_feed as $get_all_feeds)
							@if($get_all_feeds->uid!==Auth::user()->uid)
								<div class="col-sm-6">
									<h2 class="table-avatar mt-3">
										<a class="avatar">
											<img src="images/{{$get_all_feeds->profile_pic}}" alt="">
										</a>
										<a style="font-size: 17px;">{{$get_all_feeds->name}} {{$get_all_feeds->last_name}}</a>
									</h2>
									@if(!empty($get_all_feeds->files))
										<img src="images/{{$get_all_feeds->files}}" width="150" height="150">
									@endif
									<p class="messag">{{$get_all_feeds->message}}</p>
								</div>
								<div class="col-sm-6"></div>
							@else
								<div class="col-sm-6"></div>
								<div class="col-sm-6" id="show-current">
									<h2 class="table-avatar mt-3">
										<a class="avatar">
											<img src="images/{{$get_all_feeds->profile_pic}}" alt="">
										</a>
										<a style="font-size: 17px;">Me</a>
									</h2>
									@if(!empty($get_all_feeds->files))
										<img src="images/{{$get_all_feeds->files}}" width="150" height="150">
									@endif
									<p class="messag">{{$get_all_feeds->message}}</p>
								</div>
							@endif	
						@endforeach
					</div>
					<!--<div class="auto-load text-center">
						<svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
							x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
							<path fill="#000"
								d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
								<animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
									from="0 50 50" to="360 50 50" repeatCount="indefinite" />
							</path>
						</svg>
					</div>-->
					<div class="text-center mt-5">
						<button class="see-more btn btn-primary text-center" data-page="2" data-link="{{route('employee_dashboard')}}?page=" data-div="#empl_feeds">Load More</button> 
					</div>
				</div>
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