 <script src="{{asset('assets/jquery/jquery-3.5.1.min.js.download')}}"></script>
 
   <script src="{{asset('assets/jquery/popper.min.js.download')}}"></script>
	<script src="{{asset('assets/jquery/bootstrap.min.js.download')}}"></script>
	<script src="{{asset('assets/jquery/jquery.slimscroll.min.js.download')}}"></script>

   <!-- <script src="assets/jquery/morris.min.js.download"></script>-->
   <script src="{{asset('assets/jquery/raphael.min.js.download')}}"></script>
    <!--<script src="assets/jquery/chart.js.download"></script>-->

   <script src="{{asset('assets/jquery/app.js.download')}}"></script>

    <div class="sidebar-overlay"></div>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
	
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	
	 <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	 <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	
<script>
	$(document).ready(function(){
		$('.hredit_attendacen').click(function(){
			var attendacen_id = $(this).attr('id');
			$('#attend_id').val(attendacen_id);
			$('#edit_attendacen').modal('show');	
		});
	});
	
	
	$("#addlatestupdate").validate({
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
	
	$(document).ready( function () {
		$(".projectedit").on('click', function(){
			var projectedit_id = $(this).val();
			$('#edit_project').modal("show");
			$.ajax({
				type:"GET",
				url:"/attendance/public/managerprojectedit/"+projectedit_id,
				success: function(response){
					$.each(response.projectedit.users, function(key, value){
						var edit_user_assign    = (value.id);
						var edit_user_name      = (value.name);
						var edit_user_last_name = (value.last_name);
						$('#edit_projectlead').append('<option value="'+edit_user_assign+'" selected>'+edit_user_name+" "+edit_user_last_name+'</option>');
					});
					$('#project_id').val(response.projectedit.id);
					$('#edit_project_name').val(response.projectedit.project_name);
					$('#edit_enddate').val(response.projectedit.deadline);
					$('#edit_priority').val(response.projectedit.priority);
					$('#edit_status').val(response.projectedit.status);
					$('#edit_description').val(response.projectedit.description);
					$('#edit_image').val(response.projectedit.files);
				}
			}); 
		});	
	});	

	
	$('#addproject').validate({
			errorElement: 'div',
			errorClass: 'alert alert-danger',
			onkeyup: function(element) {
				   $(element).valid(); 
			},
	    rules: {
			project_name:{
				required:true, 
			 },
			status:{
				required:true, 
			 },
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


		$('body').on('click','.showreason',function(){
			var leave_id = $(this).val();
			$('#show_leave_reason').modal("show");
			$.ajax({
				type:"GET",
				url:"/attendance/public/hrleavereasonshow/"+leave_id,
				success: function(response){
					$(".reason_leave").text(response.leavereasonshow.leave_reason);
				}
			}); 
		});	
		

		$(document).ready( function () {
			$(".editholiday").on('click', function(){
				var holiday_id = $(this).val();
				$('#edit_holiday').modal("show");
				$.ajax({
					type:"GET",
					url:"/attendance/public/hreditholiday/"+holiday_id,
					success: function(response){
						console.log(response);
						$("#id").val(response.editholiday.id);
						$("#update_name").val(response.editholiday.name);
						$("#update_date").val(response.editholiday.date);
					}
				});
			});	
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
	
	
	/*
	var ENDPOINT = "{{route('employee_dashboard')}}";
        var page = 1;
        infinteLoadMore(page);
        $('div#empl_feeds').scroll(function () {
            if($(this).scrollTop() + $(this).innerHeight() >= $(this)[0].scrollHeight) {
                page++; 
                infinteLoadMore(page);
				//console.log(page);
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
                    $("#empl_feeds").append(response);
                });
        }
	*/
	
	$(".see-more-updates").click(function() {
		$div = $($(this).data('div')); 
		$link = $(this).data('link'); 
		$page = $(this).data('page'); 
		$href = $link + $page; 
		$.get($href, function(response){ 
			$html = $(response).find("#more_latestupdate").html(); 
			$div.append($html);
		});
		$(this).data('page', (parseInt($page) + 1)); 
	}); 
	
	
	$(".see-more").click(function() {
		$div = $($(this).data('div')); 
		$link = $(this).data('link'); 
		$page = $(this).data('page'); 
		$href = $link + $page; 
		$.get($href, function(response){ 
			$html = $(response).find("#empl_feeds").html(); 
			$div.append($html);
		});
		$(this).data('page', (parseInt($page) + 1)); 
	}); 
	
	
	$(document).ready(function(){
		$('#feed-search').DataTable();
		  $('#feed').on('submit', function(event){
			event.preventDefault();
			var url = "{{route('addnewfeed')}}";
			var data = new FormData(this);
			$.ajax({
				url:url,
				method:"POST",
				processData: false,
				contentType: false,
				data:data,
				success:function(data){
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



	$(document).ready(function() {
		$(".full-Time").hide();
		$(".short-time").hide();
		$("#leave_type").change(function(){
			var sell = $(this).val();
			if(sell=="Half day"){
				$(".full-Time").show();
				$(".short-time").hide();
			}else if(sell=="Short day"){
				$(".short-time").show();
				$(".full-Time").hide();
			}
			else{
				$(".full-Time").hide();
				$(".short-time").hide();
			}
		});	
	})
	
	$("#edit_leave_type").change(function(){
			var sell = $(this).val();
			if(sell=="Half day"){
				$(".full-Time").show();
				$(".short-time").hide();
			}else if(sell=="Short day"){
				$(".short-time").show();
				$(".full-Time").hide();
			}
			else{
				$(".full-Time").hide();
				$(".short-time").hide();
			}
	});	
	
	// Get number of days
	$("input#from, input#to").bind("blur", function(event) {
		event.preventDefault();
		var start = new Date($('input#from').val());
		var end = new Date($('input#to').val());
		var diff = new Date(end - start);
		var days = diff / (1000 * 3600 * 24);  
		var total = $('#total_leave').val();
		var remaining_leave =  total - days;
		$('input#number_days').val(days);
		$('input#leave_remaining').val(remaining_leave);
	})
	
	
	//update number of days
	$("input#update_from, input#update_to").bind("blur", function(event) {
		event.preventDefault();
		var start = new Date($('input#update_from').val());
		var end = new Date($('input#update_to').val());
		var diff = new Date(end - start);
		var days = diff / (1000 * 3600 * 24);  
		$('input#update_number_days').val(days);
	})
			


$(document).ready(function() {
  clockUpdate();
  setInterval(clockUpdate, 1000);
})

function clockUpdate() {
  var date = new Date();
  function addZero(x) {
    if (x < 10) {
      return x = '0' + x;
    } else {
      return x;
    }
  }

  function twelveHour(x) {
    if (x > 12) {
      return x = x - 12;
    } else if (x == 0) {
      return x = 12;
    } else {
      return x;
    }
  }
  var h = addZero(twelveHour(date.getHours()));
  var m = addZero(date.getMinutes());
  var s = addZero(date.getSeconds());
  var x = new Date()
  var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
  $('.digital-clock').text(h + ':' + m + ':' + s + ':' +ampm)
}	


/* 
function display_ct6() {
	var x = new Date()
	var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
	hours = x.getHours( ) % 12;
	hours = hours ? hours : 12;
	x = hours + ":" +  x.getMinutes() + ":" +  x.getSeconds() + ":" + ampm;
	document.getElementById('ct6').innerHTML = x;
	display_c6();
	 }
	 function display_c6(){
	var refresh=1000; // Refresh rate in milli seconds
	mytime=setTimeout('display_ct6()',refresh)
}
display_c6();
 */


	$(document).ready( function () {
		$('#total_tickets').DataTable();
		$(".edittickets").click(function(){
			 var ticket_id = $(this).val();
			$('#edit_ticket').modal('show');
			$.ajax({
				type:"GET",
				url:"/attendance/public/edittickets/"+ticket_id,
				success: function(response){
					$("#update_id").val(response.edittickets.id);
					$("#ticket_issue").val(response.edittickets.ticket_subject);
					$("#ticketid").val(response.edittickets.ticket_id);
					$("#assignstaff").val(response.edittickets.assign_staff);
					//$("#clients").val(response.edittickets.client);
					$("#prioritys").val(response.edittickets.priority);
					$("#ccs").val(response.edittickets.cc);
					$("#descriptions").val(response.edittickets.description); 
					$("#files").val(response.edittickets.file); 
				}
			});
		});
		
		
		$(".viewtickets").click(function(){
			var ticket_id = $(this).val();
			$('#view_ticket').modal('show');
			$.ajax({
				type:"GET",
				url:"/attendance/public/edittickets/"+ticket_id,
				success: function(response){
					//console.log(response);
					///$("#update_id").val(response.edittickets.id);
					$("#view_ticket_issue").val(response.edittickets.ticket_subject);
					$("#ticketid").val(response.edittickets.ticket_id);
					$("#view_assignstaff").val(response.edittickets.assign_staff);
					//$("#clients").val(response.edittickets.client);
					$("#view_prioritys").val(response.edittickets.priority);
					$("#view_ccs").val(response.edittickets.cc);
					$("#view_descriptions").val(response.edittickets.description); 
					$("#files").val(response.edittickets.file); 
				}
			});
		});
		
	});	

	$(document).ready( function () {
		$('#total_working').DataTable();
	});
	
	$(document).ready( function () {
		$('#Employee_leaves').dataTable();
	});
	
	$(document).ready( function(){
		$(".leave-edit").on('click',function(){
			var editleave_id = $(this).val();
			//console.log(editleave_id);
			$("#edit_leave").modal("show");
			//alert("hello tst");
			$.ajax({
				type:"GET",
				url:"/attendance/public/employee_leave/"+editleave_id,
				success: function(response){
					console.log(response);
				}
			});
		});
	});
	
	
	$(document).ready( function(){
		$(".leaveedit").on('click',function(){
			var employeeleave_id = $(this).val();
			$("#employee_leave").modal("show");
			$.ajax({
				type:"GET",
				url:"/attendance/public/leave_request_edit/"+employeeleave_id,
				success: function(response){
					console.log(response);
					$('#leave_id').val(response.edit_leave_request.id);
					$('#update_leave_type').val(response.edit_leave_request.leave_type);
					$('#time').val(response.edit_leave_request.time);
					$('#leavetime').val(response.edit_leave_request.time);
					$('#update_from').val(response.edit_leave_request.from);
					$('#update_to').val(response.edit_leave_request.to);
					$('#update_number_days').val(response.edit_leave_request.number_days);
					$('#update_leave_remaining').val(response.edit_leave_request.leave_remaining);
					$('#update_leave_reason').val(response.edit_leave_request.leave_reason);
				}
			}); 
		});
		
		$(".viewleave").on('click',function(){
			var employeeleave_id = $(this).val();
			$("#view_leave").modal("show");
			$.ajax({
				type:"GET",
				url:"/attendance/public/leave_request_edit/"+employeeleave_id,
				success: function(response){
					//console.log(response);
					//$('#leave_id').val(response.edit_leave_request.id);
					$('#view_leave_type').val(response.edit_leave_request.leave_type);
					$('#view_time').val(response.edit_leave_request.time);
					$('#leavetime').val(response.edit_leave_request.time);
					$('#view_from').val(response.edit_leave_request.from);
					$('#view_to').val(response.edit_leave_request.to);
					$('#view_number_days').val(response.edit_leave_request.number_days);
					$('#view_leave_remaining').val(response.edit_leave_request.leave_remaining);
					$('#view_leave_reason').val(response.edit_leave_request.leave_reason);
				}
			});  
		});
		
		
		$(".datedrop").on('click',function(){
			var days = $(this).val();
			$('#showallactivity').modal('show');
			$.ajax({
				type:"GET",
				url:"/attendance/public/alldaysactivity/"+days,
				success: function(response){
					var someNumbers = (response.alldaysactivity);	
					if(someNumbers!=""){
						$.each(someNumbers, function(index, val) {
							console.log('hello test');
							$('.timeOut').append('<li><p class="mb-0">Punch In at</p><p class="res-activity-time"><i class="fa fa-clock-o"></i>'+val.time_in+'</p></li><li><p class="mb-0">Punch Out at</p><p class="res-activity-time"><i class="fa fa-clock-o"></i>'+val.time_out+'</p></li>');							
							
						});
					}
				}
				
			}); 
		});
		
		$(document).on("click", "#but", function(){
				$('.modal-content').load(' .modal-content');
		});  
			
	});

// Start date validation on apply leave form. 
$.validator.addMethod("startDate", function(value, element) {
            var currentdate = new Date();
            return Date.parse(currentdate) <= Date.parse(value) || value == "";
        }, "* Start date must be equal to or greater then day date");

// End date validation on apply leave form.
$.validator.addMethod("endDate", function(value, element) {
            var startDate = $('#from').val();
            return Date.parse(startDate) <= Date.parse(value) || value == "";
        }, "* End date must be after start date");
		
		

// update Start date validation on apply leave form. 
$.validator.addMethod("updatestartDate", function(value, element) {
            var currentdate = new Date();
            return Date.parse(currentdate) <= Date.parse(value) || value == "";
        }, "* Start date must be equal to or greater then day date");

// update End date validation on apply leave form.
$.validator.addMethod("updateendDate", function(value, element) {
            var startDate = $('#update_from').val();
            return Date.parse(startDate) <= Date.parse(value) || value == "";
        }, "* End date must be after start date");		
		

		
// Add validation on apply leave form	
$('#addleave').validate({
		errorElement: 'div',
		errorClass: 'alert alert-danger',
		onkeyup: function(element) {
				   $(element).valid(); 
			},
		rules:{
			leave_type:{
				required:true,
			},
			from:{
				required:true,
				startDate:"Start date must be equal to or greater then today date"
			},
			to:{
				required:true,
				endDate:"End date must be after start date"
			},
			leave_reason:{
				required:true,
			},
		},
		messages:{
			leave_type:{
				required:"Please select the leave day"
			},
			from:{
				required:"Please select from date",
				startDate:'Please selected {0}'
			},
			to:{
				required:"Please select to date",
				endDate:'Please selected {0}'
			},
			leave_reason:{
				required:"Please select the leave reason",
			},
		},
	});	
	
	
// update form validation on apply leave form	
$('#updateleave').validate({
		errorElement: 'div',
		errorClass: 'alert alert-danger',
		onkeyup: function(element) {
				   $(element).valid(); 
			},
		rules:{
			update_leave_type:{
				required:true,
			},
			update_from:{
				required:true,
				updatestartDate:"update Start date must be equal to or greater then today date"
			},
			update_to:{
				required:true,
				updateendDate:"update End date must be after start date"
			},
			update_leave_reason:{
				required:true,
			},
		},
		messages:{
			update_leave_type:{
				required:"Please select the leave day"
			},
			update_from:{
				required:"Please select from date",
				updatestartDate:'Please selected {0}'
			},
			update_to:{
				required:"Please select to date",
				updateendDate:'Please selected {0}'
			},
			update_leave_reason:{
				required:"Please select the leave reason",
			},
		},
	});
	
	
	$('#addtickets').validate({
		errorElement: 'div',
		errorClass: 'alert alert-danger',
		onkeyup: function(element) {
				   $(element).valid(); 
			},
		rules:{
			ticket_subject:{
				required:true,
			},
			assign_staff:{
				required:true,
			},
			client:{
				required:true,
			},
			priority:{
				required:true,
			},
			cc:{
				required:true,
			},
			description:{
				required:true,
			},
		},
		messages:{
			ticket_subject:{
				required:"Please enter the  ticket subject",
			},
			assign_staff:{
				required:"Please assign any one staff",
			},
			client:{
				required:"Please enter the client name",
			},
			priority:{
				required:"Please select anyone priority",
			},
			cc:{
				required:"Please enter the cc",
			},
			description:{
				required:"Please enter the ticket message",
			},
		},
		
	});
	
	$('#updateticket').validate({
		errorElement: 'div',
		errorClass: 'alert alert-danger',
		onkeyup: function(element) {
				   $(element).valid(); 
			},
		rules:{
			ticket_issue:{
				required:true,
			},
			assignstaff:{
				required:true,
			},
			clients:{
				required:true,
			},
			prioritys:{
				required:true,
			},
			ccs:{
				required:true,
			},
			descriptions:{
				required:true,
			},
		},
		messages:{
			ticket_issue:{
				required:"Please enter the ticket subject",
			},
			assignstaff:{
				required:"Please select the staff",
			},
			clients:{
				required:"Please enter the client name",
			},
			prioritys:{
				required:"Please select the prioritys",
			},
			ccs:{
				required:"Please select the ccs",
			},
			descriptions:{
				rrequired:"Please enter the message",
			},
		},
	});
	
	
	 //$('.punch-out').on('click', function(){
	$(document).on("click", ".punch-out", function(){	
		var id = $(this).val();
		var break_count = $(this).attr('placeholder'); 
		var activity_id = $(this).attr('name'); 
		$.ajax({
              url: "/attendance/public/punchout/"+id+"/"+break_count+"/"+activity_id,
              type: "GET",
              success: function(dataResult){           
					if(dataResult.status==200){
						 //location.reload();
						//console.log(dataResult);
						$('.section_load').load(' .section_load');
					}
					else if(dataResult.status==201){
						alert("Error occured !");
					}	 
              }
        });
		
		setTimeout(function () {
                var worktime = $('input.count_total_work').val();
				$.ajax({
						url: "/attendance/public/punchout_work/"+id+"/"+worktime,
						type: "GET",
						success: function(dataResult){  
							if(dataResult.status==200){
								console.log(dataResult);
								//location.reload();
								$('.section_load').load(' .section_load');	
							}
							else if(dataResult.status==201){
								alert("Error occured !");
							}	 
					    }
				});	
			}, 2000);
		
		
	 });
	 
	 
	
	//$('.punch-in').on('click', function(){
	$(document).on("click", ".punch-in", function(){
			var id = $(this).val();
			var work = $(this).attr('placeholder');
			$.ajax({
				'type':'GET',
				'url':'/attendance/public/punchin/'+id+"/"+work,
				success:function(response){	
					if(response.status==200){
						//location.reload();
						$('.section_load').load(' .section_load');
						$('.count-break').load(' .count-break');
					}
					else if(response.status==201){
						alert("Error occured !");
					}
				}
			});
			
		    setTimeout(function () {
                   var breaktime = $('input.count_total_break').val();
				   var punch_id = $('.punch_id').val();
					$.ajax({
							'type':'GET',
							'url':'/attendance/public/punchin_break/'+punch_id+"/"+breaktime,
							success:function(response){	
								if(response.status==200){
									//console.log(response);
									$('.section_load').load(' .section_load');
								}
								else if(response.status==201){
									alert("Error occured !");
								}
							}
						});
                }, 2000);	
	 });
	 
	
	
	 // Auto fill all employee attendance.
	 /*
	 window.addEventListener("load", function() {
		  setInterval(updateSubmitButton, 1000);
		}, false);

		function updateSubmitButton(){
			var currentTime = new Date();
			var hours 		= currentTime.getHours();
			var minutes 	= currentTime.getMinutes();
			var second 	    = currentTime.getSeconds();
		    if((hours === 11) && (minutes === 40) && (second === 00)){
				$.ajax({
					'type':'GET',
					'url':'/attendance/public/punchauto',
					success:function(response){	
						console.log(response);					
						if(response.status==200){
							//console.log('form submit success');
						}
						else if(response.status==201){
							//console.log('form submit success');
						}
					}
				});
			}
		}
	*/
	
	
	// Add new task from task board
	$('#addtaskvalid').validate();
	
	$(document).on('click','.editemployeetaskboard', function(){
		var emp_task_id = $(this).val();
		//alert(emp_task_id);
		$('#edit_task_modal').modal('show');
		$.ajax({
			type:'GET',
			url:'/attendance/public/editemployeetaskboard/'+emp_task_id,
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
	

/* start validation on Personal Information form */
jQuery.validator.addMethod("exactlength", function(value, element, param) {
 return this.optional(element) || value.length == param;
}, $.validator.format("Please enter exactly {0} characters."));

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
	
	$(document).ready(function(){
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
	
/* End */

/* Start form validate on Add Emergency Contact */
$("document").ready(function(){
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


	// add update form validation
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
			var i = $(".skill_name").length;
			$('.add_extra_field').append('<div class="remove_record"><h3 class="card-title">Education Informations</h3><a href="#" class="remove_more_education"><i class="fa fa-minus" aria-hidden="true"></i></a><div class="row"><div class="col-md-6"><div class="form-group"><label class="focus-label">Institution/Board/University <span class="text-danger">*</span></label><input type="text" class="form-control skill_name" name="institue['+i+']" id="institue"></div></div><div class="col-md-6"><div class="form-group"><label class="focus-label">Education <span class="text-danger">*</span></label><input type="text" class="form-control" name="education['+i+']" id="education"></div></div><div class="col-md-6"><div class="form-group"><label class="focus-label">Passing Year <span class="text-danger">*</span></label><input type="text" class="form-control" name="passing_year['+i+']" id="passing_year"></div></div><div class="col-md-6"><div class="form-group"><label class="focus-label">Marks Obtained <span class="text-danger">*</span></label><input type="text" class="form-control" name="marks_obtained['+i+']" id="marks_obtained"></div></div><div class="col-md-6"><div class="form-group"><label class="focus-label">Stream <span class="text-danger">*</span></label><input type="text" class="form-control" name="stream['+i+']" id="stream"></div></div><div class="col-md-6"><div class="form-group"><label class="focus-label">Grade <span class="text-danger">*</span></label><input type="text" class="form-control" name="grade['+i+']" id="grade"></div></div></div></div>'); 
		
			$("input[name='institue["+i+"]']").each(function () {
				$(this).rules("add", {
					required: true,
					messages: {
						required:"Please enter your Institution/Board/University name",
					}
				});
			});
			
			$("input[name='education["+i+"]']").each(function () {
				$(this).rules("add", {
					required: true,
					messages: {
						required:"Please enter your Education ",
					}
				});
			});
			
			$("input[name='passing_year["+i+"]']").each(function () {
				$(this).rules("add", {
					required: true,
					messages: {
						required:"Please enter your Passing Year",
					}
				});
			});
			
			$("input[name='marks_obtained["+i+"]']").each(function () {
				$(this).rules("add", {
					required: true,
					messages: {
						required:"Please enter your Marks Obtained",
					}
				});
			});
			
			$("input[name='stream["+i+"]']").each(function () {
				$(this).rules("add", {
					required: true,
					messages: {
						required:"Please enter your Stream",
					}
				});
			});
			
			$("input[name='grade["+i+"]']").each(function () {
				$(this).rules("add", {
					required: true,
					messages: {
						required:"Please enter your Grade",
					}
				});
			});
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
		var i = $(".experience_name").length;
		$('.add_more_field').append('<div class="record"><h3 class="card-title">Experience Informations</h3><a href="#" class="remove_more_experience"><i class="fa fa-minus" aria-hidden="true"></i></a><div class="row"><div class="col-md-6"><div class="form-group"><label class="focus-label">Company Name <span class="text-danger">*</span></label><input type="text" class="form-control experience_name" name="company_name['+i+']" id="company_name"></div></div><div class="col-md-6"><div class="form-group"><label class="focus-label">Job Position <span class="text-danger">*</span></label><input type="text" class="form-control" name="position['+i+']" id="position"></div></div><div class="col-md-6"><div class="form-group"><label class="focus-label">Add Experience <span class="text-danger">*</span></label><input type="text" class="form-control" name="add_experience['+i+']" id="add_experience"></div></div><div class="col-md-6"><div class="form-group"><label class="focus-label">Location <span class="text-danger">*</span></label><textarea class="form-control" name="location['+i+']" id="location" rows="2" cols="5"></textarea></div></div></div></div>');
	
		$("input[name='company_name["+i+"]']").each(function () {
			$(this).rules("add", {
				required: true,
				messages: {
					required:"Please enter your company name",
				}
			});
		});
		
		$("input[name='position["+i+"]']").each(function () {
			$(this).rules("add", {
				required: true,
				messages: {
					required:"Please enter your position",
				}
			});
		});
		$("input[name='add_experience["+i+"]']").each(function () {
			$(this).rules("add", {
				required: true,
				messages: {
					required:"Please enter your experience",
				}
			});
		});
		$("textarea[name='location["+i+"]']").each(function () {
			$(this).rules("add", {
				required: true,
				messages: {
					required:"Please enter your location",
				}
			});
		});
		
	});
	
	$(document).on('click', '.remove_more_experience', function() {
        $(this).closest('.record').remove();
    });
	
});


/* End Add Experience validation */


	$(document).ready(function(){
		setInterval(function() {
				$('.live_chate').load(' .live_chate');
			}, 5);
	});

</script>


