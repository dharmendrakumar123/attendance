 <!--<script src="assets/jquery/jquery-3.5.1.min.js.download"></script>-->
 <script src="{{asset('assets/jquery/jquery-3.5.1.min.js.download')}}"></script>
 
     <!--<script src="assets/jquery/popper.min.js.download"></script>
    <script src="assets/jquery/bootstrap.min.js.download"></script>

    <script src="assets/jquery/jquery.slimscroll.min.js.download"></script>-->
		<script src="{{asset('assets/jquery/popper.min.js.download')}}"></script>
		<script src="{{asset('assets/jquery/bootstrap.min.js.download')}}"></script>
		<script src="{{asset('assets/jquery/jquery.slimscroll.min.js.download')}}"></script>

   <!-- <script src="assets/jquery/morris.min.js.download"></script>-->
    <!--<script src="assets/jquery/raphael.min.js.download"></script>-->
	
	<script src="{{asset('assets/jquery/raphael.min.js.download')}}"></script>
    <!--<script src="assets/jquery/chart.js.download"></script>-->

       <!-- <script src="assets/jquery/app.js.download"></script>-->
	<script src="{{asset('assets/jquery/app.js.download')}}"></script>
	
	<script src="{{asset('assets/jquery/printThis.js')}}"></script>

    <div class="sidebar-overlay"></div>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
	
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	 <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
		$(document).ready(function(){
			$('.edit_attendance').click(function(){
				var attendance_id = $(this).attr('id');
				$('#attend_id').val(attendance_id);
				$('#admin_edit_attendance').modal('show');	
			});
		});
	/* 	$(".see-admin-updates").click(function() {
			$div = $($(this).data('div')); 
			$link = $(this).data('link'); 
			$page = $(this).data('page'); 
			$href = $link + $page; 
			console.log($href);
			$.get($href, function(response){ 
				
				$html = $(response).find("#admin_more_latestupdate").html(); 
				$div.append($html);
			});
			$(this).data('page', (parseInt($page) + 1)); 
		});  */
		

		$("#adminaddlatestupdate").validate({
				errorElement: 'div',
				errorClass: 'alert alert-danger',
				onkeyup: function(element) {
					   $(element).valid(); 
				},
			rules: {
				message: {
					required: true
				}
			},
			messages: {
				message: {
					required: "Please enter the holiday name"
				}
			}
		});	
		
		
	$(document).ready(function(){		
		$('.add_more_asset').click(function(){
			var i = $(".skill_name").length;
			var more_assets = [];
			more_assets += '<div class="remove_asset"><h3 class="card-title">Asset</h3><a href="#" class="remove_more_assets"><i class="fa fa-minus" aria-hidden="true"></i></a><div class="row"><div class="col-md-6"><div class="form-group"><label class="focus-label">Asset Name <span class="text-danger">*</span></label><input type="text" class="form-control skill_name" name="asset_name['+i+']" id="asset_name" required></div><span style="color:red"></span></div><div class="col-md-6"><div class="form-group"><label class="focus-label">Brand<span class="text-danger">*</span></label><input type="text" class="form-control" name="brand['+i+']" id="brand" required></div><span style="color:red"></span></div><div class="col-md-6"><div class="form-group"><label class="focus-label">Condition <span class="text-danger">*</span></label><input type="text" class="form-control" name="condition['+i+']" id="condition" required></div><span style="color:red"></span></div><div class="col-md-6"><div class="form-group"><label class="focus-label">Assign To <span class="text-danger">*</span></label><select class="form-select form-control" name="assign['+i+']" id="assign" required><option value="">--select--</option>';
			$("#assign_user option").each(function(){more_assets += '<option value="'+$(this).val()+'">'+$(this).val()+'</option>';}); 
			more_assets +='</select></div><span style="color:red"></span></div><div class="col-md-6"><div class="form-group"><label class="focus-label">Assign Date <span class="text-danger">*</span></label><input type="date" class="form-control" name="assign_date['+i+']" id="assign_date"></div><span style="color:red"></span></div><div class="col-md-6"><div class="form-group"><label class="focus-label">Handover Date(optional)</label><input type="date" class="form-control" name="handover[]" id="handover"></div><span style="color:red"></span></div></div></div>';
			$('.add_more_assetfield').append(more_assets);
			
			$("input[name='asset_name["+i+"]']").each(function () {
				$(this).rules("add", {
					required: true,
					messages: {
						required:"Please enter your assets name",
					}
				});
			}); 
			
			$("input[name='brand["+i+"]']").each(function () {
				$(this).rules("add", {
					required: true,
					messages: {
						required:"Please enter your brand name",
					}
				});
			}); 
			
			$("input[name='condition["+i+"]']").each(function () {
				$(this).rules("add", {
					required: true,
					messages: {
						required:"Please enter your condition",
					}
				});
			}); 
			
			$("input[name='assign["+i+"]']").each(function () {
				$(this).rules("add", {
					required: true,
					messages: {
						required:"Please select you assign user",
					}
				});
			}); 
			
			$("input[name='assign_date["+i+"]']").each(function () {
				$(this).rules("add", {
					required: true,
					messages: {
						required:"Please select you assign date",
					}
				});
			}); 
			
		});
		
		$('#addasset').validate({
			errorElement: 'div',
			errorClass: 'alert alert-danger',
			onkeyup: function(element) {
					   $(element).valid(); 
				},
			rules:{
				"asset_name[]":{
					required:true,
				},
				"brand[]":{
					required:true
				},
				"condition[]":{
					required:true,
				},
				"assign[]":{
					required:true,
				},
				"assign_date[]":{
					required:true,
				},
			},
			messages:{
				"asset_name[]":{
					required:"Please enter your assets name",
				},
				"brand[]":{
					required:"Please enter your brand name",
				},
				"condition[]":{
					required:"Please enter your condition",
				},
				"assign[]":{
					required:"Please select you assign user",
				},
				"assign_date[]":{
					required:"Please select you assign date",
				},
			},
		});
	});	
		
		$(document).on('click', '.remove_more_assets',function(){
			$(this).closest('.remove_asset').remove();
		});
		
		
		var ENDPOINT = "{{route('home')}}";
        var page = 1;
        infinteLoadMore(page);
       // $("div#admin_feed").scrollTop($("div#admin_feed")[0].scrollHeight);
		$('div#admin_feed').scroll(function () {
            //if ($('div#admin_feed').scrollTop() == 0){
			if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
                page++; 
                infinteLoadMore(page);
				console.log(page);
            }
        });
        function infinteLoadMore(page) {
				$.ajax({
                    url: ENDPOINT + "?page=" + page,
                    datatype: "html",
                    type: "GET",
                    beforeSend: function () {
                        $('.auto-load').show();
                    }
                })
                .done(function (response){
                    if (response.length == 0) {
                        $('.auto-load').html("We don't have more data to display");
                        return;
                    } 
					$('.auto-load').hide();
                    $("#admin_feed").append(response);
                });
        }
	
	
	
	/*$(".see-more").click(function() {
		$div = $($(this).data('div')); //div to append
		$link = $(this).data('link'); //current URL	
		$page = $(this).data('page'); //get the next page #
		$href = $link + $page; //complete URL
		$.get($href, function(response) { //append data
			$html = $(response).find("#admin_feed").html(); 
			$div.append($html);
		});
		$(this).data('page', (parseInt($page) + 1)); //update page #
		
	});*/

	
	$(document).ready(function(){
		$('#feed-search').DataTable();
		$('#feed').on('submit', function(event){
			event.preventDefault();
			var url = "{{route('adminaddnewfeed')}}";
			var data = new FormData(this);
			$.ajax({
				url:url,
				method:"POST",
				processData: false,
				contentType: false,
				data:data,
				success:function(data){
					//console.log(data);
					$('#feed')[0].reset();
					var feedajax = [];
					feedajax +='<h2 class="table-avatar mt-3"><a class="avatar"><img src="images/'+data.current_user.profile_pic+'" alt=""></a><a style="font-size: 17px;">Me</a></h2>';
					if(data.current_message.files != null){
						feedajax += '<img src="images/'+data.current_message.files+'" width="150" height="150">';
					}
					if(data.current_message.message != null){
						feedajax +='<p class="messag">'+data.current_message.message+'</p>';
					}
					$('#show-current').prepend(feedajax);
				}
			});	 
		});
	});
	

	$(document).ready( function () {
		$('#users').dataTable();
		$('#adminleavetable').dataTable();
		$('#allattendance').dataTable();
		$('#admintickets').dataTable();
		$('#assetsTable').dataTable();
		$('#employeeSalary').dataTable();
		$('#leaveReport').dataTable();
		
		$(".edituser").on('click', function(){
			var user_id = $(this).val();
			var uid = $(this).attr('placeholder');
			$("#edit_user").modal("show");
			$.ajax({
				type:"GET",
				url:"/attendance/public/edituser/"+user_id+"/"+uid,
				success: function(response){
					//console.log(response);
					console.log(response);
					$("#user_id").val(response.edituser.id);
					$("#firstname").val(response.edituser.name);
					$("#lastname").val(response.edituser.last_name);
					$("#usernames").val(response.edituser.username);
					$("#user_email").val(response.edituser.email);
					$("#user_phone").val(response.edituser.phone);
					$("#user_role").val(response.edituser.role);
					$("#user_company").val(response.edituser.company);
					$("#user_uid").val(response.edituser.uid);
					$("#permission_uid").val(response.edituser.uid);
					$("#user_department").val(response.edituser.department);
					$("#user_designation").val(response.edituser.designation);
					$("#genders").val(response.edituser.gender);
					$("#joining_date").val(response.edituser.joining_date);		
					
					/* $.each(response.permission, function(key, value){	
							var update_atten = (value.permission_id);
							if(update_atten!="0"){
								var check = 'checked="checked"';
							}else{
								var check = '';
							} 
							//console.log(check);
							$('.atten_update').append('<td class="text-center attend_main"><input type="hidden" id="att_default" name="attendace[]" value="0" disabled="disabled"><input checked="checked" type="checkbox" name="attendace[]" value="'+update_atten+'"></td>');
					}); */
				}
			});
		});
	});
	
	/* $(document).on('click', 'td input[type="checkbox"]',function(){
		if($(this).is(':checked')){
			$(this).closest('td.attend_main').find('#att_default').attr("disabled","true");
		}else{
			$(this).closest('td.attend_main').find('#att_default').removeAttr("disabled","true");
		}
	}); */
	 
	
	
	$(document).ready( function () {
		$(".editholiday").on('click', function(){
			var holiday_id = $(this).val();
			$('#edit_holiday').modal("show");
			$.ajax({
				type:"GET",
				url:"/attendance/public/editholiday/"+holiday_id,
				success: function(response){
					console.log(response);
					$("#id").val(response.editholiday.id);
					$("#update_name").val(response.editholiday.name);
					$("#update_date").val(response.editholiday.date);
				}
			});
		});	
	});
	
	
	$('body').on('click','.showreason',function(){
		var leave_id = $(this).val();
		$('#leave_reason').modal("show");
		$.ajax({
			type:"GET",
			url:"/attendance/public/leavereasonshow/"+leave_id,
			success: function(response){
				$(".reason_leave").text(response.leavereasonshow.leave_reason);
			}
		}); 
	});	
	
	
	$(document).ready( function () {
		$(".attendance_button").on('click', function(){
			var attendance_id = $(this).val();
			var days = $(this).attr("placeholder");
			$('#attendance_info').modal("show");
			$.ajax({
				type:"GET",
				url:"/attendance/public/viewattendacenstatus/"+attendance_id+"/"+days,
				success: function(response){
					var someNumbers = (response.activitymodel);	
					if(someNumbers!=""){
						$.each(someNumbers, function(index, val) {
							$('.timeOut').append('<li><p class="mb-0">Punch In at</p><p class="res-activity-time"><i class="fa fa-clock-o"></i>'+val.time_in+'</p></li><li><p class="mb-0">Punch Out at</p><p class="res-activity-time"><i class="fa fa-clock-o"></i>'+val.time_out+'</p></li>');
						});	
					}
					$(".text-muted").text(response.viewattendacenstatus.day);
					$(".admin-view-punchin").text(response.viewattendacenstatus.time_in);
					$(".admin-view-punchout").text(response.viewattendacenstatus.time_out);
					$(".adminbreak").text(response.viewattendacenstatus.break);
				}
			});  
		});	 
	});
	
	//$('.close').click(function(){
	$(document).on("click", "#single-show", function(){
		$('.modal-content').load(' .modal-content');
	});
	
	
	$(document).ready( function () {
		$(".ticket-descri").on('click', function(){
			var ticket_id = $(this).val();			
			$('#tickets_view').modal("show");
			$.ajax({
				type:"GET",
				url:"/attendance/public/showtickets/"+ticket_id,
				success: function(response){
					console.log(response.showtickets);
					console.log(response.showtickets.description);
					$(".ticketsall").text(response.showtickets.description);
				}
			}); 
		});	
	});
	
	
	$(document).ready( function () {
		$(".projectedit").on('click', function(){
			var projectedit_id = $(this).val();
			$('#edit_project').modal("show");
			$.ajax({
				type:"GET",
				url:"/attendance/public/projectedit/"+projectedit_id,
				success: function(response){
					//console.log(response.projectedit.users);
					$.each(response.projectedit.users, function(key, value){
						var edit_user_assign    = (value.id);
						var edit_user_name      = (value.name);
						var edit_user_last_name = (value.last_name);
						$('#edit_projectlead').append('<option value="'+edit_user_assign+'" selected>'+edit_user_name+" "+edit_user_last_name+'</option>');
					});
					$('#project_id').val(response.projectedit.id);
					$('#edit_project_name').val(response.projectedit.project_name);
					$('#edit_enddate').val(response.projectedit.deadline);
					//$('#edit_projectlead').val(response.projectedit.projectlead);
					//$('#edit_addteam').val(response.projectedit.addteam);
					$('#edit_priority').val(response.projectedit.priority);
					$('#edit_status').val(response.projectedit.status);
					$('#edit_description').val(response.projectedit.description);
					$('#edit_image').val(response.projectedit.files);
				}
			}); 
		});	
	});
	
	
	function display_ct6() {
		var x = new Date()
		var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
		hours = x.getHours( ) % 12;
		hours = hours ? hours : 12;
		x = hours + ":" +  x.getMinutes() + ":" +  x.getSeconds() + ":" + ampm;
		//document.getElementById('ct6').innerHTML = x;
		display_c6();
		 }
		 function display_c6(){
			var refresh=1000; // Refresh rate in milli seconds
			mytime=setTimeout('display_ct6()',refresh)
		}
		display_c6()
		



$(document).ready(function(){	
	$('.custom-password-validation').hide();
	 $('#password').keyup(function(){
		 $('.custom-password-validation').show();
		 $(this).siblings(".alert").hide();
    });
});

		
// For name only accept character		
jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z\s]+$/i.test(value);
}, "Letters only please"); 

// For phone number
jQuery.validator.addMethod("exactlength", function(value, element, param) {
 return this.optional(element) || value.length == param;
}, $.validator.format("Please enter exactly {0} characters."));


jQuery.validator.addMethod(
  "regex",
  function(value, element, regexp) {
    var re = new RegExp(regexp);
    return this.optional(element) || re.test(value);
  },
  "Please check your input."
);

jQuery.validator.addMethod("custom_validation", function(value, element, param) {
    var status = false;
	  if(value.length>5){
		  $('.custom-password-validation .min-six').addClass('text-success');
		  // return true;
		  status = true;
	  }else{
		$('.custom-password-validation .min-six').removeClass('text-success');
		  // return true;
		  status = false;
	  }

	  if(hasLowerCase(value)){
		$('.custom-password-validation .lower-case').addClass('text-success');
		status = true;
	  }else{
		$('.custom-password-validation .lower-case').removeClass('text-success');
		status = false;
		// return true
	  }

	  if(hasUpperCase(value)){
		$('.custom-password-validation .upper-case').addClass('text-success');
		status = true;
	  }else{
		$('.custom-password-validation .upper-case').removeClass('text-success');
		status = false;
		// return true
	  }

	  if(hasSpecialSymbol(value)){
		$('.custom-password-validation .symbols').addClass('text-success');
		status = true;
	  }else{
		$('.custom-password-validation .symbols').removeClass('text-success');
		status = false;
		// return true
	  }

	  if(hasNumber(value)){
		$('.custom-password-validation .number').addClass('text-success');
		status = true;
	  }else{
		$('.custom-password-validation .number').removeClass('text-success');
		status = false;
		// return true;
	  }
	  return status;

	}, $.validator.format(""));

	function hasLowerCase(str) {
		return (/[a-z]/.test(str));
	}

	function hasUpperCase(str) {
		return (/[A-Z]/.test(str));
	}

	function hasSpecialSymbol(str){
	  return (/[_\W]/).test(str);
	}

	function hasNumber(str){
	  return (/[0-9]/).test(str);
	}



	$("#commentForm").validate({
					errorElement: 'div',
					errorClass: 'alert alert-danger',
					onkeyup: function(element) {
						   $(element).valid(); 
					},
		rules: {
				first_name: {
						required: true,
						lettersonly:true
					},
				last_name: {
						required: true,
						lettersonly:true
					},
				username: {
						required: true
					},
				 email:{
					  required:true,
					  regex: "^[a-zA-Z0-9_.]+@[a-zA-Z_]+?\.[a-zA-Z]{2,6}$" 
					},
				uid: {
						required: true
					},
				join_date: {
						required: true
					},
				phone:{
					  required:true,
					  digits:true,
					  exactlength: 10
					},
				company: {
						required: true
					},
				department: {
						required: true
					},
				designation: {
						required: true
					},
				role: {
						required: true
					},
				gender: {
					required: true
				},
				password:{
					required:true,
					custom_validation:'all'		
				},
				password_confirmation:{
					required:true,			
					equalTo : "#password"
				},	
				
				},
		messages: {
			first_name: {
				required: 'Please enter full name',
				lettersonly:'Name should be only characters'
			},
			last_name: {
				required: 'Please enter Last name',
				lettersonly:'Name should be only characters'
			},
			username: {
				required: 'Please enter username'
			},
			email:{
			  required:'Please enter email',
			  regex:"Enter valid email"
			},
			uid: {
				required: 'Please enter Employee ID'
			},
			join_date: {
				required: 'Please select the joining date'
			},
			 phone:{
				required:"Please enter mobile number",
				digits:true,
				exactlength: "Please enter 10 digits"
			},
			company: {
				required: 'Please enter the company name'
			},
			department: {
				required: 'Please enter the department'
			},
			designation: {
				required: 'Please enter the designation'
			},
			role: {
				required: 'Please enter the role'
			},
			gender: {
				required: 'Please select the gender'
			},
			password:{
				required:"Please enter password ",	
			},
			password_confirmation:{
				required:"Please enter confirm password",		
				equalTo : "Password and Confirm Password should be same"
			},
			
		},
	});	


	// Add validation for edit user format
	$("#editform").validate({
			errorElement: 'div',
			errorClass: 'alert alert-danger',
			onkeyup: function(element) {
				   $(element).valid(); 
			},
			rules: {
				  firstname: {
					required: true,
					lettersonly:true
				},
				lastname: {
					required: true,
					lettersonly:true
				},
				usernames: {
					required: true
				},
				user_email:{
					required:true,
					regex: "^[a-zA-Z0-9_.]+@[a-zA-Z_]+?\.[a-zA-Z]{2,6}$" 
				},
				user_phone:{
					  required:true,
					  digits:true,
					  exactlength: 10
				},
				user_company: {
					required: true
				},
				user_department: {
					required: true
				},
				user_designation: {
					required: true
				},
				user_role: {
					required: true
				},
				genders: {
					required: true
				},
				user_uid: {
					required: true
				},
				joining_date: {
					required: true
				},
				
			},
			messages: {
				firstname: {
					required: 'Please enter full name',
					lettersonly:'Name should be only characters'
				},
				lastname: {
					required: 'Please enter last name',
					lettersonly:'Name should be only characters'
				},
				usernames: {
					required: 'Please enter username'
				},
				user_email:{
				    required:'Please enter email',
				    regex:"Enter valid email"
				},
				user_phone:{
					required:"Please enter mobile number",
					digits:true,
					exactlength: "Please enter 10 digits"
				},
				user_company: {
					required: 'Please enter company'
				},
				user_department: {
					required: 'Please enter department'
				},
				user_designation: {
					required: 'Please enter designation'
				},
				user_role: {
					required: 'Please enter role'
				},
				genders: {
					required: 'Please select gender'
				},
				user_uid: {
					required: 'Please enter employee ID'
				},
				joining_date: {
					required: 'Please enter joining date'
				},
				
			}
	});

	$("#addholiday").validate({
			errorElement: 'div',
			errorClass: 'alert alert-danger',
			onkeyup: function(element) {
				   $(element).valid(); 
			},
		rules: {
			name: {
				required: true
			},
			date: {
				required: true
			}
		},
		messages: {
			name: {
				required: "Please enter the holiday name"
			},
			date: {
				required: "Please select the holiday date"
			}
		}
	});	
	
	
	$("#updateholiday").validate({
			errorElement: 'div',
			errorClass: 'alert alert-danger',
			onkeyup: function(element) {
				   $(element).valid(); 
			},
		rules: {
			update_name: {
				required: true
			},
			update_date: {
				required: true
			}
		},
		messages: {
			update_name: {
				required: "Please enter the holiday name"
			},
			update_date: {
				required: "Please select the holiday date"
			}
		}
	});	
	
	
	// End date validation on add new project form.
	$.validator.addMethod("endDate", function(value, element) {
            var startDate = $('#startdate').val();
            return Date.parse(startDate) <= Date.parse(value) || value == "";
        }, "* End date must be after start date");	
	
	$('#addproject').validate({
	  rules: {
			project_name:{
				required:true, 
			 },
			status:{
				required:true, 
			 },
		/* 	startdate:{
				required:true, 
			 }, 
			enddate:{
				required:true,
				endDate:"End date must be after start date"	
			 },  */
			enddate:{
				required:true, 
			 },
			projectlead:{
				required:true, 
			 },
			addteam:{
				required:true, 
			 },	
			priority:{
				required:true, 
			 },	
			description:{
				required:true, 
			 },	
	  },
	  messages: {
		 project_name:{
			required:"Please enter the project name", 
			},
		    status:{
				required:"Please select any one status", 
			} ,
			/*startdate:{
				required:"Please select the project start date", 
			} ,
			 enddate:{
				required:"Please select the project enddate", 
				endDate:'Please selected {0}'
			} , */
			enddate:{
				required:"Please select the project Deadline date", 
			} ,
			projectlead:{
				required:"Please select the project lead name", 
			} ,
			addteam:{
				required:"Please add the team", 
			} ,
			priority:{
				required:"Please add the project priority", 
			} ,
			description:{
				required:"Please enter the project description", 
			} ,
	  }
	});
  
  
  // End date validation on add new project form.
	$.validator.addMethod("editendDate", function(value, element) {
            var edit_startdate = $('#edit_startdate').val();
            return Date.parse(edit_startdate) <= Date.parse(value) || value == "";
        }, "* End date must be after start date");	
  
	$('#editproject').validate({
		rules: {
			edit_project_name:{
				required:true,
			},
			edit_clientname:{
				required:true,
			},
			/* edit_startdate:{
				required:true,
			},
			edit_enddate:{
				required:true,
				editendDate:"End date must be after start date"	
			}, */
			edit_enddate:{
				required:true,
			},
			edit_projectlead:{
				required:true,
			},
			edit_addteam:{
				required:true,
			},
			edit_priority:{
				required:true,
			},
			edit_description:{
				required:true,
			},
		},
		messages: {
			edit_project_name:{
				required:'Please enter the project name',
			},
			edit_clientname:{
				required:'Please enter the project name',
			},
			/* edit_startdate:{
				required:'Please enter the project name',
			},
			edit_enddate:{
				required:'Please enter the project name',
				editendDate:'Please selected {0}'
			}, */
			edit_enddate:{
				required:'Please enter the project deadline date',
			},
			edit_projectlead:{
				required:'Please enter the project name',
			},
			edit_addteam:{
				required:'Please enter the project name',
			},
			edit_priority:{
				required:'Please enter the project name',
			},
			edit_description:{
				required:'Please enter the project name',
			},
		}
	});
	
	// Add new task from task board
	$('#addtaskvalid').validate();
	
	

$('#phone').keypress(function(e) {  
      var arr = [];  
      var kk = e.which;  
     
      for (i = 48; i < 58; i++)  
          arr.push(i);  
     
      if (!(arr.indexOf(kk)>=0))  
          e.preventDefault();  
  }); 

	$('#user_phone').keypress(function(e){  
      var arr = [];  
      var kk = e.which;  
     
      for (i = 48; i < 58; i++)  
          arr.push(i);  
     
      if (!(arr.indexOf(kk)>=0))  
          e.preventDefault();  
	}); 
  
	
	$('.edittaskboard').click(function(){
		var edit_id = $(this).val();
		$('#edit_task_modal').modal("show");
		$.ajax({
			type:'GET',
			url:'/attendance/public/edittaskboard/'+edit_id,
			success:function(response){
				console.log(response.edit_id.due_date);
				$("#taskboard_id").val(response.edit_id.id);
				$("#edit_task_name").val(response.edit_id.task_name);
				$("#edit_task_priority").val(response.edit_id.task_priority);
				$("#edit_due_date").val(response.edit_id.due_date);
				$("#edit_task_Status").val(response.edit_id.status);
			}
		});
	});	
	
	$( ".product_drag_area" ).droppable({
		drop: function() {
			var	drop_id = $('#drop_id').val();
			$.ajax({
				type:"GET",
				url:"/attendance/public/dropablesave/"+drop_id,
				success:function(response){
					if(response.status==200){
						$('.savedrop').html('<div class="alert alert-success">Save</div>');
					}else if(response.status==201) {
						$('.savedrop').html('<div class="alert alert-danger">Not save</div>');
					}
				}
			}); 
		}
	});
	
	$( ".product_drag_area_pending" ).droppable({
		drop: function() {
			var	drop_id = $('#drop_id').val();
			$.ajax({
				type:"GET",
				url:"/attendance/public/dropanding/"+drop_id,
				success:function(response){
					if(response.status==200){
						$('.savedrop').html('<div class="alert alert-success">Save</div>');
					}else if(response.status==201) {
						$('.savedrop').html('<div class="alert alert-danger">Not save</div>');
					}
				}
			}); 
		}
	});
	
	$( ".product_drag_completed" ).droppable({
		drop: function() {
			var	drop_id = $('#drop_id').val();
			 $.ajax({
				type:"GET",
				url:"/attendance/public/dropcomplete/"+drop_id,
				success:function(response){
					if(response.status==200){
						$('.savedrop').html('<div class="alert alert-success">Save</div>');
					}else if(response.status==201) {
						$('.savedrop').html('<div class="alert alert-danger">Not save</div>');
					}
				}
			});  
		}
	});
	
	
	$( ".product_drag_inprogress" ).droppable({
		drop: function() {
			var	drop_id = $('#drop_id').val();
			 $.ajax({
				type:"GET",
				url:"/attendance/public/dropinprogress/"+drop_id,
				success:function(response){
					if(response.status==200){
						$('.savedrop').html('<div class="alert alert-success">Save</div>');
					}else if(response.status==201) {
						$('.savedrop').html('<div class="alert alert-danger">Not save</div>');
					}
				}
			});  
		}
	});
	
	$( ".product_drag_onhold" ).droppable({
		drop: function() {
			var	drop_id = $('#drop_id').val();
			 $.ajax({
				type:"GET",
				url:"/attendance/public/droponhold/"+drop_id,
				success:function(response){
					if(response.status==200){
						$('.savedrop').html('<div class="alert alert-success">Save</div>');
					}else if(response.status==201) {
						$('.savedrop').html('<div class="alert alert-danger">Not save</div>');
					}
				}
			});  
		}
	});
	
	$( ".product_drag_reviews" ).droppable({
		drop: function() {
			var	drop_id = $('#drop_id').val();
			 $.ajax({
				type:"GET",
				url:"/attendance/public/droponreview/"+drop_id,
				success:function(response){
					if(response.status==200){
						$('.savedrop').html('<div class="alert alert-success">Save</div>');
					}else if(response.status==201) {
						$('.savedrop').html('<div class="alert alert-danger">Not save</div>');
					}
				}
			});  
		}
	});
	
	
	$('#editasset').validate({
		rules:{
			edit_asset_name:{
				required:true,
			},
			edit_purchase_date:{
				required:true,
			},
			edit_purchase_name:{
				required:true,
			},
			edit_manufaturer:{
				required:true,
			},
			edit_model:{
				required:true,
			},
			edit_serial_number:{
				required:true,
			},
			edit_supplier:{
				required:true,
			},
			edit_condition:{
				required:true,
			},
			edit_warranty:{
				required:true,
			},
			edit_status:{
				required:true,
			},
			edit_value:{
				required:true,
			},
			edit_asset_user:{
				required:true,
			},
			edit_description:{
				required:true,
			},
		},
		messages: {
			edit_asset_name: {
				required:"Please enter the asset name",
			},
			edit_purchase_date: {
				required:"Please enter the puchase date",
			},
			edit_purchase_name: {
				required:"Please enter the puchase name",
			},
			edit_manufaturer: {
				required:"Please enter the manufaturer",
			},
			edit_model: {
				required:"Please enter the model",
			},
			edit_serial_number: {
				required:"Please enter the serial number",
			},
			edit_supplier: {
				required:"Please enter the supplier",
			},
			edit_condition: {
				required:"Please enter the condition",
			},
			edit_warranty: {
				required:"Please enter the warranty",
			},
			edit_status: {
				required:"Please enter the status",
			},
			edit_value: {
				required:"Please enter the value",
			},
			edit_asset_user: {
				required:"Please enter the asset user",
			},
			edit_description: {
				required:"Please enter the description",
			},
		}
	});
	
	
	$('#addsalary').validate();
	
	$('.editasset').click(function(){
		var asset_id = $(this).val();
		$('#edit_asset').modal('show');
		$.ajax({
			type:"GET",
			url:'/attendance/public/editassest/'+asset_id,
			success:function(response){
				//console.log(response);
				$('#edit_id').val(response.editasset.id);
				$('#edit_asset_name').val(response.editasset.asset_name);
				$('#edit_brand').val(response.editasset.brand);
				$('#edit_condition').val(response.editasset.condition);
				$('#edit_assign').val(response.editasset.assign_user);
				$('#edit_assign_date').val(response.editasset.assign_date);
				$('#edit_handover').val(response.editasset.handover);
			}
		});
	});
	
	$('#addroles').validate({
		rules:{
			name:{
				required:true,
			}
		},
		messages:{
			name:{
				required:"Please enter the role name",
			}
		}
	});
	
	$('.editroles').click(function(){
		var role_id = $(this).val();
		$('#edit_role').modal('show');
		$.ajax({
			type:'GET',
			url:'/attendance/public/editrole/'+role_id,
			success:function(response){
				$('#editrole_id').val(response.editrole.id);
				$('#edit_role_name').val(response.editrole.name);
			}
		});
	});
	
	$('#editrole').validate({
		rules:{
			edit_role_name:{
				required:true,
			}
		},
		messages:{
			edit_role_name:{
				required:"Please enter the role name",
			}
		}
	});
	
	$('.deleteroles').click(function(){
		var deleterole_id = $(this).val();
		$.ajax({
			type:"get",
			url:'/attendance/public/deletrole/'+deleterole_id,
			success:function(response){
				console.log(response);
				if(response.status==200){
					location.reload();
					$('#deletasset').html('<div class="alert alert-success">Role delete successfully!</div>');
				}else{
					alert('Note deleted');
				}
			}
		});
	});
	

	$('.print').click(function(){
		$('#printpage').printThis({
					debug: false,               // show the iframe for debugging
					importCSS: true,            // import parent page css
					importStyle: false,         // import style tags
					printContainer: true,       // print outer container/$.selector
					loadCSS: "",                // path to additional css file - use an array [] for multiple
					pageTitle: "Hello test",              // add title to print page
					removeInline: false,        // remove inline styles from print elements
					removeInlineSelector: "*",  // custom selectors to filter inline styles. removeInline must be true
					printDelay: 333,            // variable print delay
					header: null,               // prefix to html
					footer: null,               // postfix to html
					base: false,                // preserve the BASE tag or accept a string for the URL
					formValues: true,           // preserve input/form values
					canvas: false,              // copy canvas content
					doctypeString: '...',       // enter a different doctype for older markup
					removeScripts: false,       // remove script tags from print content
					copyTagClasses: false,      // copy classes from the html & body tag
					beforePrintEvent: null,     // function for printEvent in iframe
					beforePrint: null,          // function called before iframe is filled
					afterPrint: null            // function called before iframe is removed
		});
	});
	

	
	$(document).ready( function () {
		$(".add_empl_leave").on('click', function(){
			var leave_uid = $(this).val();
			$('.leave_totalss').val(leave_uid);
			$('#employee_total_leaves').modal("show");
		});	
		
		
		$("#added_leave").validate({
					errorElement: 'div',
					errorClass: 'alert alert-danger',
					onkeyup: function(element) {
						   $(element).valid(); 
					},
			rules:{
				uid:{
					required:true,
				},
				leave_total:{
					required:true,
					digits:true,
				},
			},
			messages:{
				uid:{
					required:"Please select any one",
				},
				leave_total:{
					required:"Please enter the total number of leave",
					digits:"Please enter only digits",
				},
			}
		});
		
		$("#update_leave").validate({
					errorElement: 'div',
					errorClass: 'alert alert-danger',
					onkeyup: function(element) {
						   $(element).valid(); 
					},
			rules:{
				update_leave_total:{
					required:true,
					digits:true,
				},
			},
			messages:{
				update_leave_total:{
					required:"Please enter the total number of leave",
					digits:"Please enter only digits",
				},
			}
		});
	});
	
	
/* start validation on Personal Information form */	
	$(document).ready(function(){
		$("#addpersonal").validate({
					errorElement: 'div',
					errorClass: 'alert alert-danger',
					onkeyup: function(element) {
						   $(element).valid(); 
					},
			rules:{
				passport_no:{
					required:true,
				},
				passport_expiry_date:{
					required:true,
				},
				phone:{
					required:true,
					digits:true,
					exactlength: 10
				},
				nationality:{
					required:true,
				},
			},
			messages:{
				passport_no:{
					required:"Please enter the passport no",
				},
				passport_expiry_date:{
					required:"Please select the expiry date"
				},
				phone:{
					required:"Please enter your 10 digit mobile number",
					digits:"Please enter only number",
					exactlength: "Please enter 10 mobile number"
				},
				nationality:{
					required:"Please enter your nationality",
				}
			},
		});
		
		$('#marital_status').on('change', function() {
			var status = $(this).val();
			if(status == "Unmarried"){
				$(".ifunmaried").css({"display":"none"});
			}else{
				$(".ifunmaried").css({"display":"block"});
			}
		});
		
		
		setTimeout(function () {
			$("select#edit_marital_status").trigger('change');
		}, 1000);
		$("select#edit_marital_status").on('change',function(){
			var edit_status = $(this).val();
			if(edit_status == "Unmarried"){
				console.log(edit_status);	
				$(".edit_ifunmaried").css({"display":"none"});
			}else{
				$(".edit_ifunmaried").css({"display":"block"});
			} 
		});
		
	});
/* End validation on Personal Information form */
	
	
	/* Start form validate on Add Emergency Contact */
	$(document).ready(function(){
		$("#add_emergency").validate({
			errorElement: 'div',
			errorClass: 'alert alert-danger',
			onkeyup: function(element) {
				   $(element).valid(); 
			},
			rules:{
				primary_name:{
					required:true,
				},
				primary_relation:{
					required:true,
				},
				primary_phone:{
					required:true,
					digits:true,
					exactlength:10
				},
				primary_phone2:{
					digits:true,
					exactlength:10
				},
				secondary_name:{
					required:true,
				},
				secondary_relation:{
					required:true,
				},
				secondary_phone:{
					required:true,
					digits:true,
					exactlength:10
				},
				secondary_phone2:{
					digits:true,
					exactlength:10
				}
			},
			messages:{
				primary_name:{
					required:"Please enter the primary person name",
				},
				primary_relation:{
					required:"Please enter the relationship",
				},
				primary_phone:{
					required:"Please enter 10 digit mobile number",
					digits:"Please enter only number",
					exactlength:"Please enter 10 digits"
				},
				primary_phone2:{
					digits:"Please enter only number",
					exactlength:"Please enter 10 digits"
				},
				secondary_name:{
					required:"Please enter the name",
				},
				secondary_relation:{
					required:"Please enter the relationship",
				},
				secondary_phone:{
					required:"Please enter the 10 mobile number",
					digits:"Please enter only numbers",
					exactlength:"Pleas enter 10 digits mobile number"
				},
				secondary_phone2:{
					digits:"Please enter only number",
					exactlength:"Please enter 10 digits mobile number"
				}
				
			},	
		});	
		
		
	// update form validation
	$("#update_emergency").validate({
		errorElement: 'div',
		errorClass: 'alert alert-danger',
		onkeyup: function(element) {
			   $(element).valid(); 
		},
		rules:{
			primary_name:{
				required:true,
			},
			primary_relation:{
				required:true,
			},
			primary_phone:{
				required:true,
				digits:true,
				exactlength:10
			},
			primary_phone2:{
				digits:true,
				exactlength:10
			},
			secondary_name:{
				required:true,
			},
			secondary_relation:{
				required:true,
			},
			secondary_phone:{
				required:true,
				digits:true,
				exactlength:10
			},
			secondary_phone2:{
				digits:true,
				exactlength:10
			}
		},
		messages:{
			primary_name:{
				required:"Please enter the primary person name",
			},
			primary_relation:{
				required:"Please enter the relationship",
			},
			primary_phone:{
				required:"Please enter 10 digit mobile number",
				digits:"Please enter only number",
				exactlength:"Please enter 10 digits"
			},
			primary_phone2:{
				digits:"Please enter only number",
				exactlength:"Please enter 10 digits"
			},
			secondary_name:{
				required:"Please enter the name",
			},
			secondary_relation:{
				required:"Please enter the relationship",
			},
			secondary_phone:{
				required:"Please enter the 10 mobile number",
				digits:"Please enter only numbers",
				exactlength:"Pleas enter 10 digits mobile number"
			},
			secondary_phone2:{
				digits:"Please enter only number",
				exactlength:"Please enter 10 digits mobile number"
			}
			
		},	
	});	
		
		
	});	
	
/* End */



/* Start form validation on add family form */	
	$("document").ready(function(){
		$("#add_family").validate({
			errorElement: 'div',
			errorClass: 'alert alert-danger',
			onkeyup: function(element) {
				   $(element).valid(); 
			},
			rules:{
				name:{
					required:true,
				},
				relation:{
					required:true,
				},
				date_birth:{
					required:true,
				},
				phone:{
					required:true,
					digits:true,
					exactlength:10
				}	
			},
			messages:{
				name:{
					required:"Please enter the name",
				},
				relation:{
					required:"Please enter your relationship"
				},
				date_birth:{
					required:"Please select date",
				},
				phone:{
					required:"Please enter your 10 digits mobile number",
					digits:"Please enter only number",
					exactlength:"Please enter only 10 digits mobile number"
				}	
			},
		});
	});
/* End */


/* Start Add Education Informations */
	$("document").ready(function(){
		$("#add_education").validate({
			errorElement: 'div',
			errorClass: 'alert alert-danger',
			onkeyup: function(element) {
				   $(element).valid(); 
			},
			rules:{
				"institue[]":{
					required:true,
				},
				"education[]":{
					required:true,
				},
				"passing_year[]":{
					required:true,
				},
				"marks_obtained[]":{
					required:true,
				},
				"stream[]":{
					required:true,
				},
				"grade[]":{
					required:true,
				},	
			},
			message:{
				"institue[]":{
					required:"Pleaes enter the institue name",
				},
				"education[]":{
					required:"Please enter the education",
				},
				"passing_year[]":{
					required:"Please entre the passing year",
				},
				"marks_obtained[]":{
					required:"Please enter marks obtained",
				},
				"stream[]":{
					required:"Please enter your stream",
				},
				"grade[]":{
					required:"Please enter your grade",
				},
			},
		});
		
		$("a.add_more").click(function(){
			$('.add_extra_field').append('<div class="remove_record"><h3 class="card-title">Education Informations</h3><a href="#" class="remove_more_education"><i class="fa fa-minus" aria-hidden="true"></i></a><div class="row"><div class="col-md-6"><div class="form-group"><label class="focus-label">Institution/Board/University <span class="text-danger">*</span></label><input type="text" class="form-control" name="institue[]" id="institue"></div></div><div class="col-md-6"><div class="form-group"><label class="focus-label">Education <span class="text-danger">*</span></label><input type="text" class="form-control" name="education[]" id="education"></div></div><div class="col-md-6"><div class="form-group"><label class="focus-label">Passing Year <span class="text-danger">*</span></label><input type="text" class="form-control" name="passing_year[]" id="passing_year"></div></div><div class="col-md-6"><div class="form-group"><label class="focus-label">Marks Obtained <span class="text-danger">*</span></label><input type="text" class="form-control" name="marks_obtained[]" id="marks_obtained"></div></div><div class="col-md-6"><div class="form-group"><label class="focus-label">Stream <span class="text-danger">*</span></label><input type="text" class="form-control" name="stream[]" id="stream"></div></div><div class="col-md-6"><div class="form-group"><label class="focus-label">Grade <span class="text-danger">*</span></label><input type="text" class="form-control" name="grade[]" id="grade"></div></div></div></div>'); 
		});
			
		$(document).on('click', '.remove_more_education', function() {
			$(this).closest('.remove_record').remove();
		});	
		
	});
/* End */	


/* Start Add Experience validation */

$("document").ready(function(){
	$('#add_exp').validate({
		errorElement: 'div',
		errorClass: 'alert alert-danger',
		onkeyup: function(element) {
				   $(element).valid(); 
			},
		rules:{
			"company_name[]":{
				required:true,
			},
			"position[]":{
				required:true
			},
			"add_experience[]":{
				required:true,
			},
			"location[]":{
				required:true,
			},
		},
		messages:{
			"company_name[]":{
				required:"Please enter your company name",
			},
			"position[]":{
				required:"Please enter your Job position",
			},
			"add_experience[]":{
				required:"Please enter your experience",
			},
			"location[]":{
				required:"Please enter your company address",
			},
		},
	}); 
	
	
	$("a.add_more_experience").click(function(){
		$('.add_more_field').append('<div class="record"><h3 class="card-title">Experience Informations</h3><a href="#" class="remove_more_experience"><i class="fa fa-minus" aria-hidden="true"></i></a><div class="row"><div class="col-md-6"><div class="form-group"><label class="focus-label">Company Name <span class="text-danger">*</span></label><input type="text" class="form-control" name="company_name[]" id="company_name"></div></div><div class="col-md-6"><div class="form-group"><label class="focus-label">Job Position <span class="text-danger">*</span></label><input type="text" class="form-control" name="position[]" id="position"></div></div><div class="col-md-6"><div class="form-group"><label class="focus-label">Add Experience <span class="text-danger">*</span></label><input type="text" class="form-control" name="add_experience[]" id="add_experience"></div></div><div class="col-md-6"><div class="form-group"><label class="focus-label">Location <span class="text-danger">*</span></label><textarea class="form-control" name="location[]" id="location" rows="2" cols="5"></textarea></div></div></div></div>');
	});
	
	$(document).on('click', '.remove_more_experience', function() {
        $(this).closest('.record').remove();
    });
	
});

/* End Add Experience validation */	


/* Start Add Bank Informations*/
	$("document").ready(function(){
		$("#add_bank").validate({
			errorElement: 'div',
			errorClass: 'alert alert-danger',
			onkeyup: function(element) {
				   $(element).valid(); 
			},
			rules:{
				name:{
					required:true,
				},
				account_number:{
					required:true,
				},
				ifsc_code:{
					required:true,
				},
				branch_name:{
					required:true,
				},
				bank_address:{
					required:true,
				},
			},
			messages:{
				name:{
					required:"Please enter your bank holder name",
				},
				account_number:{
					required:"Please enter your account number",
				},
				ifsc_code:{
					required:"Please enter your IFSC Code",
				},
				branch_name:{
					required:"Please enter your branch name",
				},
				bank_address:{
					required:"Please enter your bank address",
				},
			},
		});
	});
/* End Add Bank Informations*/
	
	
	$(document).ready(function(){
		setInterval(function() {
				$('.live_chate').load(' .live_chate');
			}, 100);
	});

	
</script>	
	