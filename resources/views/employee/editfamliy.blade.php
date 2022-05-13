@extends('employeelayouts.admin')
@section('content')
	<div class="container">
		<div class="card p-5">
			<form method="post" action="{{route('updatefamilymember',$editfamliy->id)}}">
				@csrf
				<div class="form-scroll">
					<div class="card">
						<div class="card-body">
							<h3 class="card-title">Family Member </h3>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Name <span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="name" id="name" value="{{$editfamliy->name}}">
										<span style="color:red">{{$errors->first('name')}}</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Relationship <span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="relation" id="relation" value="{{$editfamliy->relation}}">
										<span style="color:red">{{$errors->first('relation')}}</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Date of birth <span class="text-danger">*</span></label>
										<input class="form-control" type="date" name="date_birth" id="date_birth" value="{{$editfamliy->date_birth}}">
										<span style="color:red">{{$errors->first('date_birth')}}</span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Phone <span class="text-danger">*</span></label>
										<input class="form-control" type="text" name="phone" id="phone" value="{{$editfamliy->phone}}">
										<span style="color:red">{{$errors->first('phone')}}</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="submit-section">
					<button class="btn btn-primary submit-btn">Submit</button>
				</div>
			</form>
		</div>
	</div>
@endsection