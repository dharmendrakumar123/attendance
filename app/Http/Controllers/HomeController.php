<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\projectmodel;
use App\Models\User;
use App\Models\TaskBoardModel;
use App\Models\TicketsModel;
use Notification;
use App\Notifications\MyFirstNotification;
use App\Models\Employee\EmployeeModel;
use Carbon\Carbon;
use DB;
use App\Models\Employee\PunchModel;
use App\Models\holidaymodel;
use App\Models\Feed;
use Auth;
use App\Models\Latestupdate;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
		//$this->middleware('role:Superadmin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request){
		$id 				= Auth::user()->id;
		$projectmodel       = projectmodel::all();
		$totalshowuser      = User::where('id','!=',$id)->count();	
		$latestemployee 	= User::where('id','!=',$id)->latest()->count();
		$overalemployee 	= User::all()->count();
		$taskscount     	= TaskBoardModel::all();	
		$tasks_completed    = TaskBoardModel::where('status','Completed')->get();	
		$tasks_inprogress   = TaskBoardModel::where('status','Progress')->get();	
		$tasks_hold     	= TaskBoardModel::where('status','On Hold')->get();	
		$tasks_pending      = TaskBoardModel::where('status','Pending')->get();	
		$tasks_review     	= TaskBoardModel::where('status','Review')->get();	
		$currentdates 			 = Carbon::now();
		$currentuserdate 		 = $currentdates->toDateString();
		$get_all_apsend_employee = PunchModel::select('users.*','punch.*','employee_leave.*')->join('users','users.uid','=','punch.uid')->join('employee_leave','employee_leave.uid','=','punch.uid')->where('day',$currentuserdate)->where('time_in','00:00:00')->get();
		$strmonth 			  = strtotime($currentuserdate);
		$get_current_month    = date('m',$strmonth);
		$get_current_day      = date('d',$strmonth);
		$birthday             = User::whereMonth('birth_date',$get_current_month)->whereDay('birth_date',$get_current_day)->get();
		$tomorrow_timestamp   = strtotime($currentuserdate);
		$tomorrow_date        = date('d',$tomorrow_timestamp+86400);
		$get_tomorrow_holiday = holidaymodel::whereDay('date',$tomorrow_date)->get();
		
		//$get_all_feed         = User::join('feeds','feeds.uid','=','users.uid')->get();
		$get_all_feed         =  User::select('users.uid','users.name','users.last_name','users.profile_pic','feeds.*')->join('feeds','feeds.uid','=','users.uid')->latest()->paginate(5);
		
		$show_all_feed = '';
		if($request->ajax()){
            foreach ($get_all_feed as $get_all_feeds){
                $show_all_feed.=(($get_all_feeds->uid!==Auth::user()->uid)?'<div class="col-sm-6"><h2 class="table-avatar mt-3"><a class="avatar"><img src="images/'.$get_all_feeds->profile_pic.'" alt=""></a><a style="font-size: 17px;">'.$get_all_feeds->name.''.$get_all_feeds->last_name.'</a></h2>'.(!empty($get_all_feeds->files)?'<img src="images/'.$get_all_feeds->files.'" width="150" height="150">':'').'<p class="messag">'.$get_all_feeds->message.'</p></div><div class="col-sm-6"></div>':'<div class="col-sm-6"></div><div class="col-sm-6" id="show-current"><h2 class="table-avatar mt-3"><a class="avatar"><img src="images/'.$get_all_feeds->profile_pic.'" alt=""></a><a style="font-size: 17px;">Me</a></h2>'.(!empty($get_all_feeds->files)?'<img src="images/'.$get_all_feeds->files.'" width="150" height="150">':'').'<p class="messag">'.$get_all_feeds->message.'</p></div>');
            }
            return $show_all_feed;
        }
		$getlatestupdate = Latestupdate::latest()->get();
		
        return view('admin/home',compact('projectmodel','taskscount','overalemployee','tasks_completed','tasks_inprogress','tasks_hold','tasks_pending','tasks_review','get_all_apsend_employee','birthday','get_tomorrow_holiday','totalshowuser','latestemployee','getlatestupdate'));
    }
	

}
