	<div class="sidebar" id="sidebar">
		<div class="slimScrollDiv" style="position: relative; overflow: hidden; width: 100%; height: 201px;">
			<div class="sidebar-inner slimscroll" style="overflow: hidden; width: 100%; height: 201px;">
				<div id="sidebar-menu" class="sidebar-menu">
					<ul>
						<li class="active">
							<a href="{{route('home')}}"><i class="la la-tachometer-alt"></i> <span>Dashboard</span></a>
						</li>
						
						<li class="menu-title">
							<span>Employees</span>
						</li>
						<li class="submenu">
							<a href="#" class="noti-dot"><i class="la la-user"></i><span>Employees</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="{{route('allemployee')}}">All Employees</a></li>
								<li><a href="{{route('adminholiday')}}">Holidays</a></li>
								@php 
									$leave = auth()->user()->unreadNotifications->where('data', '=', 'leave')->count()
								@endphp
								<li><a href="{{route('adminleave')}}">
									Leaves
									@if($leave!==0)
										<span class="badge badge-pill bg-primary float-right">
											{{$leave}}
										</span>
									@endif
								</a></li>
								<li><a href="{{route('adminattendance')}}">Attendance</a></li>
							</ul>
						</li>
						<li class="submenu">
							<a href="#" class="noti-dot"><i class="la la-rocket"></i> <span> Projects</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="{{route('project')}}">Projects</a></li>
								<li><a href="{{route('admintasks')}}">Tasks</a></li>
								@php
									$tasks = auth()->user()->unreadNotifications->where('data', '=', 'task')->count()	
								@endphp
								<li>
									<a href="{{route('admintasksboard')}}">Task Board 
										@if($tasks!==0)
											<span class="badge badge-pill bg-primary float-right">
												{{$tasks}}
											</span>
										@endif
									</a>
								</li>
							</ul>
						</li>
						@php
							$ticket = auth()->user()->unreadNotifications->where('data', '=', 'ticket')->count()
						@endphp
						<li>
							<a href="{{route('tickets')}}"><i class="la la-ticket"></i> <span>Tickets</span>
								@if($ticket!==0)
									<span class="badge badge-pill bg-primary float-right">
										{{$ticket}}
									</span>
								@endif
							</a>
						</li>
						<li class="submenu">
							<a href="#"><i class="la la-money"></i> <span> Payroll</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="{{route('employeesalary')}}">Employee Salary</a></li>
								<!--<li><a href="{{route('payslip')}}">Payslip</a></li>-->
							</ul>
						</li>
						<li class="submenu">
							<a href="#"><i class="la la-pie-chart"></i> <span> Reports</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<li><a href="{{route('leavereport')}}">Leave Report</a></li>
								<!--<li><a href="{{route('attendancereport')}}">Attendance Report</a></li>-->
							</ul>
						</li>
						<li class="">
							<a href="{{route('assest')}}"><i class="la la-object-ungroup"></i> <span>Assets</span></a>
						</li>
						<li class="">
							<a href="{{route('user')}}"><i class="la la-users"></i> <span>Users</span></a>
						</li>
						<li class="submenu">
							<a href="#" class=""><i class="la la-cog"></i> <span> Settings</span> <span class="menu-arrow"></span></a>
							<ul style="display: none;">
								<!--<li><a href="{{route('rolepermission')}}">Roles &amp; Permissions</a></li>-->
								<li><a href="{{route('rolepermission')}}">Roles</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<div class="slimScrollBar" style="background: rgb(204, 204, 204); width: 7px; position: absolute; top: -213px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 607px;"></div>
			<div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
		</div>
    </div>