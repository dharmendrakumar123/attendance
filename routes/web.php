<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
	return redirect()->route('login');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Super admin
Route::group(['middleware' => ['auth', 'superadmin']], function(){
	Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
	Route::get('/showuser', 'App\Http\Controllers\AdminController@user')->name('user');
	Route::post('/adduser', 'App\Http\Controllers\AdminController@adduser')->name('adduser');
	Route::get('/userdelete/{id}', 'App\Http\Controllers\AdminController@userdelete')->name('userdelete');
//	Route::get('/edituser/{id}/{uid?}', 'App\Http\Controllers\AdminController@edituser')->name('edituser');
	Route::get('/edituser/{id}/{uid?}', 'App\Http\Controllers\AdminController@edituser')->name('edituser');
	Route::post('/updateuser', 'App\Http\Controllers\AdminController@updateuser')->name('updateuser');
	
	Route::get('/profile', 'App\Http\Controllers\AdminController@profile')->name('profile');
	Route::post('/profileupdate/{id}', 'App\Http\Controllers\AdminController@profileupdate')->name('profileupdate');
	Route::post('/admin_add_personal_information', 'App\Http\Controllers\AdminController@admin_add_personal_information')->name('admin_add_personal_information');
	
	Route::post('/admin_personal_information', 'App\Http\Controllers\AdminController@admin_personal_information')->name('admin_personal_information');
	
	Route::post('/admin_update_personal/{id}', 'App\Http\Controllers\AdminController@admin_update_personal')->name('admin_update_personal');
	Route::post('/admin_add_emergency_contact', 'App\Http\Controllers\AdminController@admin_add_emergency_contact')->name('admin_add_emergency_contact');
	
	
	Route::get('/allemployee', 'App\Http\Controllers\AdminController@allemployee')->name('allemployee');
	Route::get('/allemployeeprofile/{uid}', 'App\Http\Controllers\AdminController@allemployeeprofile')->name('allemployeeprofile');
	Route::post('/allemployeeprofileupdate/{id}', 'App\Http\Controllers\AdminController@allemployeeprofileupdate')->name('allemployeeprofileupdate');
	Route::get('/deleteemployee/{id}', 'App\Http\Controllers\AdminController@deleteemployee')->name('deleteemployee');
	Route::post('/employee_update_personal/{id}', 'App\Http\Controllers\AdminController@employee_update_personal')->name('employee_update_personal');
	Route::post('/add_employee_emgen_contact', 'App\Http\Controllers\AdminController@add_employee_emgen_contact')->name('add_employee_emgen_contact');
	Route::post('/update_employee_emgen_contact/{id}', 'App\Http\Controllers\AdminController@update_employee_emgen_contact')->name('update_employee_emgen_contact');
	Route::post('/addemployeefamilymember', 'App\Http\Controllers\AdminController@addemployeefamilymember')->name('addemployeefamilymember');
	Route::get('/employeefamilydestroy/{id}', 'App\Http\Controllers\AdminController@employeefamilydestroy')->name('employeefamilydestroy');
	Route::post('/addeemployeeducation', 'App\Http\Controllers\AdminController@addeemployeeducation')->name('addeemployeeducation');
	Route::get('/employeeducationdestroy/{id}', 'App\Http\Controllers\AdminController@employeeducationdestroy')->name('employeeducationdestroy');
	Route::post('/addemployeeexperience', 'App\Http\Controllers\AdminController@addemployeeexperience')->name('addemployeeexperience');
	Route::get('/employeeexperiencedestroy/{id}', 'App\Http\Controllers\AdminController@employeeexperiencedestroy')->name('employeeexperiencedestroy');
	
	
	Route::get('/adminholiday', 'App\Http\Controllers\AdminController@adminholiday')->name('adminholiday');
	Route::post('/addholiday', 'App\Http\Controllers\AdminController@addholiday')->name('addholiday');
	Route::get('/deleteholiday/{id}', 'App\Http\Controllers\AdminController@deleteholiday')->name('deleteholiday');
	Route::get('/editholiday/{id}', 'App\Http\Controllers\AdminController@editholiday')->name('editholiday');
	Route::post('/updateholiday', 'App\Http\Controllers\AdminController@updateholiday')->name('updateholiday');
	
	Route::get('/adminleave', 'App\Http\Controllers\AdminController@adminleave')->name('adminleave');
	Route::get('/approved/{id}', 'App\Http\Controllers\AdminController@approved')->name('approved');
	Route::get('/declined/{id}', 'App\Http\Controllers\AdminController@declined')->name('declined');
	Route::get('/leavereasonshow/{id}', 'App\Http\Controllers\AdminController@leavereasonshow')->name('leavereasonshow');
	
	
	Route::get('/adminattendance', 'App\Http\Controllers\AdminController@adminattendance')->name('adminattendance');
	Route::get('/viewattendacenstatus/{id}/{days?}', 'App\Http\Controllers\AdminController@viewattendacenstatus')->name('viewattendacenstatus');
	
	Route::get('/tickets', 'App\Http\Controllers\AdminController@tickets')->name('tickets');
	Route::get('/showtickets/{id}', 'App\Http\Controllers\AdminController@showtickets')->name('showtickets');
	
	Route::get('/adminticketopen/{id}', 'App\Http\Controllers\AdminController@adminticketopen')->name('adminticketopen');
	Route::get('/adminreopened/{id}', 'App\Http\Controllers\AdminController@adminreopened')->name('adminreopened');
	Route::get('/adminOnhold/{id}', 'App\Http\Controllers\AdminController@adminOnhold')->name('adminOnhold');
	Route::get('/adminClosed/{id}', 'App\Http\Controllers\AdminController@adminClosed')->name('adminClosed');
	Route::get('/adminInprogress/{id}', 'App\Http\Controllers\AdminController@adminInprogress')->name('adminInprogress');
	Route::get('/adminticketdeclined/{id}', 'App\Http\Controllers\AdminController@adminticketdeclined')->name('adminticketdeclined');
	
	Route::get('/project', 'App\Http\Controllers\AdminController@project')->name('project');
	Route::post('/createproject', 'App\Http\Controllers\AdminController@createproject')->name('createproject');
	Route::get('/projectdelete/{id}', 'App\Http\Controllers\AdminController@projectdelete')->name('projectdelete');
	Route::get('/projectedit/{id}', 'App\Http\Controllers\AdminController@projectedit')->name('projectedit');
	Route::post('/updateproject', 'App\Http\Controllers\AdminController@updateproject')->name('updateproject');
	Route::get('/projectview/{id}', 'App\Http\Controllers\AdminController@projectview')->name('projectview');
	
	Route::get('/admintasks','App\Http\Controllers\AdminController@admintasks')->name('admintasks');
	Route::get('/admintasksboard','App\Http\Controllers\AdminController@admintasksboard')->name('admintasksboard');
	
	Route::get('/employeesalary', 'App\Http\Controllers\AdminController@employeesalary')->name('employeesalary');
	Route::get('/payslip', 'App\Http\Controllers\AdminController@payslip')->name('payslip');
	Route::get('/leavereport', 'App\Http\Controllers\AdminController@leavereport')->name('leavereport');
	Route::get('/attendancereport', 'App\Http\Controllers\AdminController@attendancereport')->name('attendancereport');
	Route::get('/rolepermission', 'App\Http\Controllers\AdminController@rolepermission')->name('rolepermission');
	
	
	Route::post('/addtask', 'App\Http\Controllers\AdminController@addtask')->name('addtask');
	Route::get('/edittaskboard/{id}', 'App\Http\Controllers\AdminController@edittaskboard')->name('edittaskboard');
	Route::post('/updatetaskboard', 'App\Http\Controllers\AdminController@updatetaskboard')->name('updatetaskboard');
	Route::get('/taskboardelete/{id}', 'App\Http\Controllers\AdminController@taskboardelete')->name('taskboardelete');
	Route::get('/dropablesave/{id}', 'App\Http\Controllers\AdminController@dropablesave')->name('dropablesave');
	Route::get('/dropanding/{id}', 'App\Http\Controllers\AdminController@dropanding')->name('dropanding');
	Route::get('/dropcomplete/{id}', 'App\Http\Controllers\AdminController@dropcomplete')->name('dropcomplete');
	Route::get('/dropinprogress/{id}', 'App\Http\Controllers\AdminController@dropinprogress')->name('dropinprogress');
	Route::get('/droponhold/{id}', 'App\Http\Controllers\AdminController@droponhold')->name('droponhold');
	Route::get('/droponreview/{id}', 'App\Http\Controllers\AdminController@droponreview')->name('droponreview');
	
	Route::get('/assest', 'App\Http\Controllers\AdminController@assest')->name('assest');
	Route::post('/addasset', 'App\Http\Controllers\AdminController@addasset')->name('addasset');
	Route::get('/assetdelete/{id}', 'App\Http\Controllers\AdminController@assetdelete')->name('assetdelete');
	Route::get('/editassest/{id}', 'App\Http\Controllers\AdminController@editassest')->name('editassest');
	Route::post('/updateasset', 'App\Http\Controllers\AdminController@updateasset')->name('updateasset');
	
	Route::post('/addroles', 'App\Http\Controllers\AdminController@addroles')->name('addroles');
	Route::get('/editrole/{id}', 'App\Http\Controllers\AdminController@editrole')->name('editrole');
	Route::post('/updaterole', 'App\Http\Controllers\AdminController@updaterole')->name('updaterole');
	
	Route::get('/deletrole/{id}', 'App\Http\Controllers\AdminController@deletrole')->name('deletrole');
	Route::get('/pdfconvert', 'App\Http\Controllers\AdminController@pdfconvert')->name('pdfconvert');

	//Route::get('/send', 'App\Http\Controllers\HomeController@sendNotification')->name('sendNotification');
	
	Route::post('/addemployeesalary', 'App\Http\Controllers\AdminController@addemployeesalary')->name('addemployeesalary');
	Route::get('/generateslip/{uid}/{id?}', 'App\Http\Controllers\AdminController@generateslip')->name('generateslip');
	
	
	Route::post('/insertleave', 'App\Http\Controllers\AdminController@insertotal')->name('insertotal');
	
	Route::post('/update_total_leave', 'App\Http\Controllers\AdminController@update_total_leave')->name('update_total_leave');
	
	Route::post('/addemployeebank', 'App\Http\Controllers\AdminController@addemployeebank')->name('addemployeebank');
	Route::get('/bank_details_destroy/{id}', 'App\Http\Controllers\AdminController@bank_details_destroy')->name('bank_details_destroy');
	
	Route::get('/admin_side_chat/{id}', 'App\Http\Controllers\AdminController@admin_side_chat')->name('admin_side_chat');
	Route::post('/sendchat', 'App\Http\Controllers\AdminController@sendchat')->name('sendchat');
	
	Route::post('/adminaddnewfeed', 'App\Http\Controllers\AdminController@adminaddnewfeed')->name('adminaddnewfeed');
	
	Route::get('/adminlatestupdate', [App\Http\Controllers\AdminController::class,'adminlatestupdate'])->name('adminlatestupdate');
	Route::post('/adminaddlatestupdate',[App\Http\Controllers\AdminController::class,'adminaddlatestupdate'])->name('adminaddlatestupdate');
	Route::post('/admin_update_attendance', 'App\Http\Controllers\AdminController@admin_update_attendance')->name('admin_update_attendance');
		
});

//Employee
Route::group(['middleware' => ['auth', 'employee']], function(){
	Route::get('/employee_dashboard', 'App\Http\Controllers\EmployeeController@index')->name('employee_dashboard');
	
	//Employee leave process
	Route::get('/employee_leave', 'App\Http\Controllers\EmployeeController@employee_leave')->name('employee_leave');
	Route::post('/employe_leave_request_send', 'App\Http\Controllers\EmployeeController@employe_leave_request_send')->name('employe_leave_request_send');
	Route::get('/leave_request_destroy/{id}', 'App\Http\Controllers\EmployeeController@leave_request_destroy')->name('leave_request_destroy');
	Route::get('/leave_request_edit/{id}', 'App\Http\Controllers\EmployeeController@leave_request_edit')->name('leave_request_edit');
	Route::post('/update_employee_leave', 'App\Http\Controllers\EmployeeController@update_employee_leave')->name('update_employee_leave');
	
	Route::get('/attendance', 'App\Http\Controllers\EmployeeController@attendance')->name('attendance');
	//Route::get('/punchin/{id}/{work?}', 'App\Http\Controllers\EmployeeController@punchin')->name('punchin');
	Route::get('/punchin/{id}/{work?}', 'App\Http\Controllers\EmployeeController@punchin')->name('punchin');
	Route::get('/punchin_break/{id}/{breaktime?}', 'App\Http\Controllers\EmployeeController@punchin_break')->name('punchin_break');
	
	Route::get('/punchauto', 'App\Http\Controllers\EmployeeController@punchauto')->name('punchauto');
	
	
	//Route::get('/punchout/{id}/{break?}/{activity_id?}', 'App\Http\Controllers\EmployeeController@punchout')->name('punchout');
	//Route::get('/punchout/{id}/{break?}/{activity_id?}', 'App\Http\Controllers\EmployeeController@punchout')->name('punchout');
	Route::get('/punchout/{id}/{break?}/{activity_id?}', 'App\Http\Controllers\EmployeeController@punchout')->name('punchout');
	Route::get('/punchout_work/{id}/{worktime?}', 'App\Http\Controllers\EmployeeController@punchout_work')->name('punchout_work');
	
	//Route::get('/punchout_delay/{id}/{break?}/{activity_id?}', 'App\Http\Controllers\EmployeeController@punchout_delay')->name('punchout_delay');
	
	
	
	Route::get('/alldaysactivity/{days}', 'App\Http\Controllers\EmployeeController@alldaysactivity')->name('alldaysactivity');
	
	Route::get('/employeeprofile', 'App\Http\Controllers\EmployeeController@employeeprofile')->name('employeeprofile');
	
	Route::post('/update_profile/{id}', 'App\Http\Controllers\EmployeeController@update_profile')->name('update_profile');
	
	Route::post('/add_personal_information', 'App\Http\Controllers\EmployeeController@add_personal_information')->name('add_personal_information');
	Route::post('/update_personal_information/{id}', 'App\Http\Controllers\EmployeeController@update_personal_information')->name('update_personal_information');
	
	Route::post('/add_emgen_contact', 'App\Http\Controllers\EmployeeController@add_emgen_contact')->name('add_emgen_contact');
	Route::post('/update_emgen_contact/{id}', 'App\Http\Controllers\EmployeeController@update_emgen_contact')->name('update_emgen_contact');
	
	Route::post('/addfamilymember', 'App\Http\Controllers\EmployeeController@addfamilymember')->name('addfamilymember');
	Route::get('/familydestroy/{id}', 'App\Http\Controllers\EmployeeController@familydestroy')->name('familydestroy');
	Route::get('/editfamliy/{id}', 'App\Http\Controllers\EmployeeController@editfamliy')->name('editfamliy');
	Route::post('/updatefamilymember/{id}', 'App\Http\Controllers\EmployeeController@updatefamilymember')->name('updatefamilymember');
	
	Route::post('/addeducation', 'App\Http\Controllers\EmployeeController@addeducation')->name('addeducation');
	Route::get('/educationdestroy/{id}', 'App\Http\Controllers\EmployeeController@educationdestroy')->name('educationdestroy');
	
	
	Route::post('/addexperience', 'App\Http\Controllers\EmployeeController@addexperience')->name('addexperience');
	Route::get('/experiencedestroy/{id}', 'App\Http\Controllers\EmployeeController@experiencedestroy')->name('experiencedestroy');
	
	Route::get('/holiday', 'App\Http\Controllers\EmployeeController@holiday')->name('holiday');
	Route::post('/hraddholiday', 'App\Http\Controllers\EmployeeController@hraddholiday')->name('hraddholiday');
	Route::get('/hreditholiday/{id}', 'App\Http\Controllers\EmployeeController@hreditholiday')->name('hreditholiday');
	Route::post('/hrupdateholiday', 'App\Http\Controllers\EmployeeController@hrupdateholiday')->name('hrupdateholiday');
	Route::get('/hrdeleteholiday/{id}', 'App\Http\Controllers\EmployeeController@hrdeleteholiday')->name('hrdeleteholiday');
	
	
	
	Route::get('/ticket', 'App\Http\Controllers\EmployeeController@ticket')->name('ticket');
	Route::post('/addticket', 'App\Http\Controllers\EmployeeController@addticket')->name('addticket');
	Route::get('/ticketdestroy/{id}', 'App\Http\Controllers\EmployeeController@ticketdestroy')->name('ticketdestroy');
	Route::get('/edittickets/{id}', 'App\Http\Controllers\EmployeeController@edittickets')->name('edittickets');
	Route::post('/updatetickets', 'App\Http\Controllers\EmployeeController@updatetickets')->name('updatetickets');
	Route::get('/ticketopen/{id}', 'App\Http\Controllers\EmployeeController@ticketopen')->name('ticketopen');
	Route::get('/reopened/{id}', 'App\Http\Controllers\EmployeeController@reopened')->name('reopened');
	Route::get('/Onhold/{id}', 'App\Http\Controllers\EmployeeController@Onhold')->name('Onhold');
	Route::get('/Closed/{id}', 'App\Http\Controllers\EmployeeController@Closed')->name('Closed');
	Route::get('/Inprogress/{id}', 'App\Http\Controllers\EmployeeController@Inprogress')->name('Inprogress');
	Route::get('/ticketdeclined/{id}', 'App\Http\Controllers\EmployeeController@ticketdeclined')->name('ticketdeclined');
	
	
	//Projects
	Route::get('/projects', 'App\Http\Controllers\EmployeeController@projects')->name('projects');
	Route::post('/addprojects', 'App\Http\Controllers\EmployeeController@addprojects')->name('addprojects');
	Route::get('/project_view/{id}', 'App\Http\Controllers\EmployeeController@project_view')->name('project_view');
	
	// Tasks
	Route::get('/task', 'App\Http\Controllers\EmployeeController@task')->name('task');
	
	Route::get('/taskboard', 'App\Http\Controllers\EmployeeController@taskboard')->name('taskboard');
	
	
	Route::post('/addemployeetask', 'App\Http\Controllers\EmployeeController@addemployeetask')->name('addemployeetask');
	Route::get('/employeetaskboardelete/{id}', 'App\Http\Controllers\EmployeeController@employeetaskboardelete')->name('employeetaskboardelete');
	Route::get('/editemployeetaskboard/{id}', 'App\Http\Controllers\EmployeeController@editemployeetaskboard')->name('editemployeetaskboard');
	Route::post('/emplupdatetaskboard', 'App\Http\Controllers\EmployeeController@emplupdatetaskboard')->name('emplupdatetaskboard');
	
	Route::get('/chat', 'App\Http\Controllers\EmployeeController@chat')->name('chat');
	Route::post('/emplsendchat', 'App\Http\Controllers\EmployeeController@emplsendchat')->name('emplsendchat');
	
	Route::post('/addnewfeed', 'App\Http\Controllers\EmployeeController@addnewfeed')->name('addnewfeed');
	
	Route::get('/hrapproved/{id}', 'App\Http\Controllers\EmployeeController@hrapproved')->name('hrapproved');
	Route::get('/hrdeclined/{id}', 'App\Http\Controllers\EmployeeController@hrdeclined')->name('hrdeclined');
	Route::get('/hrleavereasonshow/{id}', 'App\Http\Controllers\EmployeeController@hrleavereasonshow');
	
	Route::get('/hrviewallattendance', 'App\Http\Controllers\EmployeeController@hrviewallattendance')->name('hrviewallattendance');
	Route::post('/hr_update_attendance', 'App\Http\Controllers\EmployeeController@hr_update_attendance')->name('hr_update_attendance');
	//Route::get('/viewattendacenstatus/{id}/{days?}', 'App\Http\Controllers\AdminController@viewattendacenstatus')->name('viewattendacenstatus');
	
	Route::get('/managerproject', 'App\Http\Controllers\EmployeeController@managerproject')->name('managerproject');
	Route::post('/managercreateproject', 'App\Http\Controllers\EmployeeController@managercreateproject')->name('managercreateproject');
	Route::get('/managerprojectedit/{id}', 'App\Http\Controllers\EmployeeController@managerprojectedit')->name('managerprojectedit');
	Route::post('/managerupdateproject', 'App\Http\Controllers\EmployeeController@managerupdateproject')->name('managerupdateproject');
	Route::get('/managerprojectdelete/{id}', 'App\Http\Controllers\EmployeeController@managerprojectdelete')->name('managerprojectdelete');
	Route::get('/managerprojectview/{id}', 'App\Http\Controllers\EmployeeController@managerprojectview')->name('managerprojectview');
	
	//Route::get('/latestupdate', [App\Http\Controllers\EmployeeController::class,'latestupdate'])->name('latestupdate');
	Route::post('/addlatestupdate',[App\Http\Controllers\EmployeeController::class,'addlatestupdate'])->name('addlatestupdate');
	
	
});