@extends('layouts.admin')
@section('content')

	@if(session()->has('addsalary'))
		<div class="alert alert-success">
		{{session()->get('addsalary')}}
		</div>
	@endif	
	<div class="content container-fluid">
		<div class="page-header">
			<div class="row align-items-center">
				<div class="col">
					<h3 class="page-title">Employee Salary</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
						<li class="breadcrumb-item active">Salary</li>
					</ul>
				</div>
				<div class="col-auto float-right ml-auto">
					<a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_salary"><i class="fa fa-plus"></i> Add Salary</a>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
						<div class="row">
							<div class="col-sm-12">
								<div id="employeeSalary_wrapper" class="dataTables_wrapper no-footer">
								
									<table class="table table-striped custom-table" id="employeeSalary" role="grid" aria-describedby="employeeSalary_info">
										<thead>
											<tr role="row">
												<th class="sorting sorting_asc" tabindex="0" aria-controls="employeeSalary" rowspan="1" colspan="1" aria-label="Employee: activate to sort column descending" style="width: 153.75px;" aria-sort="ascending">Employee</th>
												<th class="sorting" tabindex="0" aria-controls="employeeSalary" rowspan="1" colspan="1" aria-label="Employee ID: activate to sort column ascending" style="width: 98.2812px;">Employee ID</th>
												<th class="sorting" tabindex="0" aria-controls="employeeSalary" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 218.859px;">Email</th>
												<th class="sorting" tabindex="0" aria-controls="employeeSalary" rowspan="1" colspan="1" aria-label="Join Date: activate to sort column ascending" style="width: 74.2656px;">Join Date</th>
												<th class="sorting" tabindex="0" aria-controls="employeeSalary" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 141.25px;">Role</th>
												<th class="sorting" tabindex="0" aria-controls="employeeSalary" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 49.5469px;">Salary</th>
												<th class="sorting" tabindex="0" aria-controls="employeeSalary" rowspan="1" colspan="1" aria-label="Payslip: activate to sort column ascending" style="width: 89.9844px;">Payslip</th>
											</tr>
										</thead>
										<tbody>
											@foreach($showallsalay as $showallsalays)
												<tr class="odd">
													<td class="sorting_1">
														<h2 class="table-avatar">
															<a class="avatar"><img src="{{asset('images')}}/{{$showallsalays->profile_pic}}" alt=""></a>
															<a>{{$showallsalays->name}} {{$showallsalays->last_name}} <span>{{$showallsalays->designation}}</span></a>
														</h2>
													</td>
													<td>{{$showallsalays->uid}}</td>
													<td>{{$showallsalays->email}}</td>
													<td>{{$showallsalays->joining_date}}</td>
													<td>
														{{$showallsalays->designation}}
													</td>
													<td>{{$showallsalays->net_salary}}</td>
													<td><a class="btn btn-sm btn-primary" href="{{route('generateslip',[$showallsalays->staff_name, $showallsalays->id])}}"  target="_blank">Generate Slip</a></td>
													<!--<td class="text-right">
														<div class="dropdown dropdown-action">
															<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
															<div class="dropdown-menu dropdown-menu-right">
																<a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_salary"><i class="fa fa-pencil m-r-5"></i> Edit</a>
																<a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_salary"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
															</div>
														</div>
													</td>-->
												</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div id="add_salary" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add Staff Salary</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{route('addemployeesalary')}}" method="post" id="addsalary">
						@csrf
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Select Staff</label>
									<select class="form-control" name="staff_name" id="staff_name" required>
										<option value="">----</option>
										@foreach($showalluser as $showallusers)
											<option value="{{$showallusers->uid}}">{{$showallusers->name}} {{$showallusers->last_name}}</option>
										@endforeach
									</select>
									<span class="text-danger">{{$errors->first('staff_name')}}</span>
								</div>
							</div>
							<div class="col-sm-6">
								<label>Total Salary</label>
								<input class="form-control" type="text" name="net_salary" id="net_salary" required>
								<span class="text-danger">{{$errors->first('net_salary')}}</span>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label>Total leave</label>
								<input class="form-control" type="text" name="Total_leave" id="Total_leave" required>
								<span class="text-danger">{{$errors->first('Total_leave')}}</span>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Basic amount</label>
									<input type="text" class="form-control" name="basic_amount" id="basic_amount" required>
									<span class="text-danger">{{$errors->first('basic_amount')}}</span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label>HRA</label>
								<input class="form-control" type="text" name="HRA" id="HRA" required>
								<span class="text-danger">{{$errors->first('HRA')}}</span>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>RA</label>
									<input type="text" class="form-control" name="RA" id="RA" required>
									<span class="text-danger">{{$errors->first('RA')}}</span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<label>Transport</label>
								<input class="form-control" type="text" name="Transport" id="Transport" required>
								<span class="text-danger">{{$errors->first('Transport')}}</span>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label>Other Allowances</label>
									<input type="text" class="form-control" name="OA" id="OA" required>
									<span class="text-danger">{{$errors->first('OA')}}</span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Total</label>
									<input type="text" class="form-control" name="total" id="total" required>
									<span class="text-danger">{{$errors->first('total')}}</span>
								</div>
							</div>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	

	<div id="edit_salary" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered modal-md" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Edit Staff Salary</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label>Select Staff</label>
									<select class="form-control">
										<option>John Doe</option>
										<option>Richard Miles</option>
									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<label>Net Salary</label>
								<input class="form-control" type="text" value="$4000">
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<h4 class="text-primary">Earnings</h4>
								<div class="form-group">
									<label>Basic</label>
									<input class="form-control" type="text" value="$6500">
								</div>
								<div class="form-group">
									<label>DA(40%)</label>
									<input class="form-control" type="text" value="$2000">
								</div>
								<div class="form-group">
									<label>HRA(15%)</label>
									<input class="form-control" type="text" value="$700">
								</div>
								<div class="form-group">
									<label>Conveyance</label>
									<input class="form-control" type="text" value="$70">
								</div>
								<div class="form-group">
									<label>Allowance</label>
									<input class="form-control" type="text" value="$30">
								</div>
								<div class="form-group">
									<label>Medical Allowance</label>
									<input class="form-control" type="text" value="$20">
								</div>
								<div class="form-group">
									<label>Others</label>
									<input class="form-control" type="text">
								</div>
							</div>
							<div class="col-sm-6">
								<h4 class="text-primary">Deductions</h4>
								<div class="form-group">
									<label>TDS</label>
									<input class="form-control" type="text" value="$300">
								</div>
								<div class="form-group">
									<label>ESI</label>
									<input class="form-control" type="text" value="$20">
								</div>
								<div class="form-group">
									<label>PF</label>
									<input class="form-control" type="text" value="$20">
								</div>
								<div class="form-group">
									<label>Leave</label>
									<input class="form-control" type="text" value="$250">
								</div>
								<div class="form-group">
									<label>Prof. Tax</label>
									<input class="form-control" type="text" value="$110">
								</div>
								<div class="form-group">
									<label>Labour Welfare</label>
									<input class="form-control" type="text" value="$10">
								</div>
								<div class="form-group">
									<label>Fund</label>
									<input class="form-control" type="text" value="$40">
								</div>
								<div class="form-group">
									<label>Others</label>
									<input class="form-control" type="text" value="$15">
								</div>
							</div>
						</div>
						<div class="submit-section">
							<button class="btn btn-primary submit-btn">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>	
<script>
		$(document).ready(function(){
			$('input#net_salary,input#Total_leave').bind('blur',function(){ 
				var get_net_salary  =  $('input#net_salary').val();
				var total_leave =  $('input#Total_leave').val();
				var one_day_salay = get_net_salary/30;
				var leave_amount = one_day_salay * total_leave;
				var get_salary = get_net_salary - leave_amount;
				var basic_salary = get_salary * 0.6;
				$('input#basic_amount').val(basic_salary.toFixed());
				var net_balance = get_salary - basic_salary;
				var HRA = net_balance * 0.63;
				var RA = net_balance * 0.15;
				var TA = net_balance * 0.12;
				var OA = net_balance * 0.1;
				var count_total = basic_salary + HRA + RA + TA + OA;
				$('input#HRA').val(HRA.toFixed());
				$('input#RA').val(RA.toFixed());
				$('input#Transport').val(TA.toFixed());
				$('input#OA').val(OA.toFixed());
				$('input#total').val(count_total.toFixed());
			});	
		});
</script>	
	
@endsection