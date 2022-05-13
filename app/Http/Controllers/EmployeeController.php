<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee\EmployeeModel;
use App\Models\Employee\PunchIn;
use App\Models\Employee\PunchOut;
use App\Models\Employee\PunchModel;
use App\Models\User;
use App\Models\PersonalInformation;
use App\Models\EmergencyConatct;
use App\Models\FamilyInformation;
use App\Models\educationinformation;
use App\Models\ExperienceModel;
use App\Models\TicketsModel;
use App\Models\holidaymodel;
use App\Models\activitymodel;
use App\Models\projectmodel;
use Carbon\Carbon;
use Auth;
use DB;
use DateTime;
use App\Models\TaskBoardModel;
use App\Models\bankinformation;
use App\Models\total_leave;
use App\Models\livechat;
use App\Models\UserStatus;
use App\Models\Feed;

use Notification;
use App\Notifications\MyFirstNotification;
use Illuminate\Notifications\Notifiable;
use App\Models\Latestupdate;

class EmployeeController extends Controller
{
    
	/* public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Employee');
    } */
	
	//
	 public function index(Request $request)
    {
		$currentdates 		  = Carbon::now();
		$current_user_date 	  = $currentdates->toDateString();
		$tomorrow_timestamp   = strtotime($current_user_date);
		$tomorrow_date        = date('d',$tomorrow_timestamp+86400);
		$get_tomorrow_holiday = holidaymodel::whereDay('date',$tomorrow_date)->get();
		$strmonth 			  = strtotime($current_user_date);
		$get_current_month    = date('m',$strmonth);
		$get_current_day      = date('d',$strmonth);
		$birthday             = User::whereMonth('birth_date',$get_current_month)->whereDay('birth_date',$get_current_day)->get();
		$id 	  			  = Auth::user()->id;
		$project              = projectmodel::whereHas('users', function ($query) use ($id){
								$query->whereKey($id);
								})->get();
		$user_uid 			      = Auth::user()->uid;
		$current_employee_task 	  = TaskBoardModel::where('uid',$user_uid)->get();
		$complete_employee_task   = TaskBoardModel::where('uid',$user_uid)->where('status','Completed')->get();
		$Inprogress_employee_task = TaskBoardModel::where('uid',$user_uid)->where('status','Inprogress')->get();
		$onhold_employee_task     = TaskBoardModel::where('uid',$user_uid)->where('status','On Hold')->get();
		$Pending_employee_task    = TaskBoardModel::where('uid',$user_uid)->where('status','Pending')->get();
		$review_employee_task     = TaskBoardModel::where('uid',$user_uid)->where('status','Review')->get();
		
		$employee_total_tickets   = TicketsModel::where('uid',$user_uid)->get();
		//$employee_open_tickets   = TicketsModel::where('uid',$user_uid)->where('status','Open')->get();
		//$employee_close_tickets   = TicketsModel::where('uid',$user_uid)->where('status','Closed')->get();
		
		
		//Show punchIn and PunchOut
		$currentdate 		    = $currentdates->toFormattedDateString();
		$emp_alldayswork 	    = activitymodel::where('uid', $user_uid)->where('day', $current_user_date)->get();
		
		$emp_count_intime 		= activitymodel::where('uid', $user_uid)->where('day', $current_user_date)->orderBy('id', 'desc')->count();		
		if($emp_count_intime>1){
			$emp_breakincount 	= activitymodel::where('uid', $user_uid)->where('day', $current_user_date)->orderBy('id', 'asc')->skip(1)->take(1000)->get();
		}else{
			$emp_breakincount[] = 0;
		}
		$emp_count_outtime 		= activitymodel::where('uid', $user_uid)->where('day', $current_user_date)->orderBy('id', 'desc')->count();
		if($emp_count_outtime>=2){
			$emp_breakoutcount 	= activitymodel::where('uid', $user_uid)->where('day', $current_user_date)->orderBy('id', 'asc')->get();
		}else{
			$emp_breakoutcount[] = 0;
		}
		$Emp_PunchInTime 		= PunchModel::where('uid', $user_uid)->where('day', $current_user_date)->orderBy('id', 'desc')->first();
		$emp_total_product 		= PunchModel::where('uid', $user_uid)->where('day', $current_user_date)->get();
		$emp_todayactivity 		= activitymodel::where('uid', $user_uid)->where('day', $current_user_date)->get();
		$emp_activityInOut 		= activitymodel::orderBy('id', 'desc')->first();
		$emp_PunchInactive 		= activitymodel::where('uid', $user_uid)->orderBy('id', 'desc')->first();
		
		//$get_all_feed           = User::join('feeds','feeds.uid','=','users.uid')->get();
		$get_all_feed           = User::select('users.uid','users.name','users.last_name','users.profile_pic','feeds.*')->join('feeds','feeds.uid','=','users.uid')->latest()->paginate(5);
		/* $show_all_feed = '';
		if($request->ajax()){
            foreach ($get_all_feed as $get_all_feeds){
                $show_all_feed.=(($get_all_feeds->uid!==Auth::user()->uid)?'<div class="col-sm-6"><h2 class="table-avatar"><a class="avatar"><img src="images/'.$get_all_feeds->profile_pic.'" alt=""></a><a style="font-size: 17px;">'.$get_all_feeds->name.''.$get_all_feeds->last_name.'</a></h2>'.(!empty($get_all_feeds->files)?'<img src="images/'.$get_all_feeds->files.'" width="50" height="50">':'').'<p class="messag">'.$get_all_feeds->message.'</p></div><div class="col-sm-6"></div>':'<div class="col-sm-6"></div><div class="col-sm-6" id="show-current"><h2 class="table-avatar"><a class="avatar"><img src="images/'.$get_all_feeds->profile_pic.'" alt=""></a><a style="font-size: 17px;">Me</a></h2>'.(!empty($get_all_feeds->files)?'<img src="images/'.$get_all_feeds->files.'" width="50" height="50">':'').'<p class="messag">'.$get_all_feeds->message.'</p></div>');
            }
            return $show_all_feed;
        } */
		$getlatestupdate = Latestupdate::latest()->paginate(5);
		return view('employee/home',compact('get_all_feed','get_tomorrow_holiday','birthday','project','current_employee_task','complete_employee_task','Inprogress_employee_task','onhold_employee_task','Pending_employee_task','review_employee_task','employee_total_tickets','currentdate','emp_alldayswork','emp_breakincount','emp_breakoutcount','Emp_PunchInTime','emp_total_product','emp_todayactivity','emp_activityInOut','emp_PunchInactive','getlatestupdate'));
    }

	
	public function employee_leave(){
		$uid 			   = Auth::user()->uid;
		$show_all_leave    = EmployeeModel::where('uid',$uid)->get();
		$hr_show_all_leave =  EmployeeModel::join('users', 'employee_leave.uid', '=', 'users.uid')->get(['users.name','users.last_name','users.profile_pic', 'employee_leave.*']);
		//dd($hr_show_all_leave);
		$get_total_leave = total_leave::where('uid',$uid)->first();
		Auth::user()->unreadNotifications->where('data', '=', "leave_status")->markAsRead();
		return view('employee/leave_show',compact('show_all_leave','get_total_leave','hr_show_all_leave'));
	}
	
	//Send employee leave request.
	public function employe_leave_request_send(Request $request){
		$request->validate([
				'leave_type'=>'required',
				'from'=>'required',
				'to'=>'required',
				'leave_remaining'=>'required',
				'leave_reason'=>'required',
			]);
		$employee_leave 			 		= new EmployeeModel; 
		$employee_leave->uid 				= Auth::user()->uid;
		$employee_leave->status      		= "New";
		$employee_leave->leave_type  		= $request->get('leave_type');
		$employee_leave->from		 		= $request->get('from');
		$employee_leave->to 		 		= $request->get('to');
		$employee_leave->number_days 		= $request->get('number_days');
		$employee_leave->leave_remaining 	= $request->get('leave_remaining');
		$employee_leave->leave_reason 		= $request->get('leave_reason');
		
		if($request->get('time')!=''){
			$employee_leave->time = $request->get('time');	
		}else if($request->get('leavetime')!=''){
			$employee_leave->time = $request->get('leavetime');
		}else{
			$employee_leave->time="Full day";
		} 
		$employee_leave->save();
		$user 		= User::all();
		Notification::send($user, new MyFirstNotification("leave"));
		return redirect()->back()->with('message', 'Apply leave successfully!');
	}
	
	//delete employee request
	public function leave_request_destroy($id){
		$destroye = EmployeeModel::find($id);
		$destroye->delete();
		//return redirect()->route('employee_leave'); 
		return redirect()->back()->with('delete_leave', 'Deleted leave successfully!');
	}
	
	public function leave_request_edit($id){
		$edit_leave_request = EmployeeModel::find($id);
		//return view('employee/edit_employee_leave_request',compact('edit_leave_request')); 
		//$edittickets = TicketsModel::find($id);
		 return response()->json([
			'status'=>200,
			'edit_leave_request'=>$edit_leave_request,
		]); 
	}
	
	public function update_employee_leave(Request $request){
		 $request->validate([
				'update_leave_type'=>'required',
				'update_from'=>'required',
				'update_to'=>'required',
				'update_leave_remaining'=>'required',
				'update_leave_reason'=>'required',
			]);
		$leave_id 								= $request->get('leave_id');
		$update_employee_leave 			 		= EmployeeModel::find($leave_id); 
		$update_employee_leave->leave_type  	= $request->get('update_leave_type');
		$update_employee_leave->from			= $request->get('update_from');
		$update_employee_leave->to 		 		= $request->get('update_to');
		$update_employee_leave->number_days 	= $request->get('update_number_days');
		$update_employee_leave->leave_remaining = $request->get('update_leave_remaining');
		$update_employee_leave->leave_reason 	= $request->get('update_leave_reason');
		
		if($request->get('time')!=''){
			$update_employee_leave->time = $request->get('time');	
		}else if($request->get('leavetime')!=''){
			$update_employee_leave->time = $request->get('leavetime');
		}else{
			$update_employee_leave->time="Full day";
		} 
		$update_employee_leave->save();
		return redirect()->route('employee_leave')->with('update', 'Update leave successfully!'); 
	}
	
	// Showing all attendance 
	public function attendance(Request $request){
		$currentUser		= Auth::user()->uid;
		$currentTime		= Carbon::now()->format('H:i:s');
		$currentUser 		= Carbon::now();
		$currentdate 		= $currentUser->toFormattedDateString();
		$todaydate 			= $currentUser->toDateString();
		$useruid			= Auth::user()->uid;
		$AllTotalTime 		= PunchModel::where('uid', $useruid)->orderBy('id', 'desc')->get();
		$todayactivity 		= activitymodel::where('uid', $useruid)->where('day', $todaydate)->get();
		$total_product 		= PunchModel::where('uid', $useruid)->where('day', $todaydate)->get();
		$currentdates 		= Carbon::now();
		$currentuserdate 	= $currentdates->toDateString();
		//$count 			= activitymodel::count();
		$count 				= activitymodel::where('uid', $useruid)->where('day', $currentuserdate)->count();
		$count_intime 		= activitymodel::where('uid', $useruid)->where('day', $currentuserdate)->orderBy('id', 'desc')->count();		
		if($count_intime>1){
			$breakincount 	= activitymodel::where('uid', $useruid)->where('day', $currentuserdate)->orderBy('id', 'asc')->skip(1)->take(1000)->get();
		}else{
			$breakincount[] = 0;
		}
		$count_outtime 		= activitymodel::where('uid', $useruid)->where('day', $currentuserdate)->orderBy('id', 'desc')->count();
		if($count_outtime>=2){
			$breakoutcount 		= activitymodel::where('uid', $useruid)->where('day', $currentuserdate)->orderBy('id', 'asc')->get();
		}else{
			$breakoutcount[] = 0;
		}
		$alldayswork 		= activitymodel::where('uid', $useruid)->where('day', $todaydate)->get();
		$PunchInTime 		= PunchModel::where('uid', $useruid)->where('day', $todaydate)->orderBy('id', 'desc')->first();
		$activityInOut 		= activitymodel::orderBy('id', 'desc')->first();
		$PunchInactive 		= activitymodel::where('uid', $useruid)->orderBy('id', 'desc')->first();
		
		return view('employee/attendance',compact('total_product','currentdate','PunchInTime','AllTotalTime','todayactivity','PunchInactive','activityInOut','alldayswork','breakincount','breakoutcount'));
	}
	
	// Employee punch In request
	//public function punchin(Request $request, $id, $work){
	public function punchin(Request $request, $id, $work){
		
		$currentUser			= Auth::user()->uid;
		$currentdates 			= Carbon::now();
		$currentuserdate 		= $currentdates->toDateString();
		$todayday 				= PunchModel::where('uid', $currentUser)->where('day', $currentuserdate)->first();
		//$currentUser			= Auth::user()->uid;
		$currentInTime			= Carbon::now()->format('H:i:s');	
		//$currentdates 			= Carbon::now();
		//$currentuserdate 		= $currentdates->toDateString();
		if($todayday === null) {
			$punchInTime 			= new PunchModel;
			$punchInTime->uid 		= $currentUser;
			$punchInTime->day		= $currentuserdate;
			$punchInTime->time_in 	= $currentInTime;	
			$punchInTime->save();
		}
		/* if(!empty($todayday)){
			$punchInTime 			= PunchModel::find($id);
			$punchInTime->uid 		= $currentUser;
			$punchInTime->day 		= $currentuserdate;
			$punchInTime->time_in 	= $todayday->time_in;
			$punchInTime->hours 	= $work;
			$punchInTime->update();
		} */
		
		$activitymodel 			= new activitymodel;
		$activitymodel->uid 	= $currentUser;
		$activitymodel->day 	= $currentuserdate;
		$activitymodel->time_in = $currentInTime;
		$activitymodel->save();
		//return redirect()->route('attendance');  
		
		return response()->json([
			'status'=>200,
		]);
		
	}
	
	// Auto fill user attendance if usre not login
	public function punchauto(){
		$todaycarbon    = \Carbon\Carbon::now();
		$getloginuser   = UserStatus::whereDay('day', $todaycarbon->day)->get();
		$User_login 	= collect($getloginuser)->toArray();
		$allUser		= User::where('role','!=','superadmin')->get('uid as all_user_id');
		$User_collect 	= collect($allUser)->toArray();
		foreach($User_collect as  $key => $User_collects){
			if(empty($User_login[$key]['uid'])){
				$currentdates 			= Carbon::now();
				$currentuserdate 		= $currentdates->toDateString();
				$punchInTime 			= new PunchModel;
				$punchInTime->uid 		= $User_collects['all_user_id'];
				$punchInTime->day		= $currentuserdate;
				$punchInTime->time_in 	= "00:00:00";	
				$punchInTime->save(); 
			}
		}
		return response()->json([
			'status'=>200,
		]);  
	}
	
	
	public function punchin_break(Request $request, $id, $breaktime){
		$currentUser			= Auth::user()->uid;
		$currentdates 			= Carbon::now();
		$currentuserdate 		= $currentdates->toDateString();
		$todayday 				= PunchModel::where('uid', $currentUser)->where('day', $currentuserdate)->first();
		//$currentUser			= Auth::user()->uid;
		//$currentInTime			= Carbon::now()->format('H:i:s');	
		
		$punchInTime 			= PunchModel::find($id);
		$punchInTime->uid 		= $currentUser;
		$punchInTime->day 		= $currentuserdate;
		$punchInTime->time_in 	= $todayday->time_in;
		$punchInTime->break 	= $breaktime;
		$punchInTime->update(); 
		
		return response()->json([
			'status'=>200,
		]);
	}
	
	
	
	
	// Employee punch out request
	//public function punchout(Request $request, $id, $break, $activit_id){
	public function punchout(Request $request, $id, $break, $activity_id){
	    $currentUser	   			= Auth::user()->uid;		
		$currentInTime	   			= Carbon::now()->format('H:i:s');	
		$currentdate 	   			= Carbon::now();
		$currentuserdate   			= $currentdate->toDateString();
		
		/* $punchOutTime      			= PunchModel::find($id);		
		$punchOutTime->uid 			= $currentUser;
		$punchOutTime->day 			= $currentuserdate;
		$punchOutTime->time_out 	= $currentInTime;
		$punchOutTime->break 		= $break;
		$punchOutTime->update(); */
		
		$activitymodel      		= activitymodel::find($activity_id);	
		$activitymodel->uid 		= $currentUser;
		$activitymodel->day 		= $currentuserdate;
		$activitymodel->time_out 	= $currentInTime;
		$activitymodel->update();
		return response()->json([
			"status"=>200,
			"work"=>100
		]); 	
	}
	
	public function punchout_work(Request $request, $id, $total_work){
		$currentUser	   			= Auth::user()->uid;		
		$currentInTime	   			= Carbon::now()->format('H:i:s');	
		$currentdate 	   			= Carbon::now();
		$currentuserdate   			= $currentdate->toDateString();
		
		$punchOutTime      			= PunchModel::find($id);		
		$punchOutTime->uid 			= $currentUser;
		$punchOutTime->day 			= $currentuserdate;
		$punchOutTime->time_out 	= $currentInTime;
		$punchOutTime->hours 		= $total_work;
		$punchOutTime->update();
		
		return response()->json([
			"status"=>200,
			'id'=>$id
		]);
	}
	
	
	
	
	
	
	//get all days activity
	public function alldaysactivity($days){
		$uid	   		   = Auth::user()->uid;
		$alldaysactivity   = activitymodel::where('uid', $uid)->where('day', $days)->get();
		return response()->json([
			'status'=>200,
			'alldaysactivity'=>$alldaysactivity,
		]);
	}
	
	// Show employeee profile
	public function employeeprofile(){
		$ueruid					= Auth::user()->uid;
		$profile 				= User::where("uid",$ueruid)->first();
		$PersonalInformation 	= PersonalInformation::where("uid",$ueruid)->first();
		$EmergencyConatct 		= EmergencyConatct::where("uid",$ueruid)->first();
		$FamilyInformation 		= FamilyInformation::where("uid",$ueruid)->get();
		$educationinformation 	= educationinformation::where("uid",$ueruid)->get();
		$ExperienceModel 		= ExperienceModel::where("uid",$ueruid)->get();
		$getbankinformation 	= bankinformation::where("uid",$ueruid)->get();
		return view('employee/profile',compact('profile','PersonalInformation','EmergencyConatct','FamilyInformation','educationinformation','ExperienceModel','getbankinformation'));
	}
	
	// Update employee profile
	public function update_profile(Request $request,$id){
		
		$update_profile 			 = User::find($id);
		$update_profile->name 		 = $request->get('name');
		$update_profile->last_name 	 = $request->get('last_name');
		$update_profile->birth_date  = $request->get('birth_date');
		$update_profile->gender 	 = $request->get('gender');
		$update_profile->address 	 = $request->get('address');
		$update_profile->state 		 = $request->get('state');
		$update_profile->country 	 = $request->get('country');
		$update_profile->pin_code 	 = $request->get('pin_code');
		$update_profile->phone 		 = $request->get('phone');
		$update_profile->department  = $request->get('department');
		$update_profile->designation = $request->get('designation');
		$update_profile->report_to 	 = $request->get('report_to');
		if($files = $request->file('profile_pic')){  
			$name = $files->getClientOriginalName();  
			$files->move('images',$name);  
			$update_profile->profile_pic = $name;  
		}  
		$update_profile->save();
		return redirect()->back()->with('update_profile', 'Updated Profile Successfully!');
	}
	
	
	// Add Personal Informations
	public function add_personal_information(Request $request){
		
		$request->validate([
			'passport_no'=>'required',
			'passport_expiry_date'=>'required',
			'phone'=>'required|numeric',
			'nationality'=>'required',
			'marital_status'=>'required',
		]);
		 
		$PersonalInformation 						= new PersonalInformation;
		$PersonalInformation->uid					= Auth::user()->uid;
		$PersonalInformation->passport_no 			= $request->get('passport_no');
		$PersonalInformation->passport_expiry_date 	= $request->get('passport_expiry_date');
		$PersonalInformation->phone 				= $request->get('phone');
		$PersonalInformation->nationality 			= $request->get('nationality');
		//$PersonalInformation->religion 				= $request->get('religion');
		$PersonalInformation->marital_status		= $request->get('marital_status');
		$PersonalInformation->spouse 				= $request->get('spouse');
		$PersonalInformation->no_children 			= $request->get('no_children');
		$PersonalInformation->save();
		return redirect()->back()->with('add_Personal_Information', 'Personal Information Added Successfully!');
	}
		
	// update Personal Informations
	public function update_personal_information(Request $request, $id){
		$request->validate([
			'passport_no'=>'required',
			'passport_expiry_date'=>'required',
			'phone'=>'required|numeric',
			'nationality'=>'required',
			'edit_marital_status'=>'required',
		]);
		$PersonalInformation 						=  PersonalInformation::find($id);
		$PersonalInformation->passport_no 			= $request->get('passport_no');
		$PersonalInformation->passport_expiry_date 	= $request->get('passport_expiry_date');
		$PersonalInformation->phone 				= $request->get('phone');
		$PersonalInformation->nationality 			= $request->get('nationality');
		$PersonalInformation->marital_status		= $request->get('edit_marital_status');
		$PersonalInformation->spouse 				= $request->get('spouse');
		$PersonalInformation->no_children 			= $request->get('no_children');
		$PersonalInformation->save();
		//return redirect()->route('employeeprofile');
		return redirect()->back()->with('update_personal_information', 'Personal Information Updated Successfully!');
	}
		
	public function add_emgen_contact(Request $request){
		$request->validate([
				'primary_name'=>'required',
				'primary_relation'=>'required',
				'primary_phone'=>'required|numeric',
				'secondary_name'=>'required',
				'secondary_relation'=>'required',
				'secondary_phone'=>'required|numeric',
			]);	
		$EmergencyConatct 					   = new EmergencyConatct;
		$EmergencyConatct->uid				   = Auth::user()->uid;		
		$EmergencyConatct->primary_name 	   = $request->get('primary_name');	
		$EmergencyConatct->primary_relation    = $request->get('primary_relation');	
		$EmergencyConatct->primary_phone 	   = $request->get('primary_phone');	
		$EmergencyConatct->primary_phone2 	   = $request->get('primary_phone2');	
		$EmergencyConatct->secondary_name 	   = $request->get('secondary_name');	
		$EmergencyConatct->secondary_relation  = $request->get('secondary_relation');	
		$EmergencyConatct->secondary_phone 	   = $request->get('secondary_phone');	
		$EmergencyConatct->secondary_phone2    = $request->get('secondary_phone2');	
		$EmergencyConatct->save();
		return redirect()->back()->with('add_emgen_contact', 'Emergency Contact Details Added Successfully!');
	}	
	
	public function update_emgen_contact(Request $request,$id){
		$request->validate([
				'primary_name'=>'required',
				'primary_relation'=>'required',
				'primary_phone'=>'required|numeric',
				'secondary_name'=>'required',
				'secondary_relation'=>'required',
				'secondary_phone'=>'required|numeric',
			]);	
		$updateemergency 					 = EmergencyConatct::find($id);	
		$updateemergency->primary_name 		 = $request->get('primary_name');	
		$updateemergency->primary_relation   = $request->get('primary_relation');	
		$updateemergency->primary_phone 	 = $request->get('primary_phone');	
		$updateemergency->primary_phone2 	 = $request->get('primary_phone2');	
		$updateemergency->secondary_name 	 = $request->get('secondary_name');	
		$updateemergency->secondary_relation = $request->get('secondary_relation');	
		$updateemergency->secondary_phone 	 = $request->get('secondary_phone');	
		$updateemergency->secondary_phone2   = $request->get('secondary_phone2');	
		$updateemergency->save();
		return redirect()->back()->with('update_emgen_contact', 'Emergency Contact Details Updated Successfully!');
	}
	
	public function addfamilymember(Request $request){
		$request->validate([
				'name'=>'required',
				'relation'=>'required',
				'date_birth'=>'required',
				'phone'=>'required|numeric',
			]);
		$FamilyInformation	 		 	= new FamilyInformation;
		$FamilyInformation->uid		 	= Auth::user()->uid;		
		$FamilyInformation->name 	 	= $request->get('name');	
		$FamilyInformation->relation 	= $request->get('relation');	
		$FamilyInformation->date_birth 	= $request->get('date_birth');	
		$FamilyInformation->phone 	 	= $request->get('phone');
		$FamilyInformation->save();
		return redirect()->back()->with('addfamilymember', 'Family Informations Added Successfully!');
	}
	
	public function familydestroy($id){
		$familydestroy = FamilyInformation::find($id);
		$familydestroy->delete();
		return redirect()->back()->with('familydestroy', 'Family Informations Deleted Successfully!');
	}
	
	public function editfamliy($id){
		$editfamliy = FamilyInformation::find($id);
		return view('employee.editfamliy',compact('editfamliy'));
	}
	
	public function updatefamilymember(Request $request, $id){
		$request->validate([
				'name'=>'required',
				'relation'=>'required',
				'date_birth'=>'required',
				'phone'=>'required|numeric',
			]);	
		$updatefamilymember	 		 	 = FamilyInformation::find($id);	
		$updatefamilymember->name 	 	 = $request->get('name');	
		$updatefamilymember->relation 	 = $request->get('relation');	
		$updatefamilymember->date_birth  = $request->get('date_birth');	
		$updatefamilymember->phone 	 	 = $request->get('phone');
		$updatefamilymember->save();
		return redirect()->route('employeeprofile')->with('updatefamilymember', 'Family Informations Updated Successfully!');		
	}
	
	public function addeducation(Request $request){
		$request->validate([
			'institue'=>'required',
			'education'=>'required',
			'passing_year'=>'required',
			'marks_obtained'=>'required',
			'stream'=>'required',
			'grade'=>'required',
		]);
	
		$education       = $request->get('education');	
		$passing_year    = $request->get('passing_year');	
		$marks_obtained  = $request->get('marks_obtained');
		$stream 		 = $request->get('stream');
		$grade 			 = $request->get('grade');
		
		foreach($request->get('institue') as $key=>$institue){
			$educationinformation 			      = new educationinformation;
			$educationinformation->uid		      = Auth::user()->uid;	
			$educationinformation->institue       = $institue;
			$educationinformation->education 	  = $education[$key];	
			$educationinformation->passing_year   = $passing_year[$key];	
			$educationinformation->marks_obtained = $marks_obtained[$key];
			$educationinformation->stream 	      = $stream[$key]; 
			$educationinformation->grade 	      = $grade[$key];
			$educationinformation->save();
		}
		return redirect()->back()->with('addeducation', 'Education Informations Added Successfully!');			
		
	}
	
	public function educationdestroy($id){
		$educationdestroy = educationinformation::find($id);
		$educationdestroy->delete();
		return redirect()->back()->with('educationdestroy', 'Education Informations Deleted Successfully!');		
	}
	
	
	public function addexperience(Request $request){
		
		$request->validate([
			"company_name"=>"required",
			"position"=>"required",
			"add_experience"=>"required",
			"location"=>"required",
		]);	
		
		$position 		= $request->get('position');
		$add_experience = $request->get('add_experience');
		$location	    = $request->get('location');
		foreach($request->get('company_name') as $key => $company_name){
			$Experience 				= new ExperienceModel;
			$Experience->uid		 	= Auth::user()->uid;
			$Experience->company_name 	= $company_name;
			$Experience->position 		= $position[$key];
			$Experience->add_experience = $add_experience[$key];
			$Experience->location 	    = $location[$key];
			$Experience->save();
		}
		return redirect()->back()->with('addexperience', ' Experience Informations Added Successfully!'); 			
	}
	
	public function experiencedestroy($id){
		$experiencedestroy = ExperienceModel::find($id);
		$experiencedestroy->delete();
		//return redirect()->route('employeeprofile');
		return redirect()->back()->with('experiencedestroy', ' Experience Informations Deleted Successfully!');	
	}
	
	public function holiday(){
		$getallholiday = holidaymodel::all();
		Auth::user()->unreadNotifications->where('data', '=', "Holiday")->markAsRead();
		return view('employee/holiday',compact('getallholiday'));
	}
	
	
	public function hraddholiday(Request $request){
		$request->validate([
			'name'=>'required',
			'date'=>'required',
		]);
		$addholiday 		= new holidaymodel;
		$addholiday->name 	= $request->get('name');
		$addholiday->date 	= $request->get('date');
		$addholiday->save();
		$user 		= User::all();
		Notification::send($user, new MyFirstNotification('Holiday'));
		return redirect()->back()->with('addholiday','Add Holiday Successfully!');
	}
	
	public function hreditholiday($id){
		$editholiday = holidaymodel::find($id);
		return response()->json([
			"status"=>200,
			"editholiday"=>$editholiday
		]);
	}
	
	public function hrupdateholiday(Request $request){
		$id 					= $request->get('id');
		$updateholiday 			= holidaymodel::find($id);
		$updateholiday->name 	= $request->get('update_name');
		$updateholiday->date 	= $request->get('update_date');
		$updateholiday->save();
		return redirect()->back()->with('updateholiday','Add Holiday Successfully!');
	}
	
	public function  hrdeleteholiday($id){
		$deleteholiday = holidaymodel::find($id);
		$deleteholiday->delete();
		return redirect()->back()->with('deleteholiday','Delete Holiday Successfully!');
	}
	
	
	// Ticket for user
	public function ticket(){
		$uid 			= Auth::user()->uid;
		$TicketsModel 	= TicketsModel::join('users','users.uid','=','tickets.assign_staff')->where('tickets.uid',$uid)->orWhere('tickets.assign_staff',$uid)->orWhere('tickets.cc',$uid)->get(['users.uid','users.name','users.last_name','tickets.*']);
		$declined 		= TicketsModel::where('uid',$uid)->where('status','Declined')->count();
		$open 			= TicketsModel::where('uid',$uid)->where('status','Open')->count();
		$Onhold 		= TicketsModel::where('uid',$uid)->where('status','On Hold')->count();
		$allstaff 		= User::where('uid','!=',$uid)->get();
		Auth::user()->unreadNotifications->where('data', '=', "tickets_status")->markAsRead();
		return view('employee/ticket',compact('TicketsModel','declined','open','Onhold','allstaff'));
	}
	
	
	//show all tickckets
	public function tickets(){
		$TicketsModel 	= TicketsModel::all();	
		$declined 		= TicketsModel::where('status','Declined')->count();
		$open 			= TicketsModel::where('status','Open')->count();
		$Onhold 		= TicketsModel::where('status','On Hold')->count();
		return view('admin/tickets',compact('TicketsModel','declined','open','Onhold'));
	}
	
	//show tickets on dropdown
	public function showtickets($id){
		$showtickets = TicketsModel::find($id);	
		return response()->json([
			"status"=>200,
			"showtickets"=>$showtickets,
		]);
	}
	
	//send tickets open request
	public function ticketopen(Request $request, $id){
		$ticketopen 			= TicketsModel::find($id);
		$ticketopen->status 	= "Open";
		$ticketopen->update();
		return redirect()->back()->with('Open','Ticket Open Successfully');
	}
	
	//Send tickckets reopen request
	public function reopened(Request $request, $id){
		$reopened 			= TicketsModel::find($id);
		$reopened->status 	= "Reopened";
		$reopened->update();
		return redirect()->back()->with('reopened','Ticket Reopened Successfully');
	}
	
	//Send tickets on hold request
	public function Onhold(Request $request, $id){
		$Onhold 			= TicketsModel::find($id);
		$Onhold->status 	= "On Hold";
		$Onhold->update();
		return redirect()->back()->with('Onhold','Ticket On hold Successfully');
	}
	
	//Send tickets close request
	public function Closed(Request $request, $id){
		$Closed 		= TicketsModel::find($id);
		$Closed->status = "Closed";
		$Closed->update();
		return redirect()->back()->with('Closed','Ticket Closed Successfully');
	}
	
	//Send tickets Inprogress request
	public function Inprogress(Request $request, $id){
		$Inprogress 		= TicketsModel::find($id);
		$Inprogress->status = "In Progress";
		$Inprogress->update();
		return redirect()->back()->with('Inprogress','Ticket Inprogress Successfully');
	}
	
	//Send tickets cancelled request
	public function ticketdeclined(Request $request, $id){
		$ticketdeclined 		= TicketsModel::find($id);
		$ticketdeclined->status = "Declined";
		$ticketdeclined->update();
		return redirect()->back()->with('ticketdeclined','Ticket Declined Successfully');
	}
	
	public function addticket(Request $request){
		$request->validate([
			"ticket_subject"=>"required",
			"assign_staff"=>"required",
			//"client"=>"required",
			"priority"=>"required",
			"cc"=>"required",
			"description"=>"required",
		]);	
		
		$TicketsModel 					= new TicketsModel;
		$TicketsModel->uid		 		= Auth::user()->uid;
		$TicketsModel->ticket_subject 	= $request->get('ticket_subject');
		$TicketsModel->assign_staff 	= $request->get('assign_staff');
		//$TicketsModel->client 			= $request->get('client');
		$TicketsModel->priority 		= $request->get('priority');
		$TicketsModel->cc 				= $request->get('cc');
		$TicketsModel->description 		= $request->get('description');
		$TicketsModel->status 			= "Open";
		
		if($files = $request->file('file')){  
			$name = $files->getClientOriginalName();  
			$files->move('images',$name);  
			$TicketsModel->file = $name;  
		}  
		$TicketsModel->save();
		
		$user 		= User::all();
		Notification::send($user, new MyFirstNotification("ticket"));
		return redirect()->back()->with('message', 'Add New Ticket Successfully!');
	}
	
	
	public function ticketdestroy($id){
		$deleteticket = TicketsModel::find($id);
		$deleteticket->delete();
		return redirect()->back()->with('delete', 'Ticket Deleted Successfully!');
	}
	
	// edit tickets with popup
	public function edittickets($id){
		$edittickets = TicketsModel::find($id);
		return response()->json([
			'status'=>200,
			'edittickets'=>$edittickets,
		]);
	}
	
	public function updatetickets(Request $request){
		$id 					= $request->get('update_id');
		$update 				= TicketsModel::find($id);
		$update->ticket_subject = $request->get('ticket_issue');
		$update->assign_staff 	= $request->get('assignstaff');
		$update->client 		= $request->get('clients');
		$update->priority 		= $request->get('prioritys');
		$update->cc 			= $request->get('ccs');
		$update->description 	= $request->get('descriptions');
		if($files = $request->file('files')){  
			$name = $files->getClientOriginalName();  
			$files->move('images',$name);  
			$update->file = $name;  
		} 
		$update->update();
		return redirect()->back()->with('message', 'Ticket Updated Successfully!');
	}
		
		
	// projects part
	public function projects(){
		$uid 	  = Auth::user()->id;
		$project  = projectmodel::whereHas('users', function ($query) use ($uid){
							$query->whereKey($uid);
					})->get();
		Auth::user()->unreadNotifications->where('data', '=', "projects")->markAsRead();			
		return view('employee/projects',compact('project'));
	}
	
	/* public function addprojects(Request $request){
		
		$request->validate([
			"project_name"=>"required",
			"client"=>"required",
			"start_date"=>"required",
			"end_date"=>"required",
			"priority"=>"required",
			"project_leader"=>"required",
			"add_team"=>"required",
			"description"=>"required",
			"image"=>"required",
		]);
		$project_name = $request->get('project_name');
		$client = $request->get('client');
		$start_date = $request->get('start_date');
		$end_date = $request->get('end_date');
		$priority = $request->get('priority');
		$project_leader = $request->get('project_leader');
		$add_team = $request->get('add_team');
		$description = $request->get('description');
		
		
		if($files = $request->file('image')){  
				$name = $files->getClientOriginalName();  
				$files->move('images',$name);  
				$file = $name;  
			} 
	} */
	
	public function project_view($id){
		$projectview = projectmodel::find($id);
		/* echo "<pre>";
		print_r($projectview); */
		return view('employee/projectview',compact('projectview'));
	}
	
	// Task
	public function task(){
		return view('employee/task');
	}
	
	public function addemployeetask(Request $request){
		$request->validate([
			'task_name'=>'required',
			'task_priority'=>'required',
			'due_dat'=>'required',
			'task_Status'=>'required',
		]);
		
		$addemployeetask 				= new TaskBoardModel;
		$addemployeetask->uid 			= Auth::user()->uid;
		$addemployeetask->task_name 	= $request->get('task_name');
		$addemployeetask->task_priority = $request->get('task_priority');
		$addemployeetask->due_date 		= $request->get('due_dat');
		$addemployeetask->status 		= $request->get('task_Status');
		$addemployeetask->save();
		$user 		= User::all();
		Notification::send($user, new MyFirstNotification("task"));
		return redirect()->back()->with('addemployeetask','Your new task added successflly!');
	}
	
	public function taskboard(){
		$user_uid 		= Auth::user()->uid;
		$getpending 	= TaskBoardModel::where('uid',$user_uid)->where('status','Pending')->get();
		$getprogres 	= TaskBoardModel::where('uid',$user_uid)->where('status','Progress')->get();
		$getcompleted 	= TaskBoardModel::where('uid',$user_uid)->where('status','completed')->get();
		$getInprogress 	= TaskBoardModel::where('uid',$user_uid)->where('status','Inprogress')->get();
		$getOnHold 		= TaskBoardModel::where('uid',$user_uid)->where('status','On Hold')->get();
		$getReview 		= TaskBoardModel::where('uid',$user_uid)->where('status','Review')->get();
		return view('employee/taskboard',compact('getpending','getprogres','getcompleted','getInprogress','getOnHold','getReview'));
	}
	
	public function employeetaskboardelete($id){
		$employeetaskboardelete = TaskBoardModel::find($id);
		$employeetaskboardelete->delete();
		return redirect()->back()->with('delete','Task delete successfully');
	}
	
	public function editemployeetaskboard($id){
		$find = TaskBoardModel::find($id);
		return response()->json([
			'status'=>200,
			'edit_id'=>$find
		]);
	}
	
	
	public function emplupdatetaskboard(Request $request){
		$taskboard_id			 			= $request->get('taskboard_id');
		$emplupdatetaskboard 				= TaskBoardModel::find($taskboard_id);
		$emplupdatetaskboard->task_name 	= $request->get('edit_task_name');
		$emplupdatetaskboard->task_priority = $request->get('edit_task_priority');
		$emplupdatetaskboard->due_date 		= $request->get('edit_due_date');
		$emplupdatetaskboard->status 		= $request->get('edit_task_Status');
		$emplupdatetaskboard->update();
		$user 		= User::all();
		//$user_id 		= Auth::user()->id;
		Notification::send($user, new MyFirstNotification("task"));
		return redirect()->back()->with('emplupdatetaskboard','Task update successfully');
	}
	
	
	
	public function chat(){
		$uid = Auth::user()->uid;
		$get_message = livechat::where('uid',$uid)->get();
		return view('employee/chat',compact('get_message'));
	}
	
	public function emplsendchat(Request $request){
		$chat = new livechat;
		$chat->uid = Auth::user()->uid;
		$chat->message = $request->get('message');
		$chat->save();
		return redirect()->back();
	}
	
	// Add new feed
	public function addnewfeed(Request $request){
		$uid          = Auth::user()->uid;
		$current_user = User::where('uid',$uid)->first();
		$message 	  = $request->input('message');
		
		if($files = $request->file('files')){
			$name = $files->getClientOriginalName();  
			$files->move('images',$name);  
		}
		if(!empty($message) || !empty($files)){
			if(!empty($files)){
				$addfee = new Feed([
					'uid'=>$uid,
					'message'=>$message,
					'files'=>$name
				]); 
			}else{
				$addfee = new Feed([
					'uid'=>$uid,
					'message'=>$message,
				]); 
			}
			$addfee->save(); 
		}
		return Response()->json([
			'current_message'=>$addfee,
			'current_user'=>$current_user
		]);
	}
	
	
	public function hrleavereasonshow($id){
		$leavereasonshow = EmployeeModel::find($id);
		return response()->json([
			"status"=>200,
			"leavereasonshow"=>$leavereasonshow
		]);
	}
	
	public function hrapproved(Request $request, $id){
		$username 						= Auth::user()->name;
		$last_name						= Auth::user()->last_name;
		$approvedstatus 				= EmployeeModel::find($id);
		$approvedstatus->status 		= "Approved"; 
		$approvedstatus->approved_by 	= $username." ".$last_name; 
		$approvedstatus->update();
		
		$user 		= User::all();
		Notification::send($user, new MyFirstNotification('leave_status'));
		return redirect()->back()->with('approvedstatus','Approved Successfully!'); 
	}
	
	public function hrdeclined(Request $request, $id){
		$username 						= Auth::user()->name;
		$last_name						= Auth::user()->last_name;
		$declinedstatus 				= EmployeeModel::find($id);
		$declinedstatus->status 		= "Declined"; 
		$declinedstatus->approved_by 	= $username." ".$last_name; 
		$declinedstatus->update();
		$user 		= User::all();
		Notification::send($user, new MyFirstNotification('leave_status'));
		return redirect()->back()->with('declinedstatus','Declined Successfully!');
	}
	
	
	//Attendacne
	public function hrviewallattendance(){
		$PunchModel 		= User::where('id','!=','1')->get();
		$month 				= Carbon::now()->format('m');
		$employeeattendance = PunchModel::whereMonth('day',$month)->get();
		$employeeattendance = collect($employeeattendance)->toArray();
		if(count($employeeattendance)>0){
			foreach($employeeattendance as $key => $row)
			{
				$day[$key] = $row['day'];
			}
			array_multisort($day, SORT_ASC, $employeeattendance);
		}
		
		return view('employee.viewallattendance',compact('PunchModel','employeeattendance'));
	}
	
	public function hr_update_attendance(Request $request){
		$attendance_id  = $request->get('attend_id');
		//$edit_hours 	= $request->get('edit_hours');
		$time_in 		= $request->get('time_in');
		$time_out 		= $request->get('time_out');
	    $updated = PunchModel::find($attendance_id);
		$updated->time_in =  $time_in;
		$updated->time_out =  $time_out;
		$updated->save();
		return redirect()->back()->with('update','Attendacne Updated Successfully!');
	}

	
	public function managerproject(){
		$project    = projectmodel::with('users')->get();
		$getalluser = User::all();
		return view('employee.managerprojects',compact('project','getalluser'));  
		
	}
	
	public function managercreateproject(Request $request){
		$request->validate([
			'project_name'=>'required',
			'status'=>'required',
			'enddate'=>'required',
			'projectlead'=>'required',
			'priority'=>'required',
			'description'=>'required',
			'status'=>'required',
		]); 
		
		$project 				 = new projectmodel;
		$project->project_name   = $request->get('project_name');
		$project->deadline 	     = $request->get('enddate');
		$project->priority 	     = $request->get('priority');
		$project->status 	     = $request->get('status');
		$project->description 	 = $request->get('description');
		
		if($files = $request->file('image')){  
			$name = $files->getClientOriginalName();  
			$project->files = $name;  
		}
		$project->save();
		
		// assign product of user
		$user_uid = $request->get('projectlead');
		$project->users()->attach($user_uid);
		
		$user 		= User::all();
		Notification::send($user, new MyFirstNotification("projects")); 
		return redirect()->back()->with('addedproject','Project Added Successfully!');
	}
	
	public function managerprojectedit($id){
		$projectedit   =   projectmodel::with('users')->find($id);
		return response()->json([
			'status'=>200,
			'projectedit'=>$projectedit
		]);
	}
	
	public function managerupdateproject(Request $request){
		$id 							= $request->get('project_id');
		$updateproject 					= projectmodel::find($id);
		$updateproject->project_name 	= $request->get('edit_project_name');
		$updateproject->deadline 		= $request->get('edit_enddate');
		$updateproject->priority 		= $request->get('edit_priority');
		$updateproject->status 	        = $request->get('edit_status');
		$updateproject->description 	= $request->get('edit_description');
		if($files = $request->file('edit_image')){  
			$name = $files->getClientOriginalName();  
			$files->move('images',$name);  
			$updateproject->files = $name;  
		}
		$updateproject->update();
		
		$user_uid = $request->get('edit_projectlead');
        $updateproject->users()->sync($user_uid);
		
		$user 		= User::all();
		Notification::send($user, new MyFirstNotification("projects")); 
		return redirect()->back()->with('updateproject','Project Update Successfully!');
		
	}
	
	public function managerprojectdelete($id){
		$projectdelete = projectmodel::find($id);
		$projectdelete->delete();
		$del_assign_user = [];
		$projectdelete->users()->sync($del_assign_user);
		return redirect()->back()->with('projectdelete','Project delete successfully!');
	}
	
	public function managerprojectview($id){
		$projectview = projectmodel::with('users')->where('id',$id)->first();
		return view('employee.managerprojectview',compact('projectview')); 
	}
	
	/* public function latestupdate(){
		$getlatestupdate = Latestupdate::latest()->get();
		return view('employee.showlatestupdate',compact('getlatestupdate'));
	} */
	
	public function addlatestupdate(Request $request){
			$request->validate([
				'message'=>'required',
			]);
			$addnew = new Latestupdate();
			$addnew->message = $request->get('message');
			$addnew->save();
			return redirect()->back()->with('addupdate','Update added successflly!');
	}
	
	
}
