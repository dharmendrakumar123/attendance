@extends('layouts.admin')
@section('content')
	
	<div class="content container-fluid">
		<div class="page-header">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="page-title">Attendance Reports</h3>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
						<li class="breadcrumb-item active">Attendance Reports</li>
					</ul>
				</div>
			</div>
		</div>


		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-striped custom-table mb-0 datatable dataTable no-footer" id="DataTables_Table_0">
						<thead>
							<tr>
								<th>#</th>
								<th>Date</th>
								<th>Clock In</th>
								<th>Clock Out</th>
								<th>Work Status</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>1 Jan 2020</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
							</tr>
							<tr>
								<td>2</td>
								<td>2 Jan 2020</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
							</tr>
							<tr>
								<td>3</td>
								<td>3 Jan 2020</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
							</tr>
							<tr>
								<td>4</td>
								<td>4 Jan 2020</td>
								<td colspan="3" class="text-danger text-center">Week Off</td>
							</tr>
							<tr>
								<td>5</td>
								<td>5 Jan 2020</td>
								<td colspan="3" class="text-danger text-center">Week Off</td>
							</tr>
							<tr>
								<td>6</td>
								<td>6 Jan 2020</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
      
@endsection