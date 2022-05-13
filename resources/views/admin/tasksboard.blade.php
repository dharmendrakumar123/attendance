@extends('layouts.admin')
@section('content')
            @if(session()->has('addnewtask'))
				<div class="alert alert-success">
					{{session()->get('addnewtask')}}
				</div>
			@endif	
			@if(session()->has('pending'))
				<div class="alert alert-success">
					{{session()->get('pending')}}
				</div>
			@endif	
			@if(session()->has('delete'))
				<div class="alert alert-success">
					{{session()->get('delete')}}
				</div>
			@endif	
			@if(session()->has('dropable'))
				<div class="alert alert-success">
					{{session()->get('dropable')}}
				</div>
			@endif	
			<p class="savedrop"></p>
			<div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Hospital Admin</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Task Board</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row board-view-header">
                    <div class="col-4">
                        <div class="pro-teams">
                           
                        </div>
                    </div>
                    <div class="col-8 text-right">
                       <!-- <a href="#" class="btn btn-white float-right ml-2" data-toggle="modal" data-target="#add_task_board"><i class="fa fa-plus"></i> Create List</a>
                        <a href="#" class="btn btn-white float-right" title="View Board"><i class="fa fa-link"></i></a>-->
                    </div>
                    <div class="col-12">
                        <div class="pro-progress">
                            <div class="pro-progress-bar">
                                <h4>Progress</h4>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 20%"></div>
                                </div>
                                <span>20%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kanban-board card mb-0">
                    <div class="card-body">
                        <div class="kanban-cont">
                            <div class="kanban-list kanban-danger">
                                <div class="kanban-header">
                                    <span class="status-title">Pending</span>    
                                </div>
                                <div class="kanban-wrap ui-sortable product_drag_area_pending">								
									@foreach($getpending as $getpendings)	
									<div class="card panel">
                                        <div class="kanban-box ui-sortable-handle">
                                            <div class="task-board-header">
                                                <input type="hidden" name="drop_id" id="drop_id" value="{{$getpendings->id}}">
                                                <input type="hidden" name="status_name" id="status_name" value="{{$getpendings->status}}">
												<span class="status-title"><a href="#" id="Testtcheck">{{$getpendings->task_name}}</a></span>
                                                <div class="dropdown kanban-task-action">
                                                    <a href="task-board.html" data-toggle="dropdown">
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <button type="button" class="dropdown-item edittaskboard" value="{{$getpendings->id}}">Edit</button>
                                                        <a class="dropdown-item" href="{{route('taskboardelete',$getpendings->id)}}" onclick="return confirm('Are you sure you want to permanently delete that Pending task?')">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="task-board-body">
                                                <div class="kanban-info">
                                                    <div class="progress progress-xs">
                                                        <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span>70%</span>
                                                </div>
                                                <div class="kanban-footer">
                                                    <span class="task-info-cont">
                                                        <span class="task-date"><i class="fa fa-clock-o"></i> {{$getpendings->due_date}}</span>
                                                    <span class="task-priority badge bg-inverse-danger">{{$getpendings->task_priority}}</span>
                                                    </span>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									@endforeach
                                </div>
								
                                <div class="add-new-task">
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#add_task_modal">Add New Task</a>
                                </div>
                            </div>
                            <div class="kanban-list kanban-info">
                                <div class="kanban-header">
                                    <span class="status-title">Progress</span>
                                  
                                </div>
                                <div class="kanban-wrap ui-sortable product_drag_area">
								
								   @foreach($getprogres as $getprogress)	
									<div class="card panel">
                                        <div class="kanban-box ui-sortable-handle">
                                            <div class="task-board-header">
											 <input type="hidden" name="drop_id" id="drop_id" value="{{$getprogress->id}}">
											  <input type="hidden" name="status_name" id="status_name" value="{{$getprogress->status}}">
                                                <span class="status-title"><a href="#">{{$getprogress->task_name}}</a></span>
                                                <div class="dropdown kanban-task-action">
                                                    <a href="task-board.html" data-toggle="dropdown">
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <button type="button" class="dropdown-item edittaskboard" value="{{$getprogress->id}}">Edit</button>
                                                        <a class="dropdown-item" href="{{route('taskboardelete',$getprogress->id)}}" onclick="return confirm('Are you sure you want to permanently delete that Progress task?')">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="task-board-body">
                                                <div class="kanban-info">
                                                    <div class="progress progress-xs">
                                                        <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span>70%</span>
                                                </div>
                                                <div class="kanban-footer">
                                                    <span class="task-info-cont">
                                                        <span class="task-date"><i class="fa fa-clock-o"></i> {{$getprogress->due_date}}</span>
                                                    <span class="task-priority badge bg-inverse-warning">{{$getprogress->task_priority}}</span>
                                                    </span>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									@endforeach
                                </div>
								
                                <div class="add-new-task">
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#add_task_modal">Add New Task</a>
                                </div>
                            </div>
                            <div class="kanban-list kanban-success">
                                <div class="kanban-header">
                                    <span class="status-title">Completed</span>
                                   
                                </div>
                                <div class="kanban-wrap ks-empty ui-sortable product_drag_completed">
									@foreach($getcompleted as $getcompleteds)	
									<div class="card panel">
                                        <div class="kanban-box ui-sortable-handle">
                                            <div class="task-board-header">
											 <input type="hidden" name="drop_id" id="drop_id" value="{{$getcompleteds->id}}">
                                                <span class="status-title"><a href="#">{{$getcompleteds->task_name}}</a></span>
                                                <div class="dropdown kanban-task-action">
                                                    <a href="task-board.html" data-toggle="dropdown">
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <button type="button" class="dropdown-item edittaskboard" value="{{$getcompleteds->id}}">Edit</button>
                                                        <a class="dropdown-item" href="{{route('taskboardelete',$getcompleteds->id)}}" onclick="return confirm('Are you sure you want to permanently delete that  completed task?')">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="task-board-body">
                                                <div class="kanban-info">
                                                    <div class="progress progress-xs">
                                                        <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span>70%</span>
                                                </div>
                                                <div class="kanban-footer">
                                                    <span class="task-info-cont">
                                                        <span class="task-date"><i class="fa fa-clock-o"></i> {{$getcompleteds->due_date}}</span>
                                                    <span class="task-priority badge bg-inverse-warning">{{$getcompleteds->task_priority}}</span>
                                                    </span>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									@endforeach
							   </div>
                                <div class="add-new-task">
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#add_task_modal">Add New Task</a>
                                </div>
                            </div>
                            <div class="kanban-list kanban-warning">
                                <div class="kanban-header">
                                    <span class="status-title">Inprogress</span>
                                  
                                </div>
                                <div class="kanban-wrap ui-sortable product_drag_inprogress">
                                    
									@foreach($getInprogres as $getInprogress)
									<div class="card panel">
                                        <div class="kanban-box ui-sortable-handle">
                                            <div class="task-board-header">
												<input type="hidden" name="drop_id" id="drop_id" value="{{$getInprogress->id}}">
                                                <span class="status-title"><a href="project-view.html">{{$getInprogress->task_name}}</a></span>
                                                <div class="dropdown kanban-task-action">
                                                    <a href="task-board.html" data-toggle="dropdown">
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                       <button type="button" class="dropdown-item edittaskboard" value="{{$getInprogress->id}}">Edit</button>
                                                        <a class="dropdown-item" href="{{route('taskboardelete',$getInprogress->id)}}" onclick="return confirm('Are you sure you want to permanently delete that Inprogress task?')">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="task-board-body">
                                                <div class="kanban-info">
                                                    <div class="progress progress-xs">
                                                        <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span>70%</span>
                                                </div>
                                                <div class="kanban-footer">
                                                    <span class="task-info-cont">
                                                        <span class="task-date"><i class="fa fa-clock-o"></i> {{$getInprogress->due_date}}</span>
                                                    <span class="task-priority badge bg-inverse-success">{{$getInprogress->task_priority}}</span>
                                                    </span>
                                                 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									@endforeach
                                </div>
                                <div class="add-new-task">
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#add_task_modal">Add New Task</a>
                                </div>
                            </div>
                            <div class="kanban-list kanban-purple">
                                <div class="kanban-header">
                                    <span class="status-title">On Hold</span>
                                   
                                </div>
                                <div class="kanban-wrap ui-sortable product_drag_onhold">
									@foreach($getonhold as $getonholds)
									<div class="card panel">
                                        <div class="kanban-box ui-sortable-handle">
                                            <div class="task-board-header">
												<input type="hidden" name="drop_id" id="drop_id" value="{{$getonholds->id}}">
                                                <span class="status-title"><a href="project-view.html">{{$getonholds->task_name}}</a></span>
                                                <div class="dropdown kanban-task-action">
                                                    <a href="task-board.html" data-toggle="dropdown">
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                          <button type="button" class="dropdown-item edittaskboard" value="{{$getonholds->id}}">Edit</button>
                                                        <a class="dropdown-item" href="{{route('taskboardelete',$getonholds->id)}}" onclick="return confirm('Are you sure you want to permanently delete that On Hold task?')">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="task-board-body">
                                                <div class="kanban-info">
                                                    <div class="progress progress-xs">
                                                        <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span>70%</span>
                                                </div>
                                                <div class="kanban-footer">
                                                    <span class="task-info-cont">
                                                        <span class="task-date"><i class="fa fa-clock-o"></i>{{$getonholds->due_date}}</span>
                                                    <span class="task-priority badge bg-inverse-danger">{{$getonholds->task_priority}}</span>
                                                    </span>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									@endforeach
									
                                </div>				
                                <div class="add-new-task">
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#add_task_modal">Add New Task</a>
                                </div>
                            </div>
                            <div class="kanban-list kanban-primary">
                                <div class="kanban-header">
                                    <span class="status-title">Review</span>
                                  
                                </div>
                                <div class="kanban-wrap ui-sortable product_drag_reviews">
									@foreach($getreview as $getreviews)
									<div class="card panel">
                                        <div class="kanban-box ui-sortable-handle">
                                            <div class="task-board-header">
												<input type="hidden" name="drop_id" id="drop_id" value="{{$getreviews->id}}">
                                                <span class="status-title"><a href="project-view.html">{{$getreviews->task_name}}</a></span>
                                                <div class="dropdown kanban-task-action">
                                                    <a href="task-board.html" data-toggle="dropdown">
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <button type="button" class="dropdown-item edittaskboard" value="{{$getreviews->id}}">Edit</button>	
                                                        <a class="dropdown-item" href="{{route('taskboardelete',$getreviews->id)}}" onclick="return confirm('Are you sure you want to permanently delete that Review task?')">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="task-board-body">
                                                <div class="kanban-info">
                                                    <div class="progress progress-xs">
                                                        <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <span>70%</span>
                                                </div>
                                                <div class="kanban-footer">
                                                    <span class="task-info-cont">
                                                        <span class="task-date"><i class="fa fa-clock-o"></i> {{$getreviews->due_date}}</span>
                                                    <span class="task-priority badge bg-inverse-danger">{{$getreviews->task_priority}}</span>
                                                    </span>
                                               
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									@endforeach
                                </div>
                                <div class="add-new-task">
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#add_task_modal">Add New Task</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="add_task_board" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Task Board</h4>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">
                            <form>
								
								<div class="form-group">
                                    <label>Task Board Name</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group task-board-color">
                                    <label>Task Board Color</label>
                                    <div class="board-color-list">
                                        <label class="board-control board-primary">
                                            <input name="radio" type="radio" class="board-control-input" value="primary" checked="">
                                            <span class="board-indicator"></span>
                                        </label>
                                        <label class="board-control board-success">
                                                <input name="radio" type="radio" class="board-control-input" value="success">
                                                <span class="board-indicator"></span>
                                        </label>
                                        <label class="board-control board-info">
                                            <input name="radio" type="radio" class="board-control-input" value="info">
                                            <span class="board-indicator"></span>
                                        </label>
                                        <label class="board-control board-purple">
                                            <input name="radio" type="radio" class="board-control-input" value="purple">
                                            <span class="board-indicator"></span>
                                        </label>
                                        <label class="board-control board-warning">
                                            <input name="radio" type="radio" class="board-control-input" value="warning">
                                            <span class="board-indicator"></span>
                                        </label>
                                        <label class="board-control board-danger">
                                            <input name="radio" type="radio" class="board-control-input" value="danger">
                                            <span class="board-indicator"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="m-t-20 text-center">
                                    <button class="btn btn-primary btn-lg">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="edit_task_board" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Task Board</h4>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label>Task Board Name</label>
                                    <input type="text" class="form-control" value="Pending">
                                </div>
                                <div class="form-group task-board-color">
                                    <label>Task Board Color</label>
                                    <div class="board-color-list">
                                        <label class="board-control board-primary">
                                            <input name="radio" type="radio" class="board-control-input" value="primary" checked="">
                                            <span class="board-indicator"></span>
                                        </label>
                                        <label class="board-control board-success">
                                            <input name="radio" type="radio" class="board-control-input" value="success">
                                            <span class="board-indicator"></span>
                                        </label>
                                        <label class="board-control board-info">
                                            <input name="radio" type="radio" class="board-control-input" value="info">
                                            <span class="board-indicator"></span>
                                        </label>
                                        <label class="board-control board-purple">
                                            <input name="radio" type="radio" class="board-control-input" value="purple">
                                            <span class="board-indicator"></span>
                                        </label>
                                        <label class="board-control board-warning">
                                            <input name="radio" type="radio" class="board-control-input" value="warning">
                                            <span class="board-indicator"></span>
                                        </label>
                                        <label class="board-control board-danger">
                                            <input name="radio" type="radio" class="board-control-input" value="danger">
                                            <span class="board-indicator"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="m-t-20 text-center">
                                    <button class="btn btn-primary btn-lg">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="new_project" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Create New Project</h4>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="form-group">
                                    <label>Project Name</label>
                                    <input class="form-control" type="text">
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Create Project</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div id="assign_leader" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Assign Leader to this project</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group m-b-30">
                                <input placeholder="Search to add a leader" class="form-control search-input" type="text">
                                <span class="input-group-append">
                                    <button class="btn btn-primary">Search</button>
                                </span>
                            </div>
                            <div>
                                <ul class="chat-user-list">
                                    <li>
                                        <a href="task-board.html#">
                                            <div class="media">
                                                <span class="avatar"><img alt="" src="assets/images/avatar-09.jpg"></span>
                                                <div class="media-body align-self-center text-nowrap">
                                                    <div class="user-name">Richard Miles</div>
                                                    <span class="designation">Web Developer</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="task-board.html#">
                                            <div class="media">
                                                <span class="avatar"><img alt="" src="assets/images/avatar-10.jpg"></span>
                                                <div class="media-body align-self-center text-nowrap">
                                                    <div class="user-name">John Smith</div>
                                                    <span class="designation">Android Developer</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="task-board.html#">
                                            <div class="media">
                                                <span class="avatar">
                                                    <img alt="" src="assets/images/avatar-16.jpg">
                                                </span>
                                                <div class="media-body align-self-center text-nowrap">
                                                    <div class="user-name">Jeffery Lalor</div>
                                                    <span class="designation">Team Leader</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="assign_user" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Assign the user to this project</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="input-group m-b-30">
                                <input placeholder="Search a user to assign" class="form-control search-input" type="text">
                                <span class="input-group-append">
                                    <button class="btn btn-primary">Search</button>
                                </span>
                            </div>
                            <div>
                                <ul class="chat-user-list">
                                    <li>
                                        <a href="task-board.html#">
                                            <div class="media">
                                                <span class="avatar"><img alt="" src="assets/images/avatar-09.jpg"></span>
                                                <div class="media-body align-self-center text-nowrap">
                                                    <div class="user-name">Richard Miles</div>
                                                    <span class="designation">Web Developer</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="task-board.html#">
                                            <div class="media">
                                                <span class="avatar"><img alt="" src="assets/images/avatar-10.jpg"></span>
                                                <div class="media-body align-self-center text-nowrap">
                                                    <div class="user-name">John Smith</div>
                                                    <span class="designation">Android Developer</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="task-board.html#">
                                            <div class="media">
                                                <span class="avatar">
                                                    <img alt="" src="assets/images/avatar-16.jpg">
                                                </span>
                                                <div class="media-body align-self-center text-nowrap">
                                                    <div class="user-name">Jeffery Lalor</div>
                                                    <span class="designation">Team Leader</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="submit-section">
                                <button class="btn btn-primary submit-btn">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div id="add_task_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Task</h4>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">
                            <form id="addtaskvalid" method="post" action="{{route('addtask')}}" >
                                @csrf
								<div class="form-group">
                                    <label>Task Name</label>
                                    <input type="text" class="form-control" name="task_name" id="tasks_name" required>
									<span class="text-danger">{{$errors->first('task_name')}}</span>
								</div>
                                <div class="form-group">
                                    <label>Task Priority</label>
                                    <select class="form-control" name="task_priority" id="task_priority" required>
                                        <option value="">Select</option>
                                        <option value="High">High</option>
                                        <option value="Normal">Normal</option>
                                        <option value="Low">Low</option>
                                    </select>
									<span class="text-danger">{{$errors->first('task_priority')}}</span>
                                </div>
                                <div class="form-group">
                                    <label>Due Date</label>
                                    <input class="form-control" type="date" name="due_dat" id="due_dat" required>
									<span class="text-danger">{{$errors->first('due_dat')}}</span>
                                </div> 
								 <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="task_Status" id="task_Status" required>
                                        <option value="">Select</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Progress">Progress</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Inprogress">Inprogress</option>
                                        <option value="On Hold">On Hold</option>
                                        <option value="Review">Review</option>
                                    </select>
									<span class="text-danger">{{$errors->first('task_priority')}}</span>
                                </div>		
                                <div class="submit-section text-center">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div id="edit_task_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Task</h4>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('updatetaskboard')}}" method="post">
                                @csrf
								<input type="hidden" id="taskboard_id" name="taskboard_id">
								<div class="form-group">
                                    <label>Task Name</label>
                                    <input type="text" class="form-control" name="edit_task_name" id="edit_task_name">
                                </div>
                                <div class="form-group">
                                    <label>Task Priority</label>
                                    <select class="form-control" name="edit_task_priority" id="edit_task_priority">
                                        <option value="">Select</option>
                                        <option value="High">High</option>
                                        <option value="Normal">Normal</option>
                                        <option value="Low">Low</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Due Date</label>
                                    <div class="">
                                        <input class="form-control" type="date" name="edit_due_date" id="edit_due_date">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="edit_task_Status" id="edit_task_Status" required>
                                        <option value="">Select</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Progress">Progress</option>
                                        <option value="Completed">Completed</option>
                                        <option value="Inprogress">Inprogress</option>
                                        <option value="On Hold">On Hold</option>
                                        <option value="Review">Review</option>
                                    </select>
									<span class="text-danger">{{$errors->first('task_priority')}}</span>
                                </div>	
                                <div class="submit-section text-center">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
@endsection