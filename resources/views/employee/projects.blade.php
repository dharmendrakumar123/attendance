@extends('employeelayouts.admin')
@section('content')
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Projects</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
						<li class="breadcrumb-item active">Projects</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="row">
	
			@foreach($project as $projects)
			<div class="col-lg-4 col-sm-6 col-md-4 col-xl-3">
				<div class="card">
					<div class="card-body">
										
						<h4 class="project-title"><a href="{{route('project_view',$projects->id)}}">{{$projects->project_name}}</a></h4>
						<p class="text-muted">{{$projects->description}}</p>
						<div class="pro-deadline m-b-15">
							<div class="sub-title">
								Deadline:
							</div>
							<div class="text-muted">
								{{$projects->deadline}}
							</div>
						</div>
						
						<!--<div class="project-members m-b-15">
							<div>Team :</div>
							<ul class="team-members">
								<li>
									{{$projects->addteam}}
								</li>
							</ul>
						</div>-->
						<!--<p class="m-b-5">Progress <span class="text-success float-right">40%</span></p>
						<div class="progress progress-xs mb-0">
							<div class="progress-bar bg-success" role="progressbar" data-toggle="tooltip" title="" style="width: 40%" data-original-title="40%"></div>
						</div>-->
					</div>
				</div>
			</div>
			@endforeach
		</div>
  


       
@endsection