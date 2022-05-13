@extends('layouts.admin')

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
                                                <h3>@if(!empty($taskscount)){{count($taskscount)}}@endif</h3>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-6 text-center">
                                            <div class="stats-box mb-4">
                                                <p>Overdue Tasks</p>
                                                <h3>@if(!empty($tasks_completed)){{count($tasks_completed)}}@endif</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress mb-4">
                                    <div class="progress-bar bg-purple" role="progressbar" style="width: @if(!empty($tasks_completed)){{count($tasks_completed)}}@endif%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">@if(!empty($tasks_completed)){{count($tasks_completed)}}@endif%</div>
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: @if(!empty($tasks_inprogress)){{count($tasks_inprogress)}}@endif%" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">@if(!empty($tasks_inprogress)){{count($tasks_inprogress)}}@endif%</div>
                                    <div class="progress-bar bg-success" role="progressbar" style="width: @if(!empty($tasks_hold)){{count($tasks_hold)}}@endif%" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100">@if(!empty($tasks_hold)){{count($tasks_hold)}}@endif%</div>
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: @if(!empty($tasks_pending)){{count($tasks_pending)}}@endif%" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100">@if(!empty($tasks_pending)){{count($tasks_pending)}}@endif%</div>
                                    <div class="progress-bar bg-info" role="progressbar" style="width: @if(!empty($tasks_review)){{count($tasks_review)}}@endif%" aria-valuenow="14" aria-valuemin="0" aria-valuemax="100">@if(!empty($tasks_review)){{count($tasks_review)}}@endif%</div>
                                </div>
                                <div>
                                    <p><i class="fa fa-dot-circle-o text-purple mr-2"></i>Completed Tasks <span class="float-right">@if(!empty($tasks_completed)){{count($tasks_completed)}}@endif</span></p>
                                    <p><i class="fa fa-dot-circle-o text-warning mr-2"></i>Inprogress Tasks <span class="float-right">@if(!empty($tasks_inprogress)){{count($tasks_inprogress)}}@endif</span></p>
                                    <p><i class="fa fa-dot-circle-o text-success mr-2"></i>On Hold Tasks <span class="float-right">@if(!empty($tasks_hold)){{count($tasks_hold)}}@endif</span></p>
                                    <p><i class="fa fa-dot-circle-o text-danger mr-2"></i>Pending Tasks <span class="float-right">@if(!empty($tasks_pending)){{count($tasks_pending)}}@endif</span></p>
                                    <p class="mb-0"><i class="fa fa-dot-circle-o text-info mr-2"></i>Review Tasks <span class="float-right">@if(!empty($tasks_review)){{count($tasks_review)}}@endif</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-4 d-flex">
                        <div class="card flex-fill">
                            <div class="card-body">
                                <h4 class="card-title">Today Absent <span class="badge bg-inverse-danger ml-2">@if(!empty($get_all_apsend_employee)){{count($get_all_apsend_employee)}}@endif</span></h4>
                                @if(!empty($get_all_apsend_employee))
								   @foreach($get_all_apsend_employee as $get_all_apsend_employees)
										<div class="leave-info-box">
											<div class="media align-items-center">
												<a href="profile.html" class="avatar"><img alt="" src="images/{{$get_all_apsend_employees->profile_pic}}"></a>
												<div class="media-body">
													<div class="text-sm my-0">{{$get_all_apsend_employees->name}} {{$get_all_apsend_employees->last_name}}</div>
												</div>
											</div>
											<div class="row align-items-center mt-3">
												<div class="col-6">
													<h6 class="mb-0">{{$get_all_apsend_employees->from}} <br/><span style="margin: 25%;">To</span> <br/>{{$get_all_apsend_employees->to}}</h6>
													<span class="text-sm text-muted">Leave Date</span>
												</div>
												<div class="col-6 text-right">
													<span class="badge {{$get_all_apsend_employees->status}}">{{$get_all_apsend_employees->status}}</span>
												</div>
											</div>
										</div>
									@endforeach
								@endif
                            </div>
                        </div>
                    </div>
					<div class="col-md-12 col-lg-6 col-xl-4 d-flex">
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
											<p>Today not Anyone Birthday</p>
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
				
				<div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                                <div class="dash-widget-info">
                                    <h3>@if(!empty($projectmodel)){{count($projectmodel)}}@endif</h3>
                                    <span>Projects</span>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
                                <div class="dash-widget-info">
                                    <h3>@if(!empty($taskscount)) {{count($taskscount)}} @endif</h3>
                                    <span>Tasks</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                                <div class="dash-widget-info">
                                    <h3>@if(!empty($totalshowuser)){{$totalshowuser}}@endif</h3>
                                    <span>Employees</span>
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
						<div class="col-auto float-right ml-auto">
							<div class="col-auto float-right ml-auto">
								<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_holiday"><i class="fa fa-plus"></i> Add update</a>
							</div>
						</div>
					</div>
				</div>
				<div id="admin_more_latestupdate">	
					@foreach($getlatestupdate as $getlatestupdates)
						<p>{{$getlatestupdates->message}}</p>
					@endforeach
				</div>	
			</div>
		</div>
		
		<div class="card">
			<div class="card-body">
				<div class="text-center">
					<h2 class="">Feeds</h2>
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
				<br/>
				<div class="row mt-5">
					<div class="col-sm-12">
						<!--<h2 class="show-feed text-center">Show all feed</h2>-->
                        <div class="row" id="admin_feed">
						
                        </div>
						<div class="auto-load text-center">
							<svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
								x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
								<path fill="#000"
									d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
									<animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
										from="0 50 50" to="360 50 50" repeatCount="indefinite" />
								</path>
							</svg>
						</div>
						<!--<div class="text-center mt-5">
							<button class="see-more btn btn-primary text-center" data-page="2" data-link="{{route('home')}}?page=" data-div="#admin_feed">Load More</button> 
						</div>-->
					</div>
				</div>
				<br/>
                
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
					<form method="post" id="adminaddlatestupdate" action="{{route('adminaddlatestupdate')}}">
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
