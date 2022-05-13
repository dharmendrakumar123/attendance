@extends('employeelayouts.admin')
@section('content')
             @if(session()->has('addemployeetask'))
				<div class="alert alert-success">
					{{session()->get('addemployeetask')}}
				</div>
			@endif	
			@if(session()->has('delete'))
				<div class="alert alert-success">
					{{session()->get('delete')}}
				</div>
			@endif
			@if(session()->has('emplupdatetaskboard'))
				<div class="alert alert-success">
					{{session()->get('emplupdatetaskboard')}}
				</div>
			@endif			
			
			<div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Employee board</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('employee_dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Task Board</li>
                            </ul>
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
                                                <span class="status-title"><a href="#">{{$getpendings->task_name}}</a></span>
                                                <div class="dropdown kanban-task-action">
                                                    <a href="task-board.html" data-toggle="dropdown">
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
														<button type="button" class="dropdown-item editemployeetaskboard" value="{{$getpendings->id}}">Edit</button>
                                                        <!--<a class="dropdown-item" href="task-board.html#" data-toggle="modal" data-target="#edit_task_modal">Edit</a>-->
                                                        <a class="dropdown-item" href="{{route('employeetaskboardelete',$getpendings->id)}}" onclick="return confirm('Are you sure you want to permanently delete that pending task?')">Delete</a>
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
                                <div class="kanban-wrap ui-sortable">
                                    @foreach($getprogres as $getprogress)
									<div class="card panel">
                                        <div class="kanban-box ui-sortable-handle">
                                            <div class="task-board-header">
                                                <span class="status-title"><a href="#">{{$getprogress->task_name}}</a></span>
                                                <div class="dropdown kanban-task-action">
                                                    <a href="task-board.html" data-toggle="dropdown">
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <button type="button" class="dropdown-item editemployeetaskboard" value="{{$getprogress->id}}">Edit</button>
                                                        <a class="dropdown-item" href="{{route('employeetaskboardelete',$getprogress->id)}}" onclick="return confirm('Are you sure you want to permanently delete that progress task?')">Delete</a>
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
                                                        <span class="task-date"><i class="fa fa-clock-o"></i>{{$getprogress->due_date}}</span>
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
                                <div class="kanban-wrap ks-empty ui-sortable">
								    @foreach($getcompleted as $getcompleteds)
									<div class="card panel">
                                        <div class="kanban-box ui-sortable-handle">
                                            <div class="task-board-header">
                                                <span class="status-title"><a href="#">{{$getcompleteds->task_name}}</a></span>
                                                <div class="dropdown kanban-task-action">
                                                    <a href="task-board.html" data-toggle="dropdown">
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                       <button type="button" class="dropdown-item editemployeetaskboard" value="{{$getcompleteds->id}}">Edit</button>
                                                        <a class="dropdown-item" href="{{route('employeetaskboardelete',$getcompleteds->id)}}" onclick="return confirm('Are you sure you want to permanently delete that complete task?')">Delete</a>
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
                                                        <span class="task-date"><i class="fa fa-clock-o"></i>{{$getcompleteds->due_date}}</span>
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
                                <div class="kanban-wrap ui-sortable">                                
								    @foreach($getInprogress as $getInprogresss)
									<div class="card panel">
                                        <div class="kanban-box ui-sortable-handle">
                                            <div class="task-board-header">
                                                <span class="status-title"><a href="#">{{$getInprogresss->task_name}}</a></span>
                                                <div class="dropdown kanban-task-action">
                                                    <a href="task-board.html" data-toggle="dropdown">
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <button type="button" class="dropdown-item editemployeetaskboard" value="{{$getInprogresss->id}}">Edit</button>
                                                        <a class="dropdown-item" href="{{route('employeetaskboardelete',$getInprogresss->id)}}" onclick="return confirm('Are you sure you want to permanently delete that inprogress task?')">Delete</a>
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
                                                        <span class="task-date"><i class="fa fa-clock-o"></i>{{$getInprogresss->due_date}}</span>
                                                    <span class="task-priority badge bg-inverse-warning">{{$getInprogresss->task_priority}}</span>
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
                                <div class="kanban-wrap ui-sortable">
                                    
									@foreach($getOnHold as $getOnHolds)
									<div class="card panel">
                                        <div class="kanban-box ui-sortable-handle">
                                            <div class="task-board-header">
                                                <span class="status-title"><a href="#">{{$getOnHolds->task_name}}</a></span>
                                                <div class="dropdown kanban-task-action">
                                                    <a href="task-board.html" data-toggle="dropdown">
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <button type="button" class="dropdown-item editemployeetaskboard" value="{{$getOnHolds->id}}">Edit</button>
                                                        <a class="dropdown-item" href="{{route('employeetaskboardelete',$getOnHolds->id)}}" onclick="return confirm('Are you sure you want to permanently delete that on hold task?')">Delete</a>
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
                                                        <span class="task-date"><i class="fa fa-clock-o"></i>{{$getOnHolds->due_date}}</span>
                                                    <span class="task-priority badge bg-inverse-warning">{{$getOnHolds->task_priority}}</span>
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
                                <div class="kanban-wrap ui-sortable">
                                    
									@foreach($getReview as $getReviews)
									<div class="card panel">
                                        <div class="kanban-box ui-sortable-handle">
                                            <div class="task-board-header">
                                                <span class="status-title"><a href="#">{{$getReviews->task_name}}</a></span>
                                                <div class="dropdown kanban-task-action">
                                                    <a href="task-board.html" data-toggle="dropdown">
                                                        <i class="fa fa-angle-down"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <button type="button" class="dropdown-item editemployeetaskboard" value="{{$getReviews->id}}">Edit</button>
                                                        <a class="dropdown-item" href="{{route('employeetaskboardelete',$getReviews->id)}}" onclick="return confirm('Are you sure you want to permanently delete that review task?')">Delete</a>
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
                                                        <span class="task-date"><i class="fa fa-clock-o"></i>{{$getReviews->due_date}}</span>
                                                    <span class="task-priority badge bg-inverse-warning">{{$getReviews->task_priority}}</span>
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


            <div id="add_task_modal" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Task</h4>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body">
                            <form id="addtaskvalid" method="post" action="{{route('addemployeetask')}}" >
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
									<span class="text-danger">{{$errors->first('task_Status')}}</span>
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
                            <form action="{{route('emplupdatetaskboard')}}" method="post">
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