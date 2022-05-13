@extends('layouts.admin')
@section('content')	  
    <div class="page-header">
		<div class="row align-items-center">
			<div class="col">
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
					<li class="breadcrumb-item active">Project</li>
				</ul>
			</div>
			<div class="col-auto float-right ml-auto">
				<a href="{{route('project')}}" class="btn add-btn" style="min-width: 90px;">Back</a>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-8 col-xl-9">
			<div class="card">
				<div class="card-body">
					<div class="project-title">
						<h5 class="card-title">{{$projectview->project_name}}</h5>                                
					</div>
					<p>{{$projectview->description}}.</p>                          
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<h5 class="card-title m-b-20">Uploaded image files</h5>
					<div class="row">
						<div class="col-md-3 col-sm-4 col-lg-4 col-xl-3">
							<div class="uploaded-box">
								<div class="uploaded-img">
									<img src="{{asset('images')}}/{{$projectview->files}}" class="img-fluid" alt="">
								</div>
								<div class="uploaded-img-name">
									{{$projectview->files}}
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="project-task">
				<ul class="nav nav-tabs nav-tabs-top nav-justified mb-0">
					<li class="nav-item"><a class="nav-link active" href="#all_tasks" data-toggle="tab" aria-expanded="true">All Tasks</a></li>
					<li class="nav-item"><a class="nav-link" href="#pending_tasks" data-toggle="tab" aria-expanded="false">Pending Tasks</a></li>
					<li class="nav-item"><a class="nav-link" href="#completed_tasks" data-toggle="tab" aria-expanded="false">Completed Tasks</a></li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane show active" id="all_tasks">
						<div class="task-wrapper">
							<div class="task-list-container">
								<div class="task-list-body">
									<ul id="task-list">
										<li class="task">
											<div class="task-container">
												<span class="task-action-btn task-check">
													<span class="action-circle large complete-btn" title="Mark Complete">
													<i class="fa fa-check"></i>
													</span>
												</span>
												<span class="task-label" contenteditable="true">Patient appointment booking</span>
												<span class="task-action-btn task-btn-right">
													<span class="action-circle large" title="Assign">
													<i class="fa fa-user-plus"></i>
												</span>
												<span class="action-circle large delete-btn" title="Delete Task">
													<i class="fa fa-trash-o"></i>
												</span>
												</span>
											</div>
										</li>
										<li class="task">
											<div class="task-container">
												<span class="task-action-btn task-check">
													<span class="action-circle large complete-btn" title="Mark Complete">
													<i class="fa fa-check"></i>
												</span>
												</span>
												<span class="task-label" contenteditable="true">Appointment booking with payment gateway</span>
												<span class="task-action-btn task-btn-right">
													<span class="action-circle large" title="Assign">
													<i class="fa fa-user-plus"></i>
												</span>
												<span class="action-circle large delete-btn" title="Delete Task">
													<i class="fa fa-trash-o"></i>
												</span>
												</span>
											</div>
										</li>
										<li class="completed task">
											<div class="task-container">
												<span class="task-action-btn task-check">
													<span class="action-circle large complete-btn" title="Mark Complete">
													<i class="fa fa-check"></i>
												</span>
												</span>
												<span class="task-label">Doctor available module</span>
												<span class="task-action-btn task-btn-right">
													<span class="action-circle large" title="Assign">
													<i class="fa fa-user-plus"></i>
												</span>
												<span class="action-circle large delete-btn" title="Delete Task">
													<i class="fa fa-trash-o"></i>
												</span>
												</span>
											</div>
										</li>
										<li class="task">
											<div class="task-container">
												<span class="task-action-btn task-check">
													<span class="action-circle large complete-btn" title="Mark Complete">
													<i class="fa fa-check"></i>
												</span>
												</span>
												<span class="task-label" contenteditable="true">Patient and Doctor video conferencing</span>
												<span class="task-action-btn task-btn-right">
													<span class="action-circle large" title="Assign">
													<i class="fa fa-user-plus"></i>
												</span>
												<span class="action-circle large delete-btn" title="Delete Task">
													<i class="fa fa-trash-o"></i>
												</span>
												</span>
											</div>
										</li>
										<li class="task">
											<div class="task-container">
												<span class="task-action-btn task-check">
													<span class="action-circle large complete-btn" title="Mark Complete">
													<i class="fa fa-check"></i>
												</span>
												</span>
												<span class="task-label" contenteditable="true">Private chat module</span>
												<span class="task-action-btn task-btn-right">
													<span class="action-circle large" title="Assign">
													<i class="fa fa-user-plus"></i>
												</span>
												<span class="action-circle large delete-btn" title="Delete Task">
													<i class="fa fa-trash-o"></i>
												</span>
												</span>
											</div>
										</li>
										<li class="task">
											<div class="task-container">
												<span class="task-action-btn task-check">
													<span class="action-circle large complete-btn" title="Mark Complete">
														<i class="fa fa-check"></i>
													</span>
												</span>
												<span class="task-label" contenteditable="true">Patient Profile add</span>
												<span class="task-action-btn task-btn-right">
													<span class="action-circle large" title="Assign">
														<i class="fa fa-user-plus"></i>
													</span>
												<span class="action-circle large delete-btn" title="Delete Task">
													<i class="fa fa-trash-o"></i>
												</span>
												</span>
											</div>
										</li>
									</ul>
								</div>
								<div class="task-list-footer">
									<div class="new-task-wrapper">
										<textarea id="new-task" placeholder="Enter new task here. . ."></textarea>
										<span class="error-message hidden">You need to enter a task first</span>
										<span class="add-new-task-btn btn" id="add-task">Add Task</span>
										<span class="btn" id="close-task-panel">Close</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="pending_tasks"></div>
					<div class="tab-pane" id="completed_tasks"></div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-xl-3">
			<div class="card">
				<div class="card-body">
					<h6 class="card-title m-b-15">Project details</h6>
					<table class="table table-striped table-border">
						<tbody>
							<!--<tr>
								<td>Cost:</td>
								<td class="text-right">$1200</td>
							</tr>
							<tr>
								<td>Total Hours:</td>
								<td class="text-right">100 Hours</td>
							</tr>-->
							<tr>
								<td>Created:</td>
								<td class="text-right">{{ \Carbon\Carbon::parse($projectview->created_at)->isoFormat('MMM Do YYYY')}}</td>
							</tr>
							<tr>
								<td>Deadline:</td>
								<td class="text-right">{{ \Carbon\Carbon::parse($projectview->deadline)->isoFormat('MMM Do YYYY')}}</td>
							</tr>
							<tr>
								<td>Priority:</td>
								<td class="text-right">
									{{$projectview->priority}}
								</td>
							</tr>
							<!--<tr>
								<td>Created by:</td>
								<td class="text-right"><a href="profile.html">Barry Cuda</a></td>
							</tr>-->
							<tr>
								<td>Status:</td>
								<td class="text-right">{{$projectview->status}}</td>
							</tr>
						</tbody>
					</table>
					<!--<p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
					<div class="progress progress-xs mb-0">
						<div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="" style="width: 40%" data-original-title="40%"></div>
					</div>-->
				</div>
			</div>
			<div class="card project-user">
				<div class="card-body">
					<h6 class="card-title m-b-20">Assigned Task</h6>
					<ul class="list-box">
						@foreach($projectview->users as $users)
							<li>
								<div class="list-item">									   
									<div class="list-body">
										<span class="message-author">{{$users->name}} {{$users->last_name}}</span>
										<!--<div class="clearfix"></div>-->
										<!--<span class="message-content">Team Leader</span>-->
									</div>
								</div>                               
							</li>
						@endforeach	
					</ul>
				</div>
			</div>
			<!--<div class="card project-user">
				<div class="card-body">
					<h6 class="card-title m-b-20">
						Assigned users                                   
					</h6>
					<ul class="list-box">
						<li>                                    
							<div class="list-item">                                           
								<div class="list-body">
									<span class="message-author">{{$projectview->addteam}}</span>
									<div class="clearfix"></div>
									<span class="message-content">Web Designer</span>
								</div>
							</div>                                      
						</li>                             
					</ul>
				</div>
			</div>-->
		</div>
	</div>
@endsection