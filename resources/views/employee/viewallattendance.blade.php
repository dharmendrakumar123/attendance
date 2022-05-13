@extends('employeelayouts.admin')
@section('content')
		@if(session()->has('update'))
			<div class="alert alert-success">
				{{ session()->get('update') }}
			</div>
		@endif
				<div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Attendance</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Attendance</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table table-nowrap mb-0" id="allattendance">
                                <thead>
                                    <tr>
										<th>Employee</th>
										<?php
											$currentmonth = date('Y-m', time());
											$getlastday = date('d', strtotime('last day of this month', strtotime($currentmonth))); // get max date of current month: 28, 29, 30 or 31.
											for ($i = 1; $i <= $getlastday; $i++) {
												$get_current_month_all_days = str_pad($i, 2, '0', STR_PAD_LEFT);
												echo "<th>".$get_current_month_all_days."</th>";
											}
										?>
                                    </tr>
                                </thead>
                                <tbody>
									@foreach($PunchModel as $keys => $PunchModels)
                                    <tr> 
										<td>
                                            <h2 class="table-avatar">
                                                <a class="avatar avatar-xs" href="#"><img alt="" src="images/{{$PunchModels->profile_pic}} "></a>
                                                <a href="#">{{$PunchModels->name}} {{$PunchModels->last_name}}</a>
                                            </h2>
                                        </td>
										<?php
											for($i = 0; $i<=count($employeeattendance); $i++){ 
												if(!empty($employeeattendance[$i])){
													if($employeeattendance[$i]["uid"] == $PunchModels->uid){	
														if($employeeattendance[$i]["time_in"]!=="00:00:00"){
															$time_in        = strtotime($employeeattendance[$i]["time_in"]);
															$time_out       = strtotime($employeeattendance[$i]["time_out"]);  
															$totalworkcount = $time_out - $time_in;
															$totalhours     = floor($totalworkcount/(60*60));
															
															if($totalhours<=6){
																echo '<td><a href="#" class="hredit_attendacen" id="'.$employeeattendance[$i]["id"].'">0.5</a></td>';
															}elseif(($totalhours>6)&&($totalhours<8)){
																echo '<td><a href="#" class="hredit_attendacen" id="'.$employeeattendance[$i]["id"].'">0.75</a></td>';
															}else{
																echo '<td><a href="#" class="hredit_attendacen" id="'.$employeeattendance[$i]["id"].'">1</a></td>';
															}
														}else{
															echo '<td><a href="#" class="hredit_attendacen" id="'.$employeeattendance[$i]["id"].'"><span class="first-off">0</span></a></td>';	
														} 
													}
												} 
											}
										?>
									</tr>
									@endforeach     
								</tbody>
                            </table>
                        </div>
                    </div>
                </div>
           
		   
			 <div class="modal custom-modal fade" id="edit_attendacen" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Attendance Update</h5>
                            <button type="button" class="close" id="single-show" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
							</button>
                        </div>
                        <div class="modal-body">
							<form action="{{route('hr_update_attendance')}}" method="post">
								@csrf
								<input type="hidden" name="attend_id" id="attend_id">
								<div class="form-group">
									<div class="form-group">
										<label for="tim_in">Time In</label>
										<input type="time" name="time_in" id="time_in" class="form-control">
									</div>
									<div class="form-group">
										<label for="tim_in">Time Out</label>
										<input type="time" name="time_out" id="time_out" class="form-control">
									</div>
									<!--<select name="edit_hours" id="edit_hours" class="form-control">
										<option value="0">0</option>
										<option value="0.5">0.5</option>
										<option value="0.75">0.75</option>
										<option value="1">1</option>
									</select>-->
								</div>	
								<div class="text-right">
									<input type="submit" name="submit" id="submit" value="Update" class="btn btn-success">
								</div>
							</form>
                        </div>
                    </div>
                </div>
            </div>
		   
		   
		   
            <div class="modal custom-modal fade" id="attendance_info" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Attendance Info</h5>
                            <button type="button" class="close" id="single-show" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
							</button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card punch-status">
                                        <div class="card-body">
                                            <h5 class="card-title">Timesheet <small class="text-muted"></small></h5>
                                            <div class="punch-det">
                                                <h6>Punch In at</h6>
                                                <p class="admin-view-punchin"></p>
                                            </div>
                                            <div class="punch-info">
                                                <div class="punch-hours">
                                                    <span id='ct6'>00:00:00</span>
                                                </div>
                                            </div>
                                            <div class="punch-det">
                                                <h6>Punch Out at</h6>
                                                <p class="admin-view-punchout"></p>
                                            </div>
                                            <div class="statistics">
                                                <div class="row">
                                                    <div class="col-md-6 col-6 text-center">
                                                        <div class="stats-box">
                                                            <p>Break</p>
                                                            <h6 class="adminbreak"></h6>
                                                        </div>
                                                    </div>                                             
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card recent-activity">
                                        <div class="card-body">
                                            <h5 class="card-title">Activity</h5>
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