@extends('layouts.admin')
@section('content')
               
	@if(session()->has('addasset'))
		<div class="alert alert-success">
			{{session()->get('addasset')}}
		</div>
	@endif	
	@if(session()->has('assetdelete'))
		<div class="alert alert-success">
			{{session()->get('assetdelete')}}
		</div>
	@endif		
	@if(session()->has('assetupdate'))
		<div class="alert alert-success">
			{{session()->get('assetupdate')}}
		</div>
	@endif	
			   <div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title">Assets</h3>
							<ul class="breadcrumb">
								<li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
								<li class="breadcrumb-item active">Assets</li>
							</ul>
						</div>
						<div class="col-auto float-right ml-auto">
							<a href="#" class="btn add-btn showassets" data-toggle="modal" data-target="#add_asset"><i class="fa fa-plus"></i> Add Asset</a>
						</div>
					</div>
				</div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div id="assetsTable_wrapper" class="dataTables_wrapper no-footer">
										
										<table class="table table-striped custom-table mb-0" id="assetsTable" role="grid" aria-describedby="assetsTable_info">
                                            <thead>
                                                <tr role="row">
													<th class="sorting" tabindex="0" aria-controls="assetsTable" rowspan="1" colspan="1" aria-label="Asset Name: activate to sort column ascending" style="width: 141.359px;">Asset Name</th>
													<th class="sorting" tabindex="0" aria-controls="assetsTable" rowspan="1" colspan="1" aria-label="Asset Id: activate to sort column ascending" style="width: 64.3594px;">Brand</th>
													<th class="sorting" tabindex="0" aria-controls="assetsTable" rowspan="1" colspan="1" aria-label="Purchase Date: activate to sort column ascending" style="width: 113.969px;">Condition</th>
													<th class="sorting" tabindex="0" aria-controls="assetsTable" rowspan="1" colspan="1" aria-label="Warrenty: activate to sort column ascending" style="width: 70.4688px;">Assign</th>
													<th class="sorting" tabindex="0" aria-controls="assetsTable" rowspan="1" colspan="1" aria-label="Warrenty End: activate to sort column ascending" style="width: 105.969px;">Assign Date</th>
													<th class="sorting" tabindex="0" aria-controls="assetsTable" rowspan="1" colspan="1" aria-label="Amount: activate to sort column ascending" style="width: 61.1562px;">Handover</th>
													<th class="text-right sorting" tabindex="0" aria-controls="assetsTable" rowspan="1" colspan="1" aria-label=": activate to sort column ascending" style="width: 15px;"></th>
												</tr>
                                            </thead>
                                            <tbody>
											
												@foreach($getallasset as $getallassets)
												<tr class="odd">
                                                    <td class="sorting_1">{{$getallassets->asset_name}}</td>
                                                    <td>{{$getallassets->brand}}</td>
                                                    <td>{{$getallassets->condition}}</td>
                                                    <td>{{$getallassets->assign_user}}</td>
                                                    <td>{{$getallassets->assign_date}}</td>
                                                    <td>{{$getallassets->handover}}</td>
                                                    <td class="text-right">
                                                        <div class="dropdown dropdown-action">
                                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu dropdown-menu-right" style="">
                                                                <!--<b class="dropdown-item" href="#" data-toggle="modal" data-target="#edit_asset"><i class="fa fa-pencil m-r-5"></i> Edit</a>-->
																<button class="dropdown-item editasset" value="{{$getallassets->id}}"><i class="fa fa-pencil m-r-5"></i> Edit</button>	
															   <a class="dropdown-item" href="{{route('assetdelete',$getallassets->id)}}" onclick="return confirm('Are you sure you want to permanently delete that asset?')"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
												@endforeach
												</tbody>
                                        </table></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
     
            <div id="add_asset" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Asset</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form method="post" action="{{route('addasset')}}" id="addasset">
							@csrf
							<div class="card">
								<div class="card-body">
									<h3 class="card-title">Asset</h3>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="focus-label">Asset Name <span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="asset_name[]" id="asset_name">
											</div>
											<span style="color:red"></span>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="focus-label">Brand<span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="brand[]" id="brand">
											</div>
											<span style="color:red"></span>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="focus-label">Condition <span class="text-danger">*</span></label>
												<input type="text" class="form-control" name="condition[]" id="condition">
											</div>
											<span style="color:red"></span>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="focus-label">Assign To <span class="text-danger">*</span></label>
												<select class="form-control" name="assign[]" id="assign_user">
													<option value="">--select--</option>
													@foreach($getallUser as $getallUsers)
														<option value="{{$getallUsers->name}} {{$getallUsers->last_name}}">{{$getallUsers->name}} {{$getallUsers->last_name}}</option>
													@endforeach
												</select>
											</div>
											<span style="color:red"></span>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="focus-label">Assign Date <span class="text-danger">*</span></label>
												<input type="date" class="form-control" name="assign_date[]" id="assign_date">
											</div>
											<span style="color:red"></span>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="focus-label">Handover Date(optional)</label>
												<input type="date" class="form-control" name="handover[]" id="handover">
											</div>
											<span style="color:red"></span>
										</div>
									</div>
									<div class="add_more_assetfield"></div>
									<a href="#" class="add_more_asset"><i class="fa fa-plus" aria-hidden="true"></i></a>
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
            </div>


            <div id="edit_asset" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Asset</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
							</button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{route('updateasset')}}" id="editasset">
                                @csrf
								<input type="hidden" name="edit_id" id="edit_id">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="focus-label">Asset Name <span class="text-danger">*</span></label>
													<input type="text" class="form-control" name="edit_asset_name" id="edit_asset_name">
												</div>
												<span style="color:red"></span>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="focus-label">Brand<span class="text-danger">*</span></label>
													<input type="text" class="form-control" name="edit_brand" id="edit_brand">
												</div>
												<span style="color:red"></span>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="focus-label">Condition <span class="text-danger">*</span></label>
													<input type="text" class="form-control" name="edit_condition" id="edit_condition">
												</div>
												<span style="color:red"></span>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="focus-label">Assign To <span class="text-danger">*</span></label>
													<select class="form-control" name="edit_assign" id="edit_assign">
														<option value="">--select--</option>
														@foreach($getallUser as $getallUsers)
															<option value="{{$getallUsers->name}} {{$getallUsers->last_name}}">{{$getallUsers->name}} {{$getallUsers->last_name}}</option>
														@endforeach
													</select>
												</div>
												<span style="color:red"></span>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="focus-label">Assign Date <span class="text-danger">*</span></label>
													<input type="date" class="form-control" name="edit_assign_date" id="edit_assign_date">
												</div>
												<span style="color:red"></span>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="focus-label">Handover Date(optional)</label>
													<input type="date" class="form-control" name="edit_handover" id="edit_handover">
												</div>
												<span style="color:red"></span>
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
                </div>
            </div>
@endsection