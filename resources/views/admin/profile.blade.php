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
				@if(session()->has('admin_update_personal'))
					<div class="alert alert-success">
						{{ session()->get('admin_update_personal')}}
					</div>
				@endif
				@if(session()->has('admin_add_emergency_contact'))
					<div class="alert alert-success">
						{{ session()->get('admin_add_emergency_contact')}}
					</div>
				@endif
				@if(session()->has('admin_personal_information'))
					<div class="alert alert-success">
						{{ session()->get('admin_personal_information')}}
					</div>
				@endif
				
				
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Profile</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
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
														<div class="small doj text-muted">Date of Join : {{$profile->created_at}}</div>
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
														<li>
															<div class="title">Address:</div>
															<div class="text">{{$profile->address}}</div>
														</li>
														<li>
															<div class="title">Gender:</div>
															<div class="text">{{$profile->gender}}</div>
														</li>
														<!--<li>
															<div class="title">Reports to:</div>
															<div class="text">
																<div class="avatar-box">
																	<div class="avatar avatar-xs">
																		<img src="assets/images/avatar-16.jpg" alt="">
																	</div>
																</div>
																<a href="#">
																	{{$profile->report_to}}
																</a>
															</div>
														</li>-->
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
                                        
										@if(!empty($adminPersonalInformation))
										<ul class="personal-info">
											<li>
												<div class="title">Passport No.</div>
												<div class="text">{{$adminPersonalInformation->passport_no}}</div>
											</li>
											<li>
												<div class="title">Passport Exp Date.</div>
												<div class="text">{{$adminPersonalInformation->passport_expiry_date	}}</div>
											</li>
											<li>
												<div class="title">Phone</div>
												<div class="text"><a href="tel:{{$adminPersonalInformation->phone}}">{{$adminPersonalInformation->phone}}</a></div>
											</li>
											<li>
												<div class="title">Nationality</div>
												<div class="text">{{$adminPersonalInformation->nationality}}</div>
											</li>
											<li>
												<div class="title">Marital status</div>
												<div class="text">{{$adminPersonalInformation->marital_status}}</div>
											</li>
											<li>
												<div class="title">Employment of spouse</div>
												<div class="text">{{$adminPersonalInformation->spouse}}</div>
											</li>
											<li>
												<div class="title">No. of children</div>
												<div class="text">{{$adminPersonalInformation->no_children}}</div>
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
                                        <h3 class="card-title">Emergency Contact <a href="#" style="margin-right: 10px;" class="edit-icon" data-toggle="modal" data-target="#add_emergency_contact_modal"><i class="fa fa-plus" aria-hidden="true"></i></a></h3>
                                        
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
                       <!-- <div class="row">
                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Bank information</h3>
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Bank name</div>
                                                <div class="text">ICICI Bank</div>
                                            </li>
                                            <li>
                                                <div class="title">Bank account No.</div>
                                                <div class="text">159843014641</div>
                                            </li>
                                            <li>
                                                <div class="title">IFSC Code</div>
                                                <div class="text">ICI24504</div>
                                            </li>
                                            <li>
                                                <div class="title">PAN No</div>
                                                <div class="text">TC000Y56</div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Family Informations <a href="#" class="edit-icon" data-toggle="modal" data-target="#family_info_modal"><i class="fa fa-pencil"></i></a></h3>
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
                                                    <tr>
                                                        <td>Leo</td>
                                                        <td>Brother</td>
                                                        <td>Feb 16th, 2019</td>
                                                        <td>9876543210</td>
                                                        <td class="text-right">
                                                            <div class="dropdown dropdown-action">
                                                                <a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="fa fa-ellipsis-v"></i></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a href="#" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                                    <a href="#" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
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
                                        <h3 class="card-title">Education Informations <a href="#" class="edit-icon" data-toggle="modal" data-target="#education_info"><i class="fa fa-pencil"></i></a></h3>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#" class="name">International College of Arts and Science (UG)</a>
                                                            <div>Bsc Computer Science</div>
                                                            <span class="time">2000 - 2003</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#" class="name">International College of Arts and Science (PG)</a>
                                                            <div>Msc Computer Science</div>
                                                            <span class="time">2000 - 2003</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex">
                                <div class="card profile-box flex-fill">
                                    <div class="card-body">
                                        <h3 class="card-title">Experience <a href="#" class="edit-icon" data-toggle="modal" data-target="#experience_info"><i class="fa fa-pencil"></i></a></h3>
                                        <div class="experience-box">
                                            <ul class="experience-list">
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#" class="name">Web Designer at Zen Corporation</a>
                                                            <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#" class="name">Web Designer at Ron-tech</a>
                                                            <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="experience-user">
                                                        <div class="before-circle"></div>
                                                    </div>
                                                    <div class="experience-content">
                                                        <div class="timeline-content">
                                                            <a href="#" class="name">Web Designer at Dalt Technology</a>
                                                            <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->
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
					<form method="post" action="{{route('profileupdate',$profile->id)}}" enctype="multipart/form-data">
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
							<!--<div class="col-md-6">
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
							</div>-->
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
                            @if(!empty($adminPersonalInformation))
							<form action="{{route('admin_update_personal',$adminPersonalInformation->id)}}" method="post">
								@csrf
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Passport No</label>
											<input type="text" class="form-control" name="passport_no" id="passport_no" value="{{$adminPersonalInformation->passport_no}}">
											<span style="color:red">{{$errors->first('passport_no')}}</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Passport Expiry Date</label>
											<div class="">
												<input class="form-control" type="date" name="passport_expiry_date" id="passport_expiry_date" value="{{$adminPersonalInformation->passport_expiry_date}}">
												<span style="color:red">{{$errors->first('passport_expiry_date')}}</span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Phone</label>
											<input class="form-control" type="text" name="phone" id="phone" value="{{$adminPersonalInformation->phone}}">
											<span style="color:red">{{$errors->first('phone')}}</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Nationality <span class="text-danger">*</span></label>
											<input class="form-control" type="text" name="nationality" id="nationality" value="{{$adminPersonalInformation->nationality}}">
											<span style="color:red">{{$errors->first('nationality')}}</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Marital status <span class="text-danger">*</span></label>
											<select class="form-control" tabindex="-1" aria-hidden="true" name="edit_marital_status" id="edit_marital_status">
												<option value="{{$adminPersonalInformation->marital_status}}">{{$adminPersonalInformation->marital_status}}</option>
												<option value="Unmarried">Unmarried</option>
												<option value="Married">Married</option>
											</select>
											<span style="color:red">{{$errors->first('edit_marital_status')}}</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group edit_ifunmaried">
											<label>Employment of spouse</label>
											<input class="form-control" type="text" name="spouse" id="spouse" value="{{$adminPersonalInformation->spouse}}">
											<span style="color:red">{{$errors->first('spouse')}}</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group edit_ifunmaried">
											<label>No. of children </label>
											<input class="form-control" type="text" name="no_children" id="no_children" value="{{$adminPersonalInformation->no_children}}">
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
                            <form action="{{route('admin_personal_information')}}" method="post" id="addpersonal">
								@csrf
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Passport No <span class="text-danger">*</span></label>
											<input type="text" class="form-control" name="passport_no" id="passport_no">
											<span style="color:red">{{$errors->first('passport_no')}}</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Passport Expiry Date <span class="text-danger">*</span></label>
											<div class="">
												<input class="form-control" type="date" name="passport_expiry_date" id="passport_expiry_date">
												<span style="color:red">{{$errors->first('passport_expiry_date')}}</span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Phone <span class="text-danger">*</span></label>
											<input class="form-control" type="text" name="phone" id="phone">
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
									<div class="col-md-6 ifunmaried">
										<div class="form-group">
											<label>Employment of spouse</label>
											<input class="form-control" type="text" name="spouse" id="spouse">
											<span style="color:red">{{$errors->first('spouse')}}</span>
										</div>
									</div>
									<div class="col-md-6 ifunmaried">
										<div class="form-group">
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


            <!--<div id="family_info_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> Family Informations</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
							</button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-scroll">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Family Member <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Name <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Relationship <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Date of birth <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="date">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Name <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Relationship <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Date of birth <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="date">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone <span class="text-danger">*</span></label>
                                                        <input class="form-control" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-more">
                                                <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
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
            </div>-->

			
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
                            <form action="{{route('admin_add_emergency_contact')}}" method="post" id="add_emergency">
								@csrf
								<div class="card">
									<div class="card-body">
										<h3 class="card-title">Primary Contact Person</h3>
										<div class="row">
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
			
           <!-- <div id="emergency_contact_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Personal Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
							</button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Primary Contact</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Relationship <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone 2</label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="card-title">Primary Contact</h3>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Relationship <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone <span class="text-danger">*</span></label>
                                                    <input class="form-control" type="text">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Phone 2</label>
                                                    <input class="form-control" type="text">
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
                            <form>
                                <div class="form-scroll">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="Oxford University" class="form-control floating">
                                                        <label class="focus-label">Institution</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="Computer Science" class="form-control floating">
                                                        <label class="focus-label">Subject</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <div class="">
                                                            <input type="date" value="01/06/2002" class="form-control">
                                                        </div>
                                                        <label class="focus-label">Starting Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <div class="">
                                                            <input type="date" value="31/05/2006" class="form-control floating">
                                                        </div>
                                                        <label class="focus-label">Complete Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="BE Computer Science" class="form-control floating">
                                                        <label class="focus-label">Degree</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="Grade A" class="form-control floating">
                                                        <label class="focus-label">Grade</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="Oxford University" class="form-control floating">
                                                        <label class="focus-label">Institution</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="Computer Science" class="form-control floating">
                                                        <label class="focus-label">Subject</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <div class="">
                                                            <input type="date" value="01/06/2002" class="form-control floating">
                                                        </div>
                                                        <label class="focus-label">Starting Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <div class="">
                                                            <input type="date" value="31/05/2006" class="form-control floating">
                                                        </div>
                                                        <label class="focus-label">Complete Date</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="BE Computer Science" class="form-control floating">
                                                        <label class="focus-label">Degree</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" value="Grade A" class="form-control floating">
                                                        <label class="focus-label">Grade</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-more">
                                                <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
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


            <div id="experience_info" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Experience Informations</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
							</button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-scroll">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Experience Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" class="form-control floating" value="Digital Devlopment Inc">
                                                        <label class="focus-label">Company Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" class="form-control floating" value="United States">
                                                        <label class="focus-label">Location</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" class="form-control floating" value="Web Developer">
                                                        <label class="focus-label">Job Position</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <div class="">
                                                            <input type="date" class="form-control floating" value="01/07/2007">
                                                        </div>
                                                        <label class="focus-label">Period From</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <div class="">
                                                            <input type="date" class="form-control floating" value="08/06/2018">
                                                        </div>
                                                        <label class="focus-label">Period To</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="card-title">Experience Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" class="form-control floating" value="Digital Devlopment Inc">
                                                        <label class="focus-label">Company Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" class="form-control floating" value="United States">
                                                        <label class="focus-label">Location</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus focused">
                                                        <input type="text" class="form-control floating" value="Web Developer">
                                                        <label class="focus-label">Job Position</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <div class="">
                                                            <input type="date" class="form-control floating" value="01/07/2007">
                                                        </div>
                                                        <label class="focus-label">Period From</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-focus">
                                                        <div class="">
                                                            <input type="date" class="form-control floating" value="08/06/2018">
                                                        </div>
                                                        <label class="focus-label">Period To</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-more">
                                                <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
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
            </div>-->
@endsection