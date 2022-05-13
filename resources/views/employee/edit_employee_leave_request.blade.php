@extends('employeelayouts.admin')
@section('content')
	<div class="cotainer">
		<div class="card p-5">
			<form method="post" action="{{route('update_employee_leave',$edit_leave_request->id)}}">
				@csrf	
			   <div class="form-group">
					<label>Leave Type <span class="text-danger">*</span></label>
					<select name="edit_leave_type" id="edit_leave_type" class="form-control">
						<option value="{{$edit_leave_request->leave_type}}">{{$edit_leave_request->leave_type}}</option>
						<option value="Full day">Full Day</option>
						<option value="Half day">Half Day</option>
						<option value="Short day">Short Day</option>
					</select>
					<span style="color:red;">{{$errors->first('leave_type')}}</span>
				</div>
				<div class="form-group full-Time">
					<label for="name">Select Time</label>
					<select name="time" id="time" class="form-control">	
						<option value="{{$edit_leave_request->time}}">{{$edit_leave_request->time}}</option>
						<option value="First Half">First Half</option>
						<option value="Second Half">Second Half</option>
					</select>	
				</div>
				<div class="form-group short-time">
					<label for="name">Time</label>
					<select name="leavetime" id="leavetime" class="form-control">	
						<option value="{{$edit_leave_request->time}}">{{$edit_leave_request->time}}</option>
						<option value="First Half">First Half</option>
						<option value="Second Half">Second Half</option>
						<option value="Third Half">Third Half</option>
						<option value="Fourth Half">Fourth Half</option>
					</select>	
				</div>
				
				<div class="form-group">
					<label>From <span class="text-danger">*</span></label>
					<input class="form-control" type="date" name="from" id="from" value="{{$edit_leave_request->from}}">
					<span style="color:red;">{{$errors->first('from')}}</span>
				</div>
				<div class="form-group">
					<label>To <span class="text-danger">*</span></label>
					<input class="form-control" type="date" name="to" id="to" value="{{$edit_leave_request->to}}">
					<span style="color:red;">{{$errors->first('to')}}</span>
				</div>
				
				<div class="form-group">
					<label>Number of days <span class="text-danger">*</span></label>
					<input class="form-control" readonly="" type="text" name="number_days" id="number_days" value="{{$edit_leave_request->number_days}}" />
				</div>
				<div class="form-group">
					<label>Remaining Leaves <span class="text-danger">*</span></label>
					<input class="form-control" readonly="" value="12" type="text" name="leave_remaining" id="leave_remaining">
					<span style="color:red;">{{$errors->first('leave_remaining')}}</span>
				</div>
				<div class="form-group">
					<label>Leave Reason <span class="text-danger">*</span></label>
					<textarea rows="4" class="form-control" name="leave_reason" id="leave_reason" >{{$edit_leave_request->leave_reason}}</textarea>
					<span style="color:red;">{{$errors->first('leave_reason')}}</span>
				</div>
				<div class="submit-section">
					<input type="submit" value="Submit" class="btn btn-primary">
				</div>
			</form>
		</div>
	</div>
@endsection				