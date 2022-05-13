		<div class="sidebar" id="sidebar">
            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: 100%; height: 820px;">
                <div class="sidebar-inner slimscroll" style="overflow: hidden; width: 100%; height: 820px;">
                    <div id="sidebar-menu" class="sidebar-menu">
                        <ul>
                            <li class="active">
                                <a href="{{route('employee_dashboard')}}"><i class="la la-users"></i> <span>Dashboard</span></a>
                            </li>
                            <li class="menu-title">
                                <span>Employees</span>
                            </li>
                            <li class="submenu">
                                <a href="#" class="noti-dot"><i class="la la-user"></i> <span> Employees</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">                                   
                                    <li><a href="{{route('holiday')}}">Holidays</a></li>                                 
                                    @php
									$leaves = auth()->user()->unreadNotifications->where('data', '=', 'leave_status')->where('notifiable_id', '=', auth()->user()->id)->count()
									@endphp
									<li class=""><a href="{{route('employee_leave')}}">Leaves
									@if($leaves!==0)
										<span class="badge badge-pill bg-primary float-right">
											{{$leaves}}
										</span>
									@endif
									</a></li>                         
                                    <li class=""><a href="{{route('attendance')}}">Attendance</a></li>
									@role('hr')<li class=""><a href="{{route('hrviewallattendance')}}">View All Attendance</a></li>@endrole   
                                </ul>
                            </li>
                        @role('employee')
                            <li class="submenu">
                                <a href="#" class="noti-dot"><i class="la la-rocket"></i> <span> Projects</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
                                    @php
										$projects = auth()->user()->unreadNotifications->where('data', '=', 'projects')->count()
									@endphp
									<li><a href="{{route('projects')}}">Projects 
									@if($projects!==0)
										<span class="badge badge-pill bg-primary float-right">	
											{{$projects}}
										</span>
									@endif
									</a></li>
                                    <li><a href="{{route('task')}}">Tasks</a></li>
                                    <li><a href="{{route('taskboard')}}">Task Board</a></li>
                                </ul>
                            </li>
                        @endrole
						@role('manager')
                            <li class="submenu">
                                <a href="#" class="noti-dot"><i class="la la-rocket"></i> <span> Projects</span> <span class="menu-arrow"></span></a>
                                <ul style="display: none;">
									<li><a href="{{route('managerproject')}}">Projects</a></li>
                                    <li><a href="{{route('task')}}">Tasks</a></li>
                                    <li><a href="{{route('taskboard')}}">Task Board</a></li>
                                </ul>
                            </li>
                        @endrole  		
                            <li>
								@php
									$Tickets = auth()->user()->unreadNotifications->where('data', '=', 'tickets_status')->count()
								@endphp
                                <a href="{{route('ticket')}}"><i class="la la-ticket"></i> <span>Tickets</span>
									@if($Tickets!==0)
										<span class="badge badge-pill bg-primary float-right">
											{{$Tickets}}
										</span>
									@endif
								</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="slimScrollBar" style="background: rgb(204, 204, 204); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; right: 1px; height: 442.028px;"></div>
                <div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
            </div>
        </div>