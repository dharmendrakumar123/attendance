<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\PersonalInformation;
use App\Models\EmergencyConatct;
use App\Models\FamilyInformation;
use App\Models\educationinformation;
use App\Models\ExperienceModel;
use App\Models\holidaymodel;
use App\Models\Employee\EmployeeModel;
use App\Models\Employee\PunchModel;
use App\Models\activitymodel;
use App\Models\uidpermission;
use App\Models\TicketsModel;
use App\Models\projectmodel;
use App\Models\TaskBoardModel;
use App\Models\assetmodel;
use App\Models\userrolemodel;
use App\Models\Role;
use App\Models\addemployeesalary;
use App\Models\total_leave;
use Carbon\Carbon;
use Auth;
use DB;
use PDF;
use Excel;
use App\Exports\userrolemodelExport;
use Notification;
use App\Notifications\MyFirstNotification;
use Illuminate\Notifications\Notifiable;
use App\Models\bankinformation;
use App\Models\livechat;
use DateTime;
use App\Models\Feed;
//use Spatie\Permission\Models\Permission;
use App\Models\Permission;
use App\Models\Latestupdate;

class AdminController extends Controller
{
   
	/*  public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Superadmin');
    }  */
   
	//Show user page
	public function user(){
		$showuser   = User::with('roles')->get();
		$roles	    = Role::where('name', '!=', 'Superadmin')->get();
		$Permission = Permission::all();
		return view('admin/users',compact('showuser','roles','Permission'));
	}
	
	// Add new user
	public function adduser(Request $request){
	    $request->validate([  
            'first_name'=>'required|max:255',
            'last_name'=>'required|max:255',
            'username'=>'required|max:255',
            'company'=>'required|max:255',
            'join_date'=>'required',
            'department'=>'required',
            'designation'=>'required',
            'gender'=>'required',
            'email'=>'required|string|email|max:191|unique:users',
            'phone'=>'required|min:10|numeric', 
            'uid'=>'required|numeric|unique:users', 
            'role'=>'required',
			'password' => 'required|string|min:6|confirmed',	
        ]);
	    $adduser 				= new User;  
		$adduser->name  		= $request->get('first_name');  
		$adduser->last_name 	= $request->get('last_name');  
		$adduser->username 		= $request->get('username');  
		$adduser->company 		= $request->get('company');  
		$adduser->email 		= $request->get('email');  
		$adduser->phone 		= $request->get('phone');  
		$adduser->uid   		= $request->get('uid');  
		//$adduser->role  		= $request->get('role');  	
		$adduser->joining_date  = $request->get('join_date');  	
		$adduser->department  	= $request->get('department');  	
		$adduser->designation   = $request->get('designation');  	
		$adduser->gender  		= $request->get('gender');  	
		$adduser->profile_pic   = "user_dummy_pic.jpg";  	
        $adduser->password 		= Hash::make($request->get('password'));  	
		$adduser->save();  
		$adduser->roles()->attach([$request->get('role')]);
		$adduser->permissions()->attach($request->get('attendace'));
		
		//Auto fill attendace 
		$Today       = Carbon::today()->toDateString();
		$current_day = strtotime($Today);
		$year_month  = date('y-m',$current_day);
		$joining_date = strtotime($request->get('join_date'));
		$total_day    = date('d',$joining_date);
		
		for($i=1; $i<=$total_day; $i++){
			$currentdates 				= Carbon::now();
			$currentuserdate 			= $currentdates->toDateString();
			$autofillpunchin 			= new PunchModel;
			$autofillpunchin->uid 		= $request->get('uid'); 
			$autofillpunchin->day		= $year_month."-".$i;
			$autofillpunchin->time_in 	= "00:00:00";	
			$autofillpunchin->save();  
		}
		return redirect()->back()->with('adduser', 'Add New User Successfuly!'); 
	}
	
	public function userdelete($id){
		$userdelete = User::find($id);
		$userdelete->delete();
		return redirect()->back()->with('userdelete', 'User delete Successfuly!');
		
	}
	
	public function edituser($id){
		$edituser 	    = User::with('roles')->where('id',$id)->first();
		$permission     = Permission::all();
		$userPermission = DB::table("users_permission")->where("users_permission.user_id",$id)
            ->pluck('users_permission.permission_id','users_permission.permission_id')
            ->all();
		return view('admin.edituser',compact('edituser','permission','userPermission'));
		/* return response()->json([
			'status'=>200,
			'edituser'=>$edituser,
			'permission'=>$permission,
		]);  */
	}
	
	public function updateuser(Request $request){
		
		/* $request->validate([
			'attendace'=>'required'
		]);
		 */
		$id 							 = $request->get('user_id');
		//$permission_uid 				 = $request->get('permission_uid');
		
		$updateuser 					 = User::find($id);
		$updateuser->name 				 = $request->get('firstname');
		$updateuser->last_name  		 = $request->get('lastname');
		$updateuser->username   		 = $request->get('usernames');
		$updateuser->email 				 = $request->get('user_email');
		$updateuser->phone 				 = $request->get('user_phone');
		//$updateuser->role 				 = $request->get('user_role');
		$updateuser->company    		 = $request->get('user_company');
		$updateuser->uid 				 = $request->get('user_uid');
		$updateuser->joining_date   	 = $request->get('joining_date');  	
		$updateuser->department     	 = $request->get('user_department');  	
		$updateuser->designation    	 = $request->get('user_designation');  	
		$updateuser->gender  			 = $request->get('genders'); 
		$updateuser->update(); 
		
		$updateuser->roles()->sync([$request->get('user_role')]);
		$updateuser->permissions()->sync($request->get('attendac_permission'));	
	
		/*$uidpermission = uidpermission::where('uid',$permission_uid)->delete();
		foreach($attendace_user as  $attendace_user_permisson){	
			//$uidpermission = uidpermission::where('uid',$permission_uid)->delete();
			//$uidpermission 					 = uidpermission::find($permission_uid);
			$uidpermission 					= new uidpermission;
			//$uidpermission = uidpermission::where('uid',$permission_uid);
			$uidpermission->permission_id	=  $attendace_user_permisson;  	
			$uidpermission->uid				=  $permission_uid;  	
			$uidpermission->save(); 	
		} 
		*/
		
		return redirect()->route('user')->with('updateuser', 'Update detail Successfuly!');
	}
	
	public function profile(){
		$ueruid	= Auth::user()->uid;
		$profile = User::where("uid",$ueruid)->first();
		$adminPersonalInformation = PersonalInformation::where("uid",$ueruid)->first();
		
		$getEmergencyConatct = EmergencyConatct::where("uid",$ueruid)->first();
		
		return view('admin/profile',compact('profile','adminPersonalInformation','getEmergencyConatct'));
	}
	
	
		// Update employee profile
	public function profileupdate(Request $request,$id){
		
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
	
		
	// update Personal Informations
	public function admin_update_personal(Request $request, $id){
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
		return redirect()->back()->with('admin_update_personal', 'Personal Information Updated Successfully!'); 
	}
	
	// Update admin emegency contact details	
	public function admin_add_emergency_contact(Request $request){
		$request->validate([
				'primary_name'=>'required',
				'primary_relation'=>'required',
				'primary_phone'=>'required|numeric',
				'secondary_name'=>'required',
				'secondary_relation'=>'required',
				'secondary_phone'=>'required|numeric',
			]);	
		$EmergencyConatct 						= new EmergencyConatct;
		$EmergencyConatct->uid					= Auth::user()->uid;		
		$EmergencyConatct->primary_name 		= $request->get('primary_name');	
		$EmergencyConatct->primary_relation 	= $request->get('primary_relation');	
		$EmergencyConatct->primary_phone 		= $request->get('primary_phone');	
		$EmergencyConatct->primary_phone2 		= $request->get('primary_phone2');	
		$EmergencyConatct->secondary_name 		= $request->get('secondary_name');	
		$EmergencyConatct->secondary_relation 	= $request->get('secondary_relation');	
		$EmergencyConatct->secondary_phone 		= $request->get('secondary_phone');	
		$EmergencyConatct->secondary_phone2 	= $request->get('secondary_phone2');	
		$EmergencyConatct->save();
		return redirect()->back()->with('admin_add_emergency_contact', 'Emergency Contact Details Added Successfully!'); 
	}
	
	public function allemployee(){
		//$allemployee = User::where('role','employee')->orwhere('role','client')->get();
		$id = Auth::user()->id;
		$allemployee = User::with('roles')->where('id','!=',$id)->get();
		
		return view('admin/allemployee',compact('allemployee'));
	}
		
	public function allemployeeprofile($uid){
		$profile 					= User::where('uid',$uid)->first();
		$getpresonalinformation 	= PersonalInformation::where("uid",$uid)->first();
		$getEmergencyConatct 		= EmergencyConatct::where("uid",$uid)->first();
		$getFamilyInformation 		= FamilyInformation::where("uid",$uid)->get();
		$geteducationinformation 	= educationinformation::where("uid",$uid)->get();
		$getexperiencemodel 		= ExperienceModel::where("uid",$uid)->get();
		$getbankinformation 		= bankinformation::where("uid",$uid)->get();
	
		return view('admin/allemployeeprofile',compact("profile","getpresonalinformation","getEmergencyConatct","getFamilyInformation","geteducationinformation","getexperiencemodel","getbankinformation"));
	}	
	
	
	// Update employee profile
	public function allemployeeprofileupdate(Request $request,$id){
		
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
			$files->move('allemployeeprofile/images',$name);  
			$update_profile->profile_pic = $name;  
		}  
		$update_profile->save();
		return redirect()->back()->with('update_profile', 'Updated Profile Successfully!'); 
	}
	
	// Admin add Personal Informations
	public function admin_personal_information(Request $request){
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
		$PersonalInformation->marital_status		= $request->get('marital_status');
		$PersonalInformation->spouse 				= $request->get('spouse');
		$PersonalInformation->no_children 			= $request->get('no_children');
		$PersonalInformation->save();
		return redirect()->back()->with('admin_personal_information', 'Personal Information Added Successfully!');
	}
	
	//Add admin all employee person information
	public function admin_add_personal_information(Request $request){
		$request->validate([
			'passport_no'=>'required',
			'passport_expiry_date'=>'required',
			'phone'=>'required|numeric',
			'nationality'=>'required',
			'marital_status'=>'required',
		]);
		
		$PersonalInformation 						= new PersonalInformation;
		$PersonalInformation->uid					= $request->get('uid');
		$PersonalInformation->passport_no 			= $request->get('passport_no');
		$PersonalInformation->passport_expiry_date 	= $request->get('passport_expiry_date');
		$PersonalInformation->phone 				= $request->get('phone');
		$PersonalInformation->nationality 			= $request->get('nationality');
		$PersonalInformation->marital_status		= $request->get('marital_status');
		$PersonalInformation->spouse 				= $request->get('spouse');
		$PersonalInformation->no_children 			= $request->get('no_children');
		$PersonalInformation->save();
		return redirect()->back()->with('admin_add_personal_information', 'Personal Information Added Successfully!');
	}
	
	public function employee_update_personal(Request $request, $id){
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
		return redirect()->back()->with('employee_update_personal', 'Personal Information Updated Successfully!');
	}
	
	
	//Emergency Contact
	public function add_employee_emgen_contact(Request $request){
		
		$request->validate([
			'primary_name'=>'required',
			'primary_relation'=>'required',
			'uid'=>'required',
			'primary_phone'=>'required|numeric',
			'secondary_name'=>'required',
			'secondary_relation'=>'required',
			'secondary_phone'=>'required|numeric',
		]);	
		$EmergencyConatct 						= new EmergencyConatct;
		$EmergencyConatct->uid					= $request->get('uid');		
		$EmergencyConatct->primary_name 		= $request->get('primary_name');	
		$EmergencyConatct->primary_relation 	= $request->get('primary_relation');	
		$EmergencyConatct->primary_phone 		= $request->get('primary_phone');	
		$EmergencyConatct->primary_phone2 		= $request->get('primary_phone2');	
		$EmergencyConatct->secondary_name 		= $request->get('secondary_name');	
		$EmergencyConatct->secondary_relation   = $request->get('secondary_relation');	
		$EmergencyConatct->secondary_phone 		= $request->get('secondary_phone');	
		$EmergencyConatct->secondary_phone2 	= $request->get('secondary_phone2');	
		$EmergencyConatct->save();
		return redirect()->back()->with('add_employee_emgen_contact', 'Emergency Contact Details Added Successfully!'); 
	}
	
	
	public function update_employee_emgen_contact(Request $request,$id){
		$request->validate([
			'primary_name'=>'required',
			'primary_relation'=>'required',
			'primary_phone'=>'required|numeric',
			'primary_phone2'=>'required|numeric',
			'secondary_name'=>'required',
			'secondary_relation'=>'required',
			'secondary_phone'=>'required|numeric',
			'secondary_phone2'=>'required|numeric',
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
		return redirect()->back()->with('update_employee_emgen_contact', 'Emergency Contact Details Updated Successfully!');
	}
	
	public function addemployeefamilymember(Request $request){
		$request->validate([
			'name'=>'required',
			'uid'=>'required',
			'relation'=>'required',
			'date_birth'=>'required',
			'phone'=>'required|numeric',
		]);
			
		$FamilyInformation	 		 	= new FamilyInformation;
		$FamilyInformation->uid		 	= $request->get('uid');		
		$FamilyInformation->name 	 	= $request->get('name');	
		$FamilyInformation->relation 	= $request->get('relation');	
		$FamilyInformation->date_birth 	= $request->get('date_birth');	
		$FamilyInformation->phone 	 	= $request->get('phone');
		$FamilyInformation->save();
		return redirect()->back()->with('addemployeefamilymember', 'Family Informations Added Successfully!');
	}
	
	public function employeefamilydestroy($id){
		$employeefamilydestroy = FamilyInformation::find($id);
		$employeefamilydestroy->delete();
		return redirect()->back()->with('employeefamilydestroy', 'Family Informations Deleted Successfully!'); 
		
	}
	
	public function addeemployeeducation(Request $request){
		
		$request->validate([
			'uid'=>'required',
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
			$addeemployeeducation 			      = new educationinformation;
			$addeemployeeducation->uid		      = $request->get('uid');
			$addeemployeeducation->institue       = $institue;
			$addeemployeeducation->education 	  = $education[$key];	
			$addeemployeeducation->passing_year   = $passing_year[$key];	
			$addeemployeeducation->marks_obtained = $marks_obtained[$key];
			$addeemployeeducation->stream 	      = $stream[$key]; 
			$addeemployeeducation->grade 	      = $grade[$key];
			$addeemployeeducation->save();
		}
		return redirect()->back()->with('addeemployeeducation', 'Education Informations Added Successfully!');		 
	}
	
	public function employeeducationdestroy($id){
		$employeeducationdestroy = educationinformation::find($id);
		$employeeducationdestroy->delete();
		return redirect()->back()->with('employeeducationdestroy', 'Education Informations Deleted Successfully!'); 
	}
	
	public function addemployeeexperience(Request $request){
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
			$addemployeeexperience 				    = new ExperienceModel;
			$addemployeeexperience->uid		 	    = $request->get('uid');
			$addemployeeexperience->company_name 	= $company_name;
			$addemployeeexperience->position 		= $position[$key];
			$addemployeeexperience->add_experience  = $add_experience[$key];
			$addemployeeexperience->location 	    = $location[$key];
			$addemployeeexperience->save();
		}
		return redirect()->back()->with('addemployeeexperience', ' Experience Informations Added Successfully!');			
	}
	
	public function employeeexperiencedestroy($id){
		$employeeexperiencedestroy = ExperienceModel::find($id);
		$employeeexperiencedestroy->delete();
		return redirect()->back()->with('employeeexperiencedestroy', ' Experience Informations Deleted Successfully!');	
	}
	
	public function deleteemployee($id){
		$deleteemployee = User::find($id);
		$deleteemployee->delete();
		return redirect()->back()->with('deleteemployee','Delete employee successflly!');
	}
	
	// Holiday
	public function adminholiday(){
		$getallholiday = holidaymodel::all();
		//Insert markable data for notification
		//Auth::user()->unreadNotifications->markAsRead();
		return view('admin/holiday',compact('getallholiday'));
	}
	
	public function addholiday(Request $request){
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
	
	public function  deleteholiday($id){
		$deleteholiday = holidaymodel::find($id);
		$deleteholiday->delete();
		return redirect()->back()->with('deleteholiday','Delete Holiday Successfully!');
	}
	
	public function editholiday($id){
		$editholiday = holidaymodel::find($id);
		return response()->json([
			"status"=>200,
			"editholiday"=>$editholiday
		]);
	}
	
	public function updateholiday(Request $request){
		$id 					= $request->get('id');
		$updateholiday 			= holidaymodel::find($id);
		$updateholiday->name 	= $request->get('update_name');
		$updateholiday->date 	= $request->get('update_date');
		$updateholiday->save();
		return redirect()->back()->with('updateholiday','Add Holiday Successfully!');
	}
	
	//Admin leave
	public function adminleave(){
		$showallleave = EmployeeModel::join('users', 'employee_leave.uid', '=', 'users.uid')->get(['users.name','users.last_name','users.profile_pic', 'employee_leave.*']);
		Auth::user()->unreadNotifications->where('data', '=', "leave")->markAsRead();
		//Auth::user()->unreadNotifications->markAsRead();
		return view('admin/leave',compact('showallleave'));
	}
	
	
	public function approved(Request $request, $id){
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
	
	public function declined(Request $request, $id){
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
	
	public function leavereasonshow($id){
		$leavereasonshow = EmployeeModel::find($id);
		return response()->json([
			"status"=>200,
			"leavereasonshow"=>$leavereasonshow
		]);
	}
	
	
	//Attendacne
	public function adminattendance(){
		$id 				= Auth::user()->id;
		$PunchModel 		= User::where('id','!=',$id)->get();
		$month 				= Carbon::now()->format('m');
		$employeeattendance = PunchModel::whereMonth('day',$month)->get();
		//$employeeattendance = collect($employeeattendance)->sortBy('count')->reverse()->toArray();
		$employeeattendance = collect($employeeattendance)->toArray();
		
		if(count($employeeattendance)>0){
			foreach($employeeattendance as $key => $row)
			{
				$day[$key] = $row['day'];
			}
			array_multisort($day, SORT_ASC, $employeeattendance);
		}
		return view('admin/attendance',compact('PunchModel','employeeattendance'));
	} 
	
	public function viewattendacenstatus($id,$days){
		$viewattendacenstatus 	= PunchModel::find($id);
		$activitymodel 			= activitymodel::where('day',$days)->get();
		return response()->json([
			"status"=>200,
			"viewattendacenstatus"=>$viewattendacenstatus,
			"activitymodel"=>$activitymodel,
		]);
	}
	
	
	
	//show all tickckets
	public function tickets(){
		//$TicketsModel 	= TicketsModel::all();	
		$TicketsModel 	= TicketsModel::select('users.uid','users.name','users.last_name','tickets.*')->join('users','users.uid','=','tickets.assign_staff')->get();	
		
		$declined 		= TicketsModel::where('status','Declined')->count();
		$open 			= TicketsModel::where('status','Open')->count();
		$Onhold 		= TicketsModel::where('status','On Hold')->count();
		Auth::user()->unreadNotifications->where('data', '=', "ticket")->markAsRead();
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
	public function adminticketopen(Request $request, $id){
		$adminticketopen 			= TicketsModel::find($id);
		$adminticketopen->status 	= "Open";
		$adminticketopen->update();
		$user 		= User::all();
		Notification::send($user, new MyFirstNotification("tickets_status"));
		return redirect()->back()->with('Open','Ticket Open Successfully');
	}
	
	//Send tickckets reopen request
	public function adminreopened(Request $request, $id){
		$reopened 			= TicketsModel::find($id);
		$reopened->status 	= "Reopened";
		$reopened->update();
		$user 		= User::all();
		Notification::send($user, new MyFirstNotification("tickets_status"));
		return redirect()->back()->with('reopened','Ticket Reopened Successfully');
	}
	
	//Send tickets on hold request
	public function adminOnhold(Request $request, $id){
		$Onhold 			= TicketsModel::find($id);
		$Onhold->status 	= "On Hold";
		$Onhold->update();
		$user 		= User::all();
		Notification::send($user, new MyFirstNotification("tickets_status"));
		return redirect()->back()->with('Onhold','Ticket On hold Successfully');
	}
	
	//Send tickets close request
	public function adminClosed(Request $request, $id){
		$Closed 		= TicketsModel::find($id);
		$Closed->status = "Closed";
		$Closed->update();
		$user 		= User::all();
		Notification::send($user, new MyFirstNotification("tickets_status"));
		return redirect()->back()->with('Closed','Ticket Closed Successfully');
	}
	
	//Send tickets Inprogress request
	public function adminInprogress(Request $request, $id){
		$Inprogress 		= TicketsModel::find($id);
		$Inprogress->status = "In Progress";
		$Inprogress->update();
		$user 		= User::all();
		Notification::send($user, new MyFirstNotification("tickets_status"));
		return redirect()->back()->with('Inprogress','Ticket Inprogress Successfully');
	}
	
	//Send tickets cancelled request
	public function adminticketdeclined(Request $request, $id){
		$ticketdeclined 		= TicketsModel::find($id);
		$ticketdeclined->status = "Declined";
		$ticketdeclined->update();
		$user 		= User::all();
		Notification::send($user, new MyFirstNotification("tickets_status"));
		return redirect()->back()->with('ticketdeclined','Ticket Declined Successfully');
	}
	
	
	public function project(){
		//$project    = projectmodel::all();
		$project    = projectmodel::with('users')->get();
		$getalluser = User::all();
		return view('admin/project',compact('project','getalluser')); 
	}
	
	public function createproject(Request $request){
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
			//$projectmodel->addteam = $request->get('addteam');
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
	
	public function projectdelete($id){
		$projectdelete = projectmodel::find($id);
		$projectdelete->delete();
		$del_assign_user = [];
		$projectdelete->users()->sync($del_assign_user);
		return redirect()->back()->with('projectdelete','Project delete successfully!');
	}
	
	public function projectedit($id){
		$projectedit   =   projectmodel::with('users')->find($id);
		//$projectedit =   projectmodel::find($id);
		return response()->json([
			'status'=>200,
			'projectedit'=>$projectedit
		]);
	}
	
	public function updateproject(Request $request){
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
	
	public function projectview($id){
		//$projectview = projectmodel::find($id);
		$projectview = projectmodel::with('users')->where('id',$id)->first();
		return view('admin/projectview',compact('projectview'));
	}
	
	public function admintasks(){
		return view('admin/task');
	}
	
	public function admintasksboard(){
		$getpending 	= TaskBoardModel::where('status','Pending')->get();
		$getprogres 	= TaskBoardModel::where('status','Progress')->get();
		$getcompleted 	= TaskBoardModel::where('status','completed')->get();
		$getInprogres 	= TaskBoardModel::where('status','Inprogress')->get();
		$getonhold 		= TaskBoardModel::where('status','On Hold')->get();
		$getreview 		= TaskBoardModel::where('status','Review')->get();
		Auth::user()->unreadNotifications->where('data', '=', "task")->markAsRead();	
		return view('admin/tasksboard',compact('getpending','getprogres','getcompleted','getInprogres','getonhold','getreview'));
	}
	
	
	
	public function payslip(){
		return view('admin/payslip');
	}
	
	public function leavereport(){
		$id = Auth::user()->id;
		$get_all_user = User::where('id', '!=', $id)->get();
		$leave_report = EmployeeModel::select('employee_leave.*', 'users.*','user_total_leave.*', DB::raw('SUM(number_days) as number_leave'))->join('users', 'users.uid', '=', 'employee_leave.uid')->join('user_total_leave', 'user_total_leave.uid', '=', 'users.uid')->groupBy('users.uid')->get();
		return view('admin/leavereport',compact('leave_report','get_all_user'));
	}
	
	
	public function insertotal(Request $request){
		$request->validate([
			'uid'=>'required|unique:user_total_leave',
			'leave_total'=>'required',
		]);
		
		$total_leave 				= new total_leave;
		$total_leave->uid 			= $request->get('uid');
		$total_leave->total_leave 	=  $request->get('leave_total');
		$total_leave->save(); 
		return redirect()->back()->with('total_leave','Total leave added successflly!');  
	}
	
	
	public function update_total_leave(Request $request){
		$request->validate([
			'update_leave_total'=>'required',
		]);
		
		$select_uid 		= $request->get('leave_total_uid');
		$update_leave_total = $request->get('update_leave_total');
		$total_leave		= total_leave::where('uid',$select_uid)->update(['total_leave'=>$update_leave_total]);
		return redirect()->back()->with('total_leave','Total leave added successflly!'); 
	}
	
	
	public function attendancereport(){
		return view('admin/attendancereport');
	}
	
	public function addtask(Request $request){
		$request->validate([
			'task_name'=>'required',
			'task_priority'=>'required',
			'due_dat'=>'required',
		]);
		
		$addnewtask 				= new TaskBoardModel;
		$addnewtask->uid 			= Auth::user()->uid;
		$addnewtask->task_name 		= $request->get('task_name');
		$addnewtask->task_priority 	= $request->get('task_priority');
		$addnewtask->due_date 		= $request->get('due_dat');
		$addnewtask->status 		= $request->get('task_Status');
		$addnewtask->save();
		return redirect()->back()->with('addnewtask','Your new task added successflly!');
	}

	public function edittaskboard($id){
		$find = TaskBoardModel::find($id);
		return response()->json([
			'status'=>200,
			'edit_id'=>$find
		]);
	}	
	
	public function updatetaskboard(Request $request){
		$taskboard_id 					= $request->get('taskboard_id');
		$updatetaskboard 				= TaskBoardModel::find($taskboard_id);
		$updatetaskboard->task_name 	= $request->get('edit_task_name');
		$updatetaskboard->task_priority = $request->get('edit_task_priority');
		$updatetaskboard->due_date 		= $request->get('edit_due_date');
		$updatetaskboard->status 		= $request->get('edit_task_Status');
		$updatetaskboard->update();
		 
		return redirect()->back()->with('pending','Task update successfully');
	}
	
	public function taskboardelete($id){
		$taskboardelete = TaskBoardModel::find($id);
		$taskboardelete->delete();
		return redirect()->back()->with('delete','Task delete successfully');
	}
	
	
	public function dropablesave($id){
		$dopablesave 			= TaskBoardModel::find($id);
		$dopablesave->status 	= "Progress";
		$dopablesave->update();
	    return response()->json([
			'status'=>200,
		]);
	}
	
	
	public function dropanding($id){
		$dopablesave 			= TaskBoardModel::find($id);
		$dopablesave->status 	= "Pending";
		$dopablesave->update();
		return response()->json([
			'status'=>200,
		]);
	}
	
	public function dropcomplete($id){
		$dopablesave 		 = TaskBoardModel::find($id);
		$dopablesave->status = "Completed";
		$dopablesave->update();
		return response()->json([
			'status'=>200,
		]);
	}
	
	public function dropinprogress($id){
		$dopablesave         = TaskBoardModel::find($id);
		$dopablesave->status = "Inprogress";
		$dopablesave->update();
		return response()->json([
			'status'=>200,
		]);
	}
	
	
	public function droponhold($id){
		$dopablesave 			= TaskBoardModel::find($id);
		$dopablesave->status	= "On Hold";
		$dopablesave->update();
		return response()->json([
			'status'=>200,
		]);
	}
	
	public function droponreview($id){
		$dopablesave 			= TaskBoardModel::find($id);
		$dopablesave->status 	= "Review";
		$dopablesave->update();
		return response()->json([
			'status'=>200,
		]);
	}
	
	
	public function assest(){
		$getallasset 	= assetmodel::latest()->get();
		$getallUser 	= User::all();
		return view('admin/asset',compact('getallasset','getallUser'));
	}
	
	public function addasset(Request $request){
		$asset_name  = $request->get('asset_name');
		$brand 		 = $request->get('brand');
		$condition   = $request->get('condition');
		$assign 	 = $request->get('assign');
		$assign_date = $request->get('assign_date');
		$handover    = $request->get('handover');
		foreach($asset_name as $key => $asset_name){
			$addnewassets 			   = new assetmodel;
			$addnewassets->asset_name  = $asset_name;
			$addnewassets->brand       = $brand[$key];
			$addnewassets->condition   = $condition[$key];
			$addnewassets->assign_user = $assign[$key];
			$addnewassets->assign_date = $assign_date[$key];
			$addnewassets->handover    = $handover[$key];
			$addnewassets->save();
		}
		return redirect()->back()->with('addasset','Asset added successfully!');
	}
	
	public function assetdelete($id){
		$assetdelete = assetmodel::find($id);
		$assetdelete->delete();
		return redirect()->back()->with('assetdelete','Asset delete successfully!');
	}
	
	public function editassest($id){
		$editasset = assetmodel::find($id);
		return response()->json([
			'status'=>200,
			'editasset'=>$editasset
		]);
	}
	
	public function updateasset(Request $request){
		$update_id 				  = $request->get('edit_id');
		$assetupdate 			  = assetmodel::find($update_id);
		$assetupdate->asset_name  = $request->get('edit_asset_name');
		$assetupdate->brand       = $request->get('edit_brand');
		$assetupdate->condition   = $request->get('edit_condition');
		$assetupdate->assign_user = $request->get('edit_assign');
		$assetupdate->assign_date = $request->get('edit_assign_date');
		$assetupdate->handover    = $request->get('edit_handover');
		$assetupdate->update();
		return redirect()->back()->with('assetupdate','Asset updated successfully!'); 
	}
	
	
	public function rolepermission(){
		$getallroles = Role::all();
		return view('admin/rolepermission',compact('getallroles'));
	}
	
	public function addroles(Request $request){
		$request->validate([
			'name'=>'required|unique:roles',
		]); 
		$addroles = new Role;
		$addroles->name = $request->get('name');
		$addroles->slug = strtolower($request->get('name'));
		$addroles->save();
		return redirect()->back()->with('addroles','New role added successflly!'); 
	}
	
	public function editrole($id){
		$editrole = Role::find($id);
		return response()->json([
			"status"=>200,
			'editrole'=>$editrole
		]);
	}
	
	public function updaterole(Request $request){
		$role_id 		   = $request->get('editrole_id');
		$updaterole 	   = Role::find($role_id);
		$updaterole->name  = $request->get('edit_role_name');
		$updaterole->slug  = strtolower($request->get('edit_role_name'));
		$updaterole->update();
		return redirect()->back()->with('updaterole','Update user role successflly!');
	}
	
	public function deletrole($id){
		$deleteroles = Role::find($id);
		$deleteroles->delete();
		//return redirect()->back()->with('updaterole','Update user role successflly!');
		return response()->json([
			"status"=>200
		]);
	}
	
	// Download pdf file
	public function pdfconvert(){
			$data = userrolemodel::all();
			view()->share('admin/pdf_view',$data);
			$pdf = PDF::loadView('admin/pdf_view', compact('data'));
			return $pdf->download('pdf_file.pdf');
	}
	
	// Download CSV file
	/* public function exportcsv(){
		return Excel::download(new userrolemodelExport, 'userrole.csv');
	} */
	
	
	public function employeesalary(){
		$id = Auth::user()->id;
		$showalluser  = User::where('id','!=',$id)->get();
		$showallsalay = User::join('addemployeesalary', 'users.uid', '=', 'addemployeesalary.staff_name')->get();
		return view('admin/employeesalary',compact('showalluser','showallsalay'));
	}
	
	public function addemployeesalary(Request $request){
		/* $request->validate([
			 'staff_name'=>'required|unique:addemployeesalary',
			 'net_salary'=>'required|numeric',
		]); */
		$addemployeesalary 				 = new addemployeesalary;
		$addemployeesalary->staff_name   = $request->get('staff_name');
		$addemployeesalary->net_salary   = $request->get('net_salary');
		$addemployeesalary->Total_leave  = $request->get('Total_leave');
		$addemployeesalary->basic_amount = $request->get('basic_amount');
		$addemployeesalary->HRA 		 = $request->get('HRA');
		$addemployeesalary->RA 			 = $request->get('RA');
		$addemployeesalary->Transport 	 = $request->get('Transport');
		$addemployeesalary->OA 			 = $request->get('OA');
		$addemployeesalary->total 		 = $request->get('total');
		$addemployeesalary->save();
		return redirect()->back()->with('addsalary','Add Employee successflly!');
	}
	
	
	// Download pdf file
	public function generateslip($uid,$id){
			$generatepdf 		= User::where('uid',$uid)->get();
			$get_employee_slip 	= addemployeesalary::where('id',$id)->get();
			$pdf 				= PDF::loadView('admin/generatepayslip',compact('generatepdf','get_employee_slip'));
			//return $pdf->download('payslip.pdf');  
			 return $pdf->stream('payslip.pdf');
	}
	
	
	
	
	public function addemployeebank(Request $request){
		$request->validate([
			 'name'=>'required',
			 'account_number'=>'required|unique:bank_information',
			 'ifsc_code'=>'required',
			 'branch_name'=>'required',
			 'bank_address'=>'required',
		]);
		
		$add_bank 			      = new bankinformation;
		$add_bank->uid 			  = $request->get('uid');
		$add_bank->name 		  = $request->get('name');
		$add_bank->account_number = $request->get('account_number');
		$add_bank->ifsc_code      = $request->get('ifsc_code');
		$add_bank->branch_name    = $request->get('branch_name');
		$add_bank->bank_address   = $request->get('bank_address');
		$add_bank->save();
		return redirect()->back()->with('add_bank','Added Bank details successflly!'); 
	}
	
	public function bank_details_destroy($id){
		$delete_bank = bankinformation::find($id);
		$delete_bank->delete();
		return redirect()->back()->with('delete_bank','Deleted Bank details successflly!'); 
	}
	
	public function admin_side_chat($uid){
		
		$uid = $uid;
		$get_message = livechat::where('uid',$uid)->get();
		return view('admin/livechat',compact('uid','get_message'));
	}
	
	public function sendchat(Request $request){
		$chat = new livechat;
		$chat->uid = $request->get('uid');
		$chat->message = $request->get('message');
		$chat->save();
		return redirect()->back();
	}
	
	// Add new feed
	public function adminaddnewfeed(Request $request){
		$uid          = Auth::user()->uid;
		$current_user = User::where('uid',$uid)->first();
		$message      = $request->input('message');
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
	
	
	public function adminaddlatestupdate(Request $request){
			$request->validate([
				'message'=>'required',
			]);
			$addnew = new Latestupdate();
			$addnew->message = $request->get('message');
			$addnew->save();
			return redirect()->back()->with('addupdate','Update added successflly!');
	}
	
	public function admin_update_attendance(Request $request){
		$attendance_id     = $request->get('attend_id');
		//$edit_hours 	   = $request->get('edit_hours');
		$time_in 		   = $request->get('time_in');
		//dd($time_in);
		$time_out 		   = $request->get('time_out');
	    $updated 		   = PunchModel::find($attendance_id);
		$updated->time_in  =  $time_in;
		$updated->time_out =  $time_out;
		$updated->save();
		return redirect()->back()->with('update','Attendacne Updated Successfully!');
	}
	
	
	
}
