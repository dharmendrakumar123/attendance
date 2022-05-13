 <div class="header">

            <div class="header-left">
                <a href="{{route('employee_dashboard')}}" class="logo">
                    <img src="{{asset('assets/images/logo.png')}}" width="40" height="40" alt="">
                </a>
            </div>

            <a id="toggle_btn" href="javascript:void(0);">
                <span class="bar-icon">
				<span></span>
                <span></span>
                <span></span>
                </span>
            </a>

            <div class="page-title-box">
                @role('hr')
					<h3>HR Dashboard</h3>
				@endrole
				@role('employee')
					<h3>Employee Dashboard</h3>
				@endrole
				@role('manager')
					<h3>Manager Dashboard</h3>
				@endrole
			</div>

            <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

            <ul class="nav user-menu">
			
				<li class="nav-item dropdown has-arrow main-drop">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <span class="user-img"><img src="images/{{ Auth::user()->profile_pic}}" alt="">
						<span class="status online"></span></span>
                        <span>{{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('employeeprofile')}}">My Profile</a>
                        <!--<a class="dropdown-item" href="https://smarthr.dreamguystech.com/light/settings.html">Settings</a>-->
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form> 
                    </div>
                </li>
            </ul>


            <div class="dropdown mobile-user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="{{route('employeeprofile')}}">My Profile</a>
                    <!--<a class="dropdown-item" href="https://smarthr.dreamguystech.com/light/settings.html">Settings</a>-->
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
						   document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
                </div>
            </div>

        </div>