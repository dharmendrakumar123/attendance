@extends('employeelayouts.admin')
@section('content')
		
		@if(session()->has('update_profile'))
			<div class="alert alert-success">
				{{ session()->get('update_profile') }}
			</div>
		@endif
		@if(session()->has('add_Personal_Information'))
			<div class="alert alert-success">
				{{ session()->get('add_Personal_Information') }}
			</div>
		@endif
		@if(session()->has('update_personal_information'))
			<div class="alert alert-success">
				{{ session()->get('update_personal_information') }}
			</div>
		@endif
		@if(session()->has('add_emgen_contact'))
			<div class="alert alert-success">
				{{ session()->get('add_emgen_contact') }}
			</div>
		@endif
		@if(session()->has('update_emgen_contact'))
			<div class="alert alert-success">
				{{ session()->get('update_emgen_contact') }}
			</div>
		@endif
		@if(session()->has('addfamilymember'))
			<div class="alert alert-success">
				{{ session()->get('addfamilymember') }}
			</div>
		@endif
		@if(session()->has('familydestroy'))
			<div class="alert alert-success">
				{{ session()->get('familydestroy') }}
			</div>
		@endif
		
		@if(session()->has('updatefamilymember'))
			<div class="alert alert-success">
				{{ session()->get('updatefamilymember') }}
			</div>
		@endif
		
		@if(session()->has('addeducation'))
			<div class="alert alert-success">
				{{ session()->get('addeducation') }}
			</div>
		@endif
		
		@if(session()->has('educationdestroy'))
			<div class="alert alert-success">
				{{ session()->get('educationdestroy') }}
			</div>
		@endif	
		@if(session()->has('addexperience'))
			<div class="alert alert-success">
				{{ session()->get('addexperience') }}
			</div>
		@endif
		@if(session()->has('experiencedestroy'))
			<div class="alert alert-success">
				{{ session()->get('experiencedestroy') }}
			</div>
		@endif
		
		
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Profile</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('employee_dashboard')}}">Dashboard</a></li>
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
												<div class="text">@if($profile->birth_date){{$profile->birth_date}} @else empty @endif</div>
											</li>
											<li>
												<div class="title">Address:</div>
												<div class="text">@if($profile->address){{$profile->address}}@else empty @endif</div>
											</li>
											<li>
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
														@if($profile->report_to){{$profile->report_to}} @else empty @endif
													</a>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<!--<div class="pro-edit"><a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#"><i class="fa fa-pencil"></i></a></div>-->
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
								@if(!empty($PersonalInformation))
								<ul class="personal-info">
									<li>
										<div class="title">Passport No.</div>
										<div class="text">{{$PersonalInformation->passport_no}}</div>
									</li>
									<li>
										<div class="title">Passport Exp Date.</div>
										<div class="text">{{$PersonalInformation->passport_expiry_date	}}</div>
									</li>
									<li>
										<div class="title">Phone</div>
										<div class="text"><a href="tel:{{$PersonalInformation->phone}}">{{$PersonalInformation->phone}}</a></div>
									</li>
									<li>
										<div class="title">Nationality</div>
										<div class="text">{{$PersonalInformation->nationality}}</div>
									</li>
									<!--<li>
										<div class="title">Religion</div>
										<div class="text">{{$PersonalInformation->religion}}</div>
									</li>-->
									<li>
										<div class="title">Marital status</div>
										<div class="text">{{$PersonalInformation->marital_status}}</div>
									</li>
									<li>
										<div class="title">Employment of spouse</div>
										<div class="text">
											@if($PersonalInformation->marital_status =="Married")
												{{$PersonalInformation->spouse}}
											@endif
										</div>
									</li>
									<li>
										<div class="title">No. of children</div>
										<div class="text">
											@if($PersonalInformation->marital_status =="Married")
												{{$PersonalInformation->no_children}}
											@endif
										</div>
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
								@if(!empty($EmergencyConatct))
								<h5 class="section-title">Primary</h5>
								<ul class="personal-info">
									<li>
										<div class="title">Name</div>
										<div class="text">{{$EmergencyConatct->primary_name}}</div>
									</li>
									<li>
										<div class="title">Relationship</div>
										<div class="text">{{$EmergencyConatct->primary_relation}}</div>
									</li>
									<li>
										<div class="title">Phone </div>
										<div class="text">{{$EmergencyConatct->primary_phone}}, {{$EmergencyConatct->primary_phone2}}</div>
									</li>
								</ul>
								<hr>
								<h5 class="section-title">Secondary</h5>
								<ul class="personal-info">
									<li>
										<div class="title">Name</div>
										<div class="text">{{$EmergencyConatct->secondary_name}}</div>
									</li>
									<li>
										<div class="title">Relationship</div>
										<div class="text">{{$EmergencyConatct->secondary_relation}}</div>
									</li>
									<li>
										<div class="title">Phone </div>
										<div class="text">{{$EmergencyConatct->secondary_phone}}, {{$EmergencyConatct->secondary_phone2}}</div>
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
								<h3 class="card-title">Bank information<small class="text-danger">(Admin Only)</small></h3>
								<ul class="personal-info">
									 @foreach($getbankinformation as $getbankinformations)
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
								<h3 class="card-title">Family Informations <!--<a href="#" class="edit-icon" data-toggle="modal" data-target="#update_family_info_modal"><i class="fa fa-pencil"></i></a>-->
								<a href="#" style="margin-right: 10px;" class="edit-icon" data-toggle="modal" data-target="#add_family_info_modal"><i class="fa fa-plus" aria-hidden="true"></i></a></h3>
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
											
											@foreach($FamilyInformation as $FamilyInformations)
											<tr>
												<td>{{$FamilyInformations->name}}</td>
												<td>{{$FamilyInformations->relation}}</td>
												<td>{{$FamilyInformations->date_birth}}</td>
												<td>{{$FamilyInformations->phone}}</td>
												<td class="text-right">
													<div class="dropdown dropdown-action">
														<a aria-expanded="false" data-toggle="dropdown" class="action-icon dropdown-toggle" href="#"><i class="fa fa-ellipsis-v"></i></a>
														<div class="dropdown-menu dropdown-menu-right">
															<a href="{{route('editfamliy',$FamilyInformations->id)}}" class="dropdown-item"><i class="fa fa-pencil m-r-5"></i> Edit</a>
															<a href="{{route('familydestroy',$FamilyInformations->id)}}" class="dropdown-item"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
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
										@foreach($educationinformation as $educationinformations)
										<li>
											<div class="experience-user">
												<div class="before-circle"></div>
											</div>
											<div class="experience-content">
												<div class="timeline-content" style="display: inline-block;width: 90%;">
													<a href="#" class="name">{{$educationinformations->institue}}</a>
													<div>{{$educationinformations->subject}}</div>
													<span class="time">{{$educationinformations->education}}</span>
													<span class="time">{{$educationinformations->passing_year}}</span>
													<span class="time">{{$educationinformations->marks_obtained}}</span>
													<span class="time">{{$educationinformations->stream}}</span>
													<span class="time">{{$educationinformations->grade}}</span>
												</div>
												<div class="delete" style="display: inline-block;"><a href="{{route('educationdestroy',$educationinformations->id)}}" class="edit-icon"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
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
										@foreach($ExperienceModel as $ExperienceModels)
										<li>
											<div class="experience-user">
												<div class="before-circle"></div>
											</div>
											<div class="experience-content">
												<div class="timeline-content" style="display: inline-block;width: 90%;">
													<a href="#" class="name">{{$ExperienceModels->position}} at {{$ExperienceModels->company_name}}</a>
													<span class="time">{{$ExperienceModels->add_experience}}</span>
													<span class="time">{{$ExperienceModels->location}}</span>
												</div>
												<div class="delete" style="display: inline-block;"><a href="{{route('experiencedestroy',$ExperienceModels->id)}}" class="edit-icon"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
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
					<form action="{{route('add_personal_information')}}" method="post" id="addpersonal">
						@csrf
						<div class="row">
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
							<!--<div class="col-md-6">
								<div class="form-group">
									<label>Religion</label>
									<div class="">
										<input class="form-control" type="text" name="religion" id="religion">
										<span style="color:red">{{$errors->first('religion')}}</span>
									</div>
								</div>
							</div>-->
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
					@if(!empty($PersonalInformation))
					
				
				<form action="{{route('update_personal_information',$PersonalInformation->id)}}" method="post">
						@csrf
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Passport No <span class="text-danger">*</span></label>
									<input type="text" class="form-control" name="passport_no" id="passport_no" value="{{$PersonalInformation->passport_no}}">
									<span style="color:red">{{$errors->first('passport_no')}}</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Passport Expiry Date <span class="text-danger">*</span></label>
									<div class="">
										<input class="form-control" type="date" name="passport_expiry_date" id="passport_expiry_date" value="{{$PersonalInformation->passport_expiry_date}}">
										<span style="color:red">{{$errors->first('passport_expiry_date')}}</span>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Phone <span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="phone" id="phone" value="{{$PersonalInformation->phone}}">
									<span style="color:red">{{$errors->first('phone')}}</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Nationality <span class="text-danger">*</span></label>
									<input class="form-control" type="text" name="nationality" id="nationality" value="{{$PersonalInformation->nationality}}">
									<span style="color:red">{{$errors->first('nationality')}}</span>
								</div>
							</div>
							<!--<div class="col-md-6">
								<div class="form-group">
									<label>Religion</label>
									<div class="">
										<input class="form-control" type="text" name="religion" id="religion" value="{{$PersonalInformation->religion}}">
										<span style="color:red">{{$errors->first('religion')}}</span>
									</div>
								</div>
							</div>-->
							<div class="col-md-6">
								<div class="form-group">
									<label>Marital status <span class="text-danger">*</span></label>
									<select class="form-control" tabindex="-1" aria-hidden="true" name="edit_marital_status" id="edit_marital_status">
										<option value="{{$PersonalInformation->marital_status}}">{{$PersonalInformation->marital_status}}</option>
										<option value="Unmarried">Unmarried</option>
										<option value="Married">Married</option>
									</select>
									<span style="color:red">{{$errors->first('marital_status')}}</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group edit_ifunmaried">
									<label>Employment of spouse</label>
									<input class="form-control" type="text" name="spouse" id="spouse" value="{{$PersonalInformation->spouse}}">
									<span style="color:red">{{$errors->first('spouse')}}</span>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group edit_ifunmaried">
									<label>No. of children </label>
									<input class="form-control" type="text" name="no_children" id="no_children" value="{{$PersonalInformation->no_children}}">
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
	


	<div id="add_family_info_modal" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Family Informations</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="{{route('addfamilymember')}}" id="add_family">
						@csrf
						<div class="form-scroll">
							<div class="card">
								<div class="card-body">
									<h3 class="card-title">Family Member </h3>
									<div class="row">
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
					<form action="{{route('add_emgen_contact')}}" method="post" id="add_emergency">
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
	
	
	
	<div id="emergency_contact_modal" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Update Emergency Contact</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					@if(!empty($EmergencyConatct))
					<form action="{{route('update_emgen_contact',$EmergencyConatct->id)}}" method="post" id="update_emergency">
						@csrf
						<div class="card">
							<div class="card-body">
								<h3 class="card-title">Primary Contact</h3>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Name <span class="text-danger">*</span></label>
											<input type="text" class="form-control" name="primary_name" id="primary_name" value="{{$EmergencyConatct->primary_name}}">
											<span style="color:red;">{{$errors->first('primary_name')}}</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Relationship <span class="text-danger">*</span></label>
											<input class="form-control" type="text" name="primary_relation" id="primary_relation" value="{{$EmergencyConatct->primary_relation}}">
											<span style="color:red;">{{$errors->first('primary_relation')}}</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Phone <span class="text-danger">*</span></label>
											<input class="form-control" type="text" name="primary_phone" id="primary_phone" value="{{$EmergencyConatct->primary_phone}}">
											<span style="color:red;">{{$errors->first('primary_phone')}}</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Phone 2(optional)</label>
											<input class="form-control" type="text" name="primary_phone2" id="primary_phone2" value="{{$EmergencyConatct->primary_phone2}}">
											<span style="color:red;">{{$errors->first('primary_phone2')}}</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<h3 class="card-title">Secondary Contact</h3>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Name <span class="text-danger">*</span></label>
											<input type="text" class="form-control" name="secondary_name" id="secondary_name" value="{{$EmergencyConatct->secondary_name}}">
											<span style="color:red;">{{$errors->first('secondary_name')}}</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Relationship <span class="text-danger">*</span></label>
											<input class="form-control" type="text" name="secondary_relation" id="secondary_relation" value="{{$EmergencyConatct->secondary_relation}}">
											<span style="color:red;">{{$errors->first('secondary_relation')}}</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Phone <span class="text-danger">*</span></label>
											<input class="form-control" type="text" name="secondary_phone" id="secondary_phone" value="{{$EmergencyConatct->secondary_phone}}">
											<span style="color:red;">{{$errors->first('secondary_phone')}}</span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Phone 2(optional)</label>
											<input class="form-control" type="text" name="secondary_phone2" id="secondary_phone2" value="{{$EmergencyConatct->secondary_phone2}}">
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
					<h5 class="modal-title">Add Education Informations</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="{{route('addeducation')}}" id="add_education">
						@csrf
						<div class="form-scroll">
							<div class="card">
								<div class="card-body">
									<h3 class="card-title">Education Informations </h3>
									<div class="row">
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
					<form method="post" action="{{route('addexperience')}}" id="add_exp">
						@csrf
						<div class="form-scroll">
							<div class="card">
								<div class="card-body">
									<h3 class="card-title">Experience Informations</h3>
									<div class="row">
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