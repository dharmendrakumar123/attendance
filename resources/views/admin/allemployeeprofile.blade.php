@extends('layouts.admin')
@section('content')
			   
			   
			   @if(session()->has('update_profile'))
					<div class="alert alert-success">
						{{ session()->get('update_profile')}}
					</div>
				@endif
				 @if(session()->has('admin_add_personal_information'))
					<div class="alert alert-success">
						{{ session()->get('admin_add_personal_information')}}
					</div>
				@endif
				@if(session()->has('employee_update_personal'))
					<div class="alert alert-success">
						{{ session()->get('employee_update_personal')}}
					</div>
				@endif
				@if(session()->has('add_employee_emgen_contact'))
					<div class="alert alert-success">
						{{ session()->get('add_employee_emgen_contact')}}
					</div>
				@endif
				@if(session()->has('update_employee_emgen_contact'))
					<div class="alert alert-success">
						{{ session()->get('update_employee_emgen_contact')}}
					</div>
				@endif
				@if(session()->has('addemployeefamilymember'))
					<div class="alert alert-success">
						{{ session()->get('addemployeefamilymember')}}
					</div>
				@endif
				@if(session()->has('employeefamilydestroy'))
					<div class="alert alert-success">
						{{ session()->get('employeefamilydestroy')}}
					</div>
				@endif
				@if(session()->has('addeemployeeducation'))
					<div class="alert alert-success">
						{{ session()->get('addeemployeeducation')}}
					</div>
				@endif
				@if(session()->has('employeeducationdestroy'))
					<div class="alert alert-success">
						{{ session()->get('employeeducationdestroy')}}
					</div>
				@endif
				@if(session()->has('addemployeeexperience'))
					<div class="alert alert-success">
						{{ session()->get('addemployeeexperience')}}
					</div>
				@endif
			   @if(session()->has('employeeexperiencedestroy'))
					<div class="alert alert-success">
						{{ session()->get('employeeexperiencedestroy')}}
					</div>
				@endif
				@if(session()->has('add_bank'))
					<div class="alert alert-success">
						{{ session()->get('add_bank')}}
					</div>
				@endif
				@if(session()->has('delete_bank'))
					<div class="alert alert-success">
						{{ session()->get('delete_bank')}}
					</div>
				@endif
			   
			   <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Profile</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card mb-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-view">
                                    <div class="profile-img-wrap">
                                        <div class="profile-img">
                                            <a href="#"><img alt="" src="images/{{$profile->profile_pic}}"></a>
                                        </div>
                                    </div>
                                    <div class="profile-basic">
											<div class="row">
												<div class="col-md-5">
													<div class="profile-info-left">
														<h3 class="user-name m-t-0 mb-0">{{$profile->name}} {{$profile->last_name}}</h3>
														<h6 class="text-muted">{{$profile->designation}}</h6>
														<!--<small class="text-muted">Web Designer</small>-->
														<div class="staff-id">Employee ID : {{$profile->uid}}</div>
														<div class="small doj text-muted">Date of Join : {{$profile->joining_date}}</div>
													</div>
												</div>
												<div class="col-md-7">
													<ul class="personal-info">
														<li>
															<div class="title">Phone:</div>
															<div class="text"><a href="tel:{{$profile->phone}}">{{$profile->phone}}</a></div>
														</li>
														<li>
															<div class="title">Email:</div>
															<div class="text"><a href="mailto:{{$profile->email}}">{{$profile->email}}</a></div>
														</li>
														<li>
															<div class="title">Birthday:</div>
															<div class="text">{{$profile->birth_date}}</div>
														</li>
														<li class="addres-prifile1">
															<div class="title">Address:</div>
															<div class="text">{{$profile->address}}</div>
														</li>
														<li class="addres-prifile1">
															<div class="title">Gender:</div>
															<div class="text">{{$profile->gender}}</div>
														</li>
														<li>
															<div class="title">Reports to:</div>
															<div class="text">
																<!--<div class="avatar-box">
																	<div class="avatar avatar-xs">
																		<img src="assets/images/avatar-16.jpg" alt="">
																	</div>
																</div>-->
																<a href="#">
																	{{$profile->report_to}}
																</a>
															</div>
														</li>
													</ul>
												</div>
											</div>
										</div>
                                    <div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card tab-box">
                    <div class="row user-tabs">
                        <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                            <ul class="nav nav-tabs nav-tabs-bottom">
                                <li class="nav-item"><a href="#emp_profile" data-toggle="tab" class="nav-link active">Profile</a></li>
                                <li class="nav-item"><a href="#emp_projects" data-toggle="tab" class="nav-link">Projects</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="tab-content">

                    <div id="emp_profile" class="pro-overview tab-pane fade show active">
                        <div class="row">
                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Personal Informations <a href="#" class="edit-icon" data-toggle="modal" data-target="#personal_info_modal"><i class="fa fa-pencil"></i></a><a href="#" style="margin-right: 10px;" class="edit-icon add-icon" data-toggle="modal" data-target="#add_personal_info_modal"><i class="fa fa-plus" aria-hidden="true"></i></a></h3>
                                        @if(!empty($getpresonalinformation))
										<ul class="personal-info">
                                            <li>
                                                <div class="title">Passport No.</div>
                                                <div class="text">{{$getpresonalinformation->passport_no}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Passport Exp Date.</div>
                                                <div class="text">{{$getpresonalinformation->passport_expiry_date}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Phone</div>
                                                <div class="text"><a href="tel:{{$getpresonalinformation->phone}}">{{$getpresonalinformation->phone}}</a></div>
                                            </li>
                                            <li>
                                                <div class="title">Nationality</div>
                                                <div class="text">{{$getpresonalinformation->nationality}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Marital status</div>
                                                <div class="text">{{$getpresonalinformation->marital_status}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Employment of spouse</div>
                                                <div class="text">{{$getpresonalinformation->spouse}}</div>
                                            </li>
                                            <li>
                                                <div class="title">No. of children</div>
                                                <div class="text">{{$getpresonalinformation->no_children}}</div>
                                            </li>
                                        </ul>
										@else
											Please Add Personal Informations			
										@endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Emergency Contact <a href="#" class="edit-icon" data-toggle="modal" data-target="#emergency_contact_modal"><i class="fa fa-pencil"></i></a><a href="#" style="margin-right: 10px;" class="edit-icon" data-toggle="modal" data-target="#add_emergency_contact_modal"><i class="fa fa-plus" aria-hidden="true"></i></a></h3>
                                        @if(!empty($getEmergencyConatct))
											<h5 class="section-title">Primary</h5>
											<ul class="personal-info">
												<li>
													<div class="title">Name</div>
													<div class="text">{{$getEmergencyConatct->primary_name}}</div>
												</li>
												<li>
													<div class="title">Relationship</div>
													<div class="text">{{$getEmergencyConatct->primary_relation}}</div>
												</li>
												<li>
													<div class="title">Phone </div>
													<div class="text">{{$getEmergencyConatct->primary_phone}}, {{$getEmergencyConatct->primary_phone2}}</div>
												</li>
											</ul>
											<hr>
											<h5 class="section-title">Secondary</h5>
											<ul class="personal-info">
												<li>
													<div class="title">Name</div>
													<div class="text">{{$getEmergencyConatct->secondary_name}}</div>
												</li>
												<li>
													<div class="title">Relationship</div>
													<div class="text">{{$getEmergencyConatct->secondary_relation}}</div>
												</li>
												<li>
													<div class="title">Phone </div>
													<div class="text">{{$getEmergencyConatct->secondary_phone}}, {{$getEmergencyConatct->secondary_phone2}}</div>
												</li>
											</ul>
										@else
											Please Add Emergency Contact Details
										@endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
										<h3 class="card-title">Bank information<small class="text-danger">(Admin Only)</small>  <a href="#" class="edit-icon" data-toggle="modal" data-target="#add_bank_info_modal"><i class="fa fa-plus" aria-hidden="true"></i></a></h3>
                                        <ul class="personal-info">
                                            @foreach($getbankinformation as $getbankinformations)
											<div class="delete bank_info" style="display: inline-block;"><a href="{{route('bank_details_destroy',$getbankinformations->id)}}" class="edit-icon"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
											<li>
                                                <div class="title">Account Holder Name</div>
                                                <div class="text">{{$getbankinformations->name}}</div>
                                            </li>
											<li>
                                                <div class="title">Account Number</div>
                                                <div class="text">{{$getbankinformations->account_number}}</div>
                                            </li>
                                            <li>
                                                <div class="title">IFSC Code</div>
                                                 <div class="text">{{$getbankinformations->ifsc_code}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Branch Name</div>
                                                <div class="text">{{$getbankinformations->branch_name}}</div>
                                            </li>
                                            <li>
                                                <div class="title">Bank Address</div>
                                                 <div class="text">{{$getbankinformations->bank_address}}</div>
                                            </li>
											
											@endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Family Informations <a href="#" class="edit-icon" data-toggle="modal" data-target="#family_info_modal"><i class="fa fa-plus" aria-hidden="true"></i></a></h3>
                                        <div class="table-responsive">
                                            <table class="table table-nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Relationship</th>
                                                        <th>Date of Birth</th>
                                                        <th>Phone</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($getFamilyInformation as $getFamilyInformations)
													<tr>
                                                        <td>{{$getFamilyInformations->name}}</td>
                                                        <td>{{$getFamilyInformations->relation}}</td>
														<td>{{$getFamilyInformations->date_birth}}</td>
														<td>{{$getFamilyInformations->phone}}</td>
														<td class="text-right">
															<div class="dropdown dropdown-action">
																<a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="fa fa-ellipsis-v"></i></a>
																<div class="dropdown-menu dropdown-menu-right">							
																	<a href="{{route('employeefamilydestroy',$getFamilyInformations->id)}}" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
                        <div class="row">
                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Education Informations <a href="#" class="edit-icon" data-toggle="modal" data-target="#education_info"><i class="fa fa-plus" aria-hidden="true"></i></a></h3>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                               @foreach($geteducationinformation as $geteducationinformations)
											<li>
												<div class="experience-user">
													<div class="before-circle"></div>
												</div>
												<div class="experience-content">
													<div class="timeline-content" style="display: inline-block;width: 90%;">
														<a href="#" class="name">{{$geteducationinformations->institue}}</a>
														<div>{{$geteducationinformations->subject}}</div>
														<span class="time">{{$geteducationinformations->education}}</span>
														<span class="time">{{$geteducationinformations->passing_year}}</span>
														<span class="time">{{$geteducationinformations->marks_obtained}}</span>
														<span class="time">{{$geteducationinformations->stream}}</span>
														<span class="time">{{$geteducationinformations->grade}}</span>
													</div>
													<div class="delete" style="display: inline-block;"><a href="{{route('employeeducationdestroy',$geteducationinformations->id)}}" class="edit-icon"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
												</div>
											</li>
											@endforeach
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Experience <a href="#" class="edit-icon" data-toggle="modal" data-target="#experience_info"><i class="fa fa-plus" aria-hidden="true"></i></a></h3>
                                        <div class="experience-box">
                                            <ul class="experience-list">
												@foreach($getexperiencemodel as $getexperiencemodels)
												<li>
													<div class="experience-user">
														<div class="before-circle"></div>
													</div>
													<div class="experience-content">
														<div class="timeline-content" style="display: inline-block;width: 90%;">
															<a href="#" class="name">{{$getexperiencemodels->position}} at {{$getexperiencemodels->company_name}}</a>
															<span class="time">{{$getexperiencemodels->add_experience}}</span>
															<span class="time">{{$getexperiencemodels->location}}</span>
														</div>
														<div class="delete" style="display: inline-block;"><a href="{{route('employeeexperiencedestroy',$getexperiencemodels->id)}}" class="edit-icon"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
													</div>
												</li>
												@endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="emp_projects">
                        <div class="row">
                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown profile-action">
                                            <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                        <h4 class="project-title"><a href="project-view.html">Office Management</a></h4>
                                        <small class="block text-ellipsis m-b-15">
<span class="text-xs">1</span> <span class="text-muted">open tasks, </span>
<span class="text-xs">9</span> <span class="text-muted">tasks completed</span>
</small>
                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. When an unknown printer took a galley of type and scrambled it...
                                        </p>
                                        <div class="pro-deadline m-b-15">
                                            <div class="sub-title">
                                                Deadline:
                                            </div>
                                            <div class="text-muted">
                                                17 Apr 2019
                                            </div>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Project Leader :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="" data-original-title="Jeffery Lalor"><img alt="" src="assets/images/avatar-16.jpg"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Team :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="" data-original-title="John Doe"><img alt="" src="assets/images/avatar-02.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="" data-original-title="Richard Miles"><img alt="" src="assets/images/avatar-09.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="" data-original-title="John Smith"><img alt="" src="assets/images/avatar-10.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="" data-original-title="Mike Litorus"><img alt="" src="assets/images/avatar-05.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                        <div class="progress progress-xs mb-0">
                                            <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown profile-action">
                                            <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                        <h4 class="project-title"><a href="project-view.html">Project Management</a></h4>
                                        <small class="block text-ellipsis m-b-15">
<span class="text-xs">2</span> <span class="text-muted">open tasks, </span>
<span class="text-xs">5</span> <span class="text-muted">tasks completed</span>
</small>
                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. When an unknown printer took a galley of type and scrambled it...
                                        </p>
                                        <div class="pro-deadline m-b-15">
                                            <div class="sub-title">
                                                Deadline:
                                            </div>
                                            <div class="text-muted">
                                                17 Apr 2019
                                            </div>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Project Leader :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="" data-original-title="Jeffery Lalor"><img alt="" src="assets/images/avatar-16.jpg"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Team :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="" data-original-title="John Doe"><img alt="" src="assets/images/avatar-02.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="" data-original-title="Richard Miles"><img alt="" src="assets/images/avatar-09.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="" data-original-title="John Smith"><img alt="" src="assets/images/avatar-10.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="" data-original-title="Mike Litorus"><img alt="" src="assets/images/avatar-05.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                        <div class="progress progress-xs mb-0">
                                            <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown profile-action">
                                            <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                        <h4 class="project-title"><a href="project-view.html">Video Calling App</a></h4>
                                        <small class="block text-ellipsis m-b-15">
<span class="text-xs">3</span> <span class="text-muted">open tasks, </span>
<span class="text-xs">3</span> <span class="text-muted">tasks completed</span>
</small>
                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. When an unknown printer took a galley of type and scrambled it...
                                        </p>
                                        <div class="pro-deadline m-b-15">
                                            <div class="sub-title">
                                                Deadline:
                                            </div>
                                            <div class="text-muted">
                                                17 Apr 2019
                                            </div>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Project Leader :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="" data-original-title="Jeffery Lalor"><img alt="" src="assets/images/avatar-16.jpg"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Team :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="" data-original-title="John Doe"><img alt="" src="assets/images/avatar-02.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="" data-original-title="Richard Miles"><img alt="" src="assets/images/avatar-09.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="" data-original-title="John Smith"><img alt="" src="assets/images/avatar-10.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="" data-original-title="Mike Litorus"><img alt="" src="assets/images/avatar-05.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                        <div class="progress progress-xs mb-0">
                                            <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown profile-action">
                                            <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a data-target="#edit_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a data-target="#delete_project" data-toggle="modal" href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                        <h4 class="project-title"><a href="project-view.html">Hospital Administration</a></h4>
                                        <small class="block text-ellipsis m-b-15">
<span class="text-xs">12</span> <span class="text-muted">open tasks, </span>
<span class="text-xs">4</span> <span class="text-muted">tasks completed</span>
</small>
                                        <p class="text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry. When an unknown printer took a galley of type and scrambled it...
                                        </p>
                                        <div class="pro-deadline m-b-15">
                                            <div class="sub-title">
                                                Deadline:
                                            </div>
                                            <div class="text-muted">
                                                17 Apr 2019
                                            </div>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Project Leader :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="" data-original-title="Jeffery Lalor"><img alt="" src="assets/images/avatar-16.jpg"></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="project-members m-b-15">
                                            <div>Team :</div>
                                            <ul class="team-members">
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="" data-original-title="John Doe"><img alt="" src="assets/images/avatar-02.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="" data-original-title="Richard Miles"><img alt="" src="assets/images/avatar-09.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="" data-original-title="John Smith"><img alt="" src="assets/images/avatar-10.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" data-toggle="tooltip" title="" data-original-title="Mike Litorus"><img alt="" src="assets/images/avatar-05.jpg"></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="all-users">+15</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
                                        <div class="progress progress-xs mb-0">
                                            <div style="width: 40%" title="" data-toggle="tooltip" role="progressbar" class="progress-bar bg-success" data-original-title="40%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
           

            <div id="profile_info" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Profile Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
							</button>
                        </div>
                        <div class="modal-body">
                        <form method="post" action="{{route('allemployeeprofileupdate',$profile->id)}}" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col-md-12">
								<div class="profile-img-wrap edit-img">
									<img class="inline-block" src="images/{{$profile->profile_pic}}" alt="user">
									<div class="fileupload btn">
										<span class="btn-text">edit</span>
										<input class="upload" type="file" name="profile_pic" id="profile_pic">
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>First Name</label>
											<input type="text" name="name" id="name" class="form-control" value="{{$profile->name}}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Last Name</label>
											<input type="text" name="last_name" id="last_name" class="form-control" value="{{$profile->last_name}}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Birth Date</label>
											<input class="form-control" name="birth_date" id="birth_date" type="date" value="{{$profile->birth_date}}">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Gender</label>
											<select class=" form-control" name="gender" id="gender" tabindex="-1" aria-hidden="true">
												<option value="{{$profile->gender}}">{{$profile->gender}}</option>
												<option value="Female">Female</option>
												<option value="Male">Male</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Address</label>
									<input type="text" name="address" id="address" class="form-control" value="{{$profile->address}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>State</label>
									<input type="text" name="state" id="state" class="form-control" value="{{$profile->state}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Country</label>
									<input type="text" name="country" id="country" class="form-control" value="{{$profile->country}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Pin Code</label>
									<input type="text" name="pin_code" id="pin_code" class="form-control" value="{{$profile->pin_code}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Phone Number</label>
									<input type="text" name="phone" id="phone" class="form-control" value="{{$profile->phone}}">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Department <span class="text-danger">*</span></label>
									<select class="form-control" name="department" id="department" tabindex="-1" aria-hidden="true">
										<option value="{{$profile->department}}">{{$profile->department}}</option>
										<option value="Web Development">Web Development</option>
										<option value="IT Management">IT Management</option>
										<option value="Marketing">Marketing</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Designation <span class="text-danger">*</span></label>
									<select class="form-control" name="designation" id="designation" tabindex="-1" aria-hidden="true">
										<option value="{{$profile->designation}}">{{$profile->designation}}</option>
										<option value="Web Designer">Web Designer</option>
										<option value="Web Developer">Web Developer</option>
										<option value="Android Developer">Android Developer</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Reports To <span class="text-danger">*</span></label>
									<select class="form-control" name="report_to" id="report_to" tabindex="-1" aria-hidden="true">
										<option value="{{$profile->report_to}}">{{$profile->report_to}}</option>
										<option value="Wilmer Deluna">Wilmer Deluna</option>
										<option value="Lesley Grauer">Lesley Grauer</option>
										<option value="Jeffery Lalor">Jeffery Lalor</option>
									</select>
								</div>
							</div>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn">Submit</button>
						</div>
					</form>
                        </div>
                    </div>
                </div>
            </div>

			
			<div id="add_personal_info_modal" class="modal custom-modal fade" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Personal Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
							</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('admin_add_personal_information')}}" method="post" id="addpersonal">
								@csrf
								<div class="row">
									<input type="hidden" class="form-control" name="uid" id="uid" value="{{$profile->uid}}">
									<div class="col-md-6">
										<div class="form-group">
											<label>Passport No <span class="text-danger">*</span></label>
											<input type="text" class="form-control" name="passport_no" id="passport_no" autocomplete="off">
											<span style="color:red">{{$errors->first('passport_no')}}</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Passport Expiry Date <span class="text-danger">*</span></label>
											<div class="">
												<input class="form-control" type="date" name="passport_expiry_date" id="passport_expiry_date" autocomplete="off">
												<span style="color:red">{{$errors->first('passport_expiry_date')}}</span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Phone <span class="text-danger">*</span></label>
											<input class="form-control" type="text" name="phone" id="phone" autocomplete="off">
											<span style="color:red">{{$errors->first('phone')}}</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Nationality <span class="text-danger">*</span></label>
											<input class="form-control" type="text" name="nationality" id="nationality">
											<span style="color:red">{{$errors->first('nationality')}}</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Marital status <span class="text-danger">*</span></label>
											<select class="form-control" tabindex="-1" aria-hidden="true" name="marital_status" id="marital_status">
												<option value="">-</option>
												<option value="Unmarried">Unmarried</option>
												<option value="Married">Married</option>
											</select>
											<span style="color:red">{{$errors->first('marital_status')}}</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group ifunmaried">
											<label>Employment of spouse</label>
											<input class="form-control" type="text" name="spouse" id="spouse">
											<span style="color:red">{{$errors->first('spouse')}}</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group ifunmaried">
											<label>No. of children </label>
											<input class="form-control" type="text" name="no_children" id="no_children">
											<span style="color:red">{{$errors->first('no_children')}}</span>
										</div>
									</div>
								</div>
								
								<div class="submit-section">
									<button class="btn btn-primary submit-btn">Submit</button>
								</div>
							</form>
                        </div>
                    </div>
                </div>
            </div>
			
			
            <div id="personal_info_modal" class="modal custom-modal fade" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Personal Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
                        </div>
                        <div class="modal-body">
                             @if(!empty($getpresonalinformation))
							<form action="{{route('employee_update_personal',$getpresonalinformation->id)}}" method="post">
								@csrf
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Passport No <span class="text-danger">*</span></label>
											<input type="text" class="form-control" name="passport_no" id="passport_no" value="{{$getpresonalinformation->passport_no}}">
											<span style="color:red">{{$errors->first('passport_no')}}</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Passport Expiry Date <span class="text-danger">*</span></label>
											<div class="">
												<input class="form-control" type="date" name="passport_expiry_date" id="passport_expiry_date" value="{{$getpresonalinformation->passport_expiry_date}}">
												<span style="color:red">{{$errors->first('passport_expiry_date')}}</span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Phone <span class="text-danger">*</span></label>
											<input class="form-control" type="text" name="phone" id="phone" value="{{$getpresonalinformation->phone}}">
											<span style="color:red">{{$errors->first('phone')}}</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Nationality <span class="text-danger">*</span></label>
											<input class="form-control" type="text" name="nationality" id="nationality" value="{{$getpresonalinformation->nationality}}">
											<span style="color:red">{{$errors->first('nationality')}}</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Marital status <span class="text-danger">*</span></label>
											<select class="form-control" tabindex="-1" aria-hidden="true" name="edit_marital_status" id="edit_marital_status">
												<option value="{{$getpresonalinformation->marital_status}}">{{$getpresonalinformation->marital_status}}</option>
												<option value="Unmarried">Unmarried</option>
												<option value="Married">Married</option>
											</select>
											<span style="color:red">{{$errors->first('marital_status')}}</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group edit_ifunmaried">
											<label>Employment of spouse</label>
											<input class="form-control" type="text" name="spouse" id="spouse" value="{{$getpresonalinformation->spouse}}">
											<span style="color:red">{{$errors->first('spouse')}}</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group edit_ifunmaried">
											<label>No. of children </label>
											<input class="form-control" type="text" name="no_children" id="no_children" value="{{$getpresonalinformation->no_children}}">
											<span style="color:red">{{$errors->first('no_children')}}</span>
										</div>
									</div>
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn">Submit</button>
								</div>
							</form>
							@else
								Please Add Personal Informations	
							@endif
                        </div>
                    </div>
                </div>
            </div>


            <div id="add_bank_info_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Bank Informations</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
							</button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{route('addemployeebank')}}" id="add_bank">
								@csrf
								<div class="form-scroll">
									<div class="card">
										<div class="card-body">
											<h3 class="card-title">Bank Informations </h3>
											<div class="row">
												<input type="hidden" class="form-control" name="uid" id="uid" value="{{$profile->uid}}">
												<div class="col-md-6">
													<div class="form-group">
														<label>Account holder name <span class="text-danger">*</span></label>
														<input class="form-control" type="text" name="name" id="name">
														<span style="color:red">{{$errors->first('name')}}</span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Account Number <span class="text-danger">*</span></label>
														<input class="form-control" type="text" name="account_number" id="account_number">
														<span style="color:red">{{$errors->first('account_number')}}</span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>IFSC Code <span class="text-danger">*</span></label>
														<input class="form-control" type="text" name="ifsc_code" id="ifsc_code">
														<span style="color:red">{{$errors->first('ifsc_code')}}</span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Branch Name <span class="text-danger">*</span></label>
														<input class="form-control" type="text" name="branch_name" id="branch_name">
														<span style="color:red">{{$errors->first('branch_name')}}</span>
													</div>
												</div>
												<div class="col-md-12">
													<div class="form-group">
														<label>Bank Address <span class="text-danger">*</span></label>
														<textarea class="form-control valid" id="bank_address" name="bank_address" rows="3"></textarea>
														<span style="color:red">{{$errors->first('bank_address')}}</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn">Submit</button>
								</div>
							</form>
                        </div>
                    </div>
                </div>
            </div>
			
			
			
			<div id="family_info_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Family Informations</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
							</button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{route('addemployeefamilymember')}}" id="add_family">
								@csrf
								<div class="form-scroll">
									<div class="card">
										<div class="card-body">
											<h3 class="card-title">Family Member </h3>
											<div class="row">
												<input type="hidden" class="form-control" name="uid" id="uid" value="{{$profile->uid}}">
												<div class="col-md-6">
													<div class="form-group">
														<label>Name <span class="text-danger">*</span></label>
														<input class="form-control" type="text" name="name" id="name">
														<span style="color:red">{{$errors->first('name')}}</span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Relationship <span class="text-danger">*</span></label>
														<input class="form-control" type="text" name="relation" id="relation">
														<span style="color:red">{{$errors->first('relation')}}</span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Date of birth <span class="text-danger">*</span></label>
														<input class="form-control" type="date" name="date_birth" id="date_birth">
														<span style="color:red">{{$errors->first('date_birth')}}</span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Phone <span class="text-danger">*</span></label>
														<input class="form-control" type="text" name="phone" id="phone">
														<span style="color:red">{{$errors->first('phone')}}</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn">Submit</button>
								</div>
							</form>
                        </div>
                    </div>
                </div>
            </div>

			
			<div id="add_emergency_contact_modal" class="modal custom-modal fade" role="dialog">
				<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Add Emergency Contact</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="{{route('add_employee_emgen_contact')}}" method="post" id="add_emergency">
								@csrf
								<div class="card">
									<div class="card-body">
										<h3 class="card-title">Primary Contact Person</h3>
										<div class="row">
											<input type="hidden" class="form-control" name="uid" id="uid" value="{{$profile->uid}}">
											<div class="col-md-6">
												<div class="form-group">
													<label>Name <span class="text-danger">*</span></label>
													<input type="text" class="form-control" name="primary_name" id="primary_name">
													<span style="color:red;">{{$errors->first('primary_name')}}</span>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Relationship <span class="text-danger">*</span></label>
													<input class="form-control" type="text" name="primary_relation" id="primary_relation">
													<span style="color:red;">{{$errors->first('primary_relation')}}</span>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Phone <span class="text-danger">*</span></label>
													<input class="form-control" type="text" name="primary_phone" id="primary_phone">
													<span style="color:red;">{{$errors->first('primary_phone')}}</span>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Phone 2(optional)</label>
													<input class="form-control" type="text" name="primary_phone2" id="primary_phone2">
													<span style="color:red;">{{$errors->first('primary_phone2')}}</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-body">
										<h3 class="card-title">Secondary Contact Person</h3>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Name <span class="text-danger">*</span></label>
													<input type="text" class="form-control" name="secondary_name" id="secondary_name">
													<span style="color:red;">{{$errors->first('secondary_name')}}</span>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Relationship <span class="text-danger">*</span></label>
													<input class="form-control" type="text" name="secondary_relation" id="secondary_relation">
													<span style="color:red;">{{$errors->first('secondary_relation')}}</span>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Phone <span class="text-danger">*</span></label>
													<input class="form-control" type="text" name="secondary_phone" id="secondary_phone">
													<span style="color:red;">{{$errors->first('secondary_phone')}}</span>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Phone 2(optional)</label>
													<input class="form-control" type="text" name="secondary_phone2" id="secondary_phone2">
													<span style="color:red;">{{$errors->first('secondary_phone2')}}</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn">Submit</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			
			
			
            <div id="emergency_contact_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Personal Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
							</button>
                        </div>
                        <div class="modal-body">
                            @if(!empty($getEmergencyConatct))
								<form action="{{route('update_employee_emgen_contact',$getEmergencyConatct->id)}}" method="post" id="update_emergency">
									@csrf
									<div class="card">
										<div class="card-body">
											<h3 class="card-title">Primary Contact Person</h3>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Name <span class="text-danger">*</span></label>
														<input type="text" class="form-control" name="primary_name" id="primary_name" value="{{$getEmergencyConatct->primary_name}}">
														<span style="color:red;">{{$errors->first('primary_name')}}</span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Relationship <span class="text-danger">*</span></label>
														<input class="form-control" type="text" name="primary_relation" id="primary_relation" value="{{$getEmergencyConatct->primary_relation}}">
														<span style="color:red;">{{$errors->first('primary_relation')}}</span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Phone <span class="text-danger">*</span></label>
														<input class="form-control" type="text" name="primary_phone" id="primary_phone" value="{{$getEmergencyConatct->primary_phone}}">
														<span style="color:red;">{{$errors->first('primary_phone')}}</span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Phone 2(optional)</label>
														<input class="form-control" type="text" name="primary_phone2" id="primary_phone2" value="{{$getEmergencyConatct->primary_phone2}}">
														<span style="color:red;">{{$errors->first('primary_phone2')}}</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="card">
										<div class="card-body">
											<h3 class="card-title">Secondary Contact Person</h3>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Name <span class="text-danger">*</span></label>
														<input type="text" class="form-control" name="secondary_name" id="secondary_name" value="{{$getEmergencyConatct->secondary_name}}">
														<span style="color:red;">{{$errors->first('secondary_name')}}</span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Relationship <span class="text-danger">*</span></label>
														<input class="form-control" type="text" name="secondary_relation" id="secondary_relation" value="{{$getEmergencyConatct->secondary_relation}}">
														<span style="color:red;">{{$errors->first('secondary_relation')}}</span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Phone <span class="text-danger">*</span></label>
														<input class="form-control" type="text" name="secondary_phone" id="secondary_phone" value="{{$getEmergencyConatct->secondary_phone}}">
														<span style="color:red;">{{$errors->first('secondary_phone')}}</span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Phone 2(optional)</label>
														<input class="form-control" type="text" name="secondary_phone2" id="secondary_phone2" value="{{$getEmergencyConatct->secondary_phone2}}">
														<span style="color:red;">{{$errors->first('secondary_phone2')}}</span>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="submit-section">
										<button class="btn btn-primary submit-btn">Submit</button>
									</div>
								</form>
							@else
								Please Add Emergency Contact Details	
							@endif				
                        </div>
                    </div>
                </div>
            </div>


            <div id="education_info" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> Education Informations</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
							</button>
                        </div>
                        <div class="modal-body">
                           <form method="post" action="{{route('addeemployeeducation')}}" id="add_education">
								@csrf
								<div class="form-scroll">
									<div class="card">
										<div class="card-body">
											<h3 class="card-title">Education Informations </h3>
											<div class="row">
												<input type="hidden" class="form-control" name="uid" id="uid" value="{{$profile->uid}}">
												<div class="col-md-6">
													<div class="form-group">
														<label class="focus-label">Institution/Board/University <span class="text-danger">*</span></label>
														<input type="text" class="form-control" name="institue[]" id="institue">
													</div>
													<span style="color:red">{{$errors->first('institue')}}</span>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="focus-label">Education <span class="text-danger">*</span></label>
														<input type="text" class="form-control" name="education[]" id="education">					
													</div>
													<span style="color:red">{{$errors->first('education')}}</span>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="focus-label">Passing Year <span class="text-danger">*</span></label>
														<input type="text" class="form-control" name="passing_year[]" id="passing_year">										
													</div>
													<span style="color:red">{{$errors->first('passing_year')}}</span>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="focus-label">Marks Obtained <span class="text-danger">*</span></label>
														<input type="text" class="form-control" name="marks_obtained[]" id="marks_obtained">
													</div>
													<span style="color:red">{{$errors->first('marks_obtained')}}</span>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="focus-label">Stream <span class="text-danger">*</span></label>
														<input type="text" class="form-control" name="stream[]" id="stream">
													</div>
													<span style="color:red">{{$errors->first('stream')}}</span>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="focus-label">Grade <span class="text-danger">*</span></label>
														<input type="text" class="form-control" name="grade[]" id="grade">							
													</div>
													<span style="color:red">{{$errors->first('grade')}}</span>
												</div>
											</div>
											<div class="add_extra_field">
											</div>
											<a href="#" class="add_more"><i class="fa fa-plus" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn">Submit</button>
								</div>
							</form>
                        </div>
                    </div>
                </div>
            </div>


            <div id="experience_info" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Experience Informations</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
							</button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{route('addemployeeexperience')}}" id="add_exp">
								@csrf
								<div class="form-scroll">
									<div class="card">
										<div class="card-body">
											<h3 class="card-title">Experience Informations</h3>
											<div class="row">
												<input type="hidden" class="form-control" name="uid" id="uid" value="{{$profile->uid}}">
												<div class="col-md-6">
													<div class="form-group">
														<label class="focus-label">Company Name <span class="text-danger">*</span></label>
														<input type="text" class="form-control" name="company_name[]" id="company_name">
													</div>
													<span style="color:red">{{$errors->first('company_name')}}</span>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="focus-label">Job Position <span class="text-danger">*</span></label>
														<input type="text" class="form-control" name="position[]" id="position">
													</div>
													<span style="color:red">{{$errors->first('position')}}</span>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="focus-label">Add Experience <span class="text-danger">*</span></label>
														<input type="text" class="form-control" name="add_experience[]" id="add_experience">
													</div>
													<span style="color:red">{{$errors->first('add_experience')}}</span>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="focus-label">Location <span class="text-danger">*</span></label>
														<textarea class="form-control" name="location[]" id="location" rows="2" cols="5"></textarea>
													</div>
													<span style="color:red">{{$errors->first('location')}}</span>
												</div>
											</div>
											<div class="add_more_field"></div>
											<a href="#" class="add_more_experience"><i class="fa fa-plus" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
								<div class="submit-section">
									<button class="btn btn-primary submit-btn">Submit</button>
								</div>
							</form>
                        </div>
                    </div>
                </div>
            </div>
     
@endsection