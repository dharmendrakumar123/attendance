<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\UserStatus;
use Carbon\Carbon;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

	
	protected function authenticated(Request $request, $user)
    {
        // to admin dashboard
		
	  // dd($user->isAdmin());
	   
	   if($user->isAdmin()) {
			return redirect(route('home'));
        }
        // to user dashboard
        else if($user->isUser()){
			$todaycarbon    = \Carbon\Carbon::now();
			$loginuser      = UserStatus::whereDay('day', $todaycarbon->day)->get();
			$login_all_user	= collect($loginuser)->toArray();
			$currentUser    = Auth::user()->uid;
			if(!empty($login_all_user)){
				foreach($login_all_user as $login_all_users){
					if($login_all_users['uid']!=$currentUser){
						$currentUser   = Auth::user()->uid;
						$currentdates  = Carbon::now();
						$addlogin      = new UserStatus;
						$addlogin->uid = $currentUser;
						$addlogin->day = $currentdates->toDateString();
						$addlogin->save();
						return redirect(route('employee_dashboard'));
					}else{
						return redirect(route('employee_dashboard')); 
					}
				}
			}else{
				$currentUser   = Auth::user()->uid;
				$currentdates  = Carbon::now();
				$addlogin      = new UserStatus;
				$addlogin->uid =  $currentUser;
				$addlogin->day = $currentdates->toDateString();
				$addlogin->save();
				return redirect(route('employee_dashboard')); 
			}
        }
        abort(404);
    }
		

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
