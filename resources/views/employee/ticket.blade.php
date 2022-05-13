@extends('employeelayouts.admin')
@section('content')
                @if(session()->has('message'))
					<div class="alert alert-success">
						{{ session()->get('message') }}
					</div>
				@endif
				
				@if(session()->has('delete'))
					<div class="alert alert-success">
						{{ session()->get('delete') }}
					</div>
				@endif
				<div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Tickets</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.html">Dashboard</a></li>
                                <li class="breadcrumb-item active">Tickets</li>
                            </ul>
                        </div>
                        <div class="col-auto float-right ml-auto">
                            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_ticket"><i class="fa fa-plus"></i> Add Ticket</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-group m-b-30">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div>
                                            <span class="d-block">All Tickets</span>
                                        </div>                        
                                    </div>
                                    <h3 class="mb-3">{{count($TicketsModel)}}</h3>
                                    <div class="progress mb-2" style="height: 5px;">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{count($TicketsModel)}}%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div>
                                            <span class="d-block">Solved Tickets</span>
                                        </div>
                                    </div>
                                    <h3 class="mb-3">{{$declined}}</h3>
                                    <div class="progress mb-2" style="height: 5px;">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{$declined}}%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div>
                                            <span class="d-block">Open Tickets</span>
                                        </div>
                                    </div>
                                    <h3 class="mb-3">{{$open}}</h3>
                                    <div class="progress mb-2" style="height: 5px;">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{$open}}%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-3">
                                        <div>
                                            <span class="d-block">Pending Tickets</span>
                                        </div>
                                    </div>
                                    <h3 class="mb-3">{{$Onhold}}</h3>
                                    <div class="progress mb-2" style="height: 5px;">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{$Onhold}}%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

             

                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div id="ticketTable_wrapper" class="dataTables_wrapper no-footer">
											<table class="table table-striped custom-table mb-0 datatable dataTable no-footer" id="total_tickets" role="grid" aria-describedby="ticketTable_info">
                                            <thead>
                                                <tr role="row text-center">
												<th class="sorting" tabindex="0" aria-controls="ticketTable" rowspan="1" colspan="1" aria-label="Ticket Id: activate to sort column ascending" style="width: 67.3438px;">Ticket Id</th>
												<th class="sorting" tabindex="0" aria-controls="ticketTable" rowspan="1" colspan="1" aria-label="Ticket Subject: activate to sort column ascending" style="width: 111.938px;">Subject</th>
												<th class="sorting" tabindex="0" aria-controls="ticketTable" rowspan="1" colspan="1" aria-label="Assigned Staff: activate to sort column ascending" style="width: 159.797px;">Assigned To</th>
												<th class="sorting" tabindex="0" aria-controls="ticketTable" rowspan="1" colspan="1" aria-label="Created Date: activate to sort column ascending" style="width: 120.688px;">Ticket Date</th>
												<th class="sorting" tabindex="0" aria-controls="ticketTable" rowspan="1" colspan="1" aria-label="Last Reply: activate to sort column ascending" style="width: 112.625px;">Last Update</th>
												<th class="sorting" tabindex="0" aria-controls="ticketTable" rowspan="1" colspan="1" aria-label="Priority: activate to sort column ascending" style="width: 81px;">Priority</th>
												<th class="text-center sorting" tabindex="0" aria-controls="ticketTable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 81px;">Status</th>
												<th class="text-right sorting" tabindex="0" aria-controls="ticketTable" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 60.2656px;">Actions</th></tr>
                                            </thead>
                                            <tbody>
												
												@foreach($TicketsModel as $key => $TicketsModels)
													
												<tr class="text-left">
                                                    <td class="text-center">{{$TicketsModels->id}}</td>
                                                    <td>{{$TicketsModels->ticket_subject}}</td>
                                                    <td>
                                                        <h2 class="table-avatar">
                                                            {{$TicketsModels->name}}  {{$TicketsModels->last_name}}
                                                        </h2>
                                                    </td>
                                                    <td>{{date_format($TicketsModels->created_at,'d M Y')}}</td>
                                                    <td>{{date_format($TicketsModels->updated_at,'d M Y')}}</td>
                                                    <td>
														@if($TicketsModels->priority=="High")
															<p class="p-hight">High</p>
														@elseif($TicketsModels->priority=="Medium")
															<p class="p-medium">Medium</p>
														@else
															<p class="p-low"> Low</p>
														@endif	
													</td>
                                                    <td class="text-center">
                                                            <!--<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">-->
																@if(($TicketsModels->assign_staff == auth()->user()->uid)||($TicketsModels->cc == auth()->user()->uid))	
																	<div class="dropdown action-label">
																	<a class="btn btn-white btn-sm btn-rounded dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false">
																		@if($TicketsModels->status=="Open")
																			<i class="fa fa-dot-circle-o text-info"></i>{{$TicketsModels->status}}
																		@elseif($TicketsModels->status=="Reopened")
																			<i class="fa fa-dot-circle-o text-info"></i> {{$TicketsModels->status}}
																		@elseif($TicketsModels->status=="On Hold")
																			<i class="fa fa-dot-circle-o text-danger"></i>
																			{{$TicketsModels->status}}
																		@elseif($TicketsModels->status=="Closed")
																			<i class="fa fa-dot-circle-o text-success"></i>
																			{{$TicketsModels->status}}
																		@elseif($TicketsModels->status=="In Progress")
																			<i class="fa fa-dot-circle-o text-success"></i>
																			{{$TicketsModels->status}}
																		@else
																			<i class="fa fa-dot-circle-o text-danger"></i>	
																			{{$TicketsModels->status}}
																		@endif
																	</a>
																	<div class="dropdown-menu dropdown-menu-right">
																		<a class="dropdown-item" href="{{route('ticketopen',$TicketsModels->id)}}"><i class="fa fa-dot-circle-o text-info"></i> Open</a>
																		<a class="dropdown-item" href="{{route('reopened',$TicketsModels->id)}}"><i class="fa fa-dot-circle-o text-info"></i> Reopened</a>
																		<a class="dropdown-item" href="{{route('Onhold',$TicketsModels->id)}}"><i class="fa fa-dot-circle-o text-danger"></i> On Hold</a>
																		<a class="dropdown-item" href="{{route('Closed',$TicketsModels->id)}}"><i class="fa fa-dot-circle-o text-success"></i> Closed</a>
																		<a class="dropdown-item" href="{{route('Inprogress',$TicketsModels->id)}}"><i class="fa fa-dot-circle-o text-success"></i> In Progress</a>
																		<a class="dropdown-item" href="{{route('ticketdeclined',$TicketsModels->id)}}"><i class="fa fa-dot-circle-o text-danger"></i> Decline</a>
																	</div>
																</div>
																@else
																	@if($TicketsModels->status=="Open")
																		<p class="st-open">{{$TicketsModels->status}}</p>
																	@elseif($TicketsModels->status=="Reopened")
																		<p class="st-reopent">{{$TicketsModels->status}}</p>
																	@elseif($TicketsModels->status=="On Hold")
																		<p class="st-hold">{{$TicketsModels->status}}</p>
																	@elseif($TicketsModels->status=="Closed")
																		<p class="st-close">{{$TicketsModels->status}}</p>
																	@elseif($TicketsModels->status=="In Progress")
																		<p class="st-progres">{{$TicketsModels->status}}</p>
																	@else
																		<p class="st-inpgress">{{$TicketsModels->status}}</p>
																	@endif
																@endif
                                                            <!--</a>-->
                                                    </td>
                                                    @if($TicketsModels->status=="Open")
														<td class="text-right">
															<div class="dropdown dropdown-action">
																<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
																<div class="dropdown-menu dropdown-menu-right">
																	<button type="button" class="dropdown-item edittickets" value="{{$TicketsModels->id}}"><i class="fa fa-pencil m-r-5"></i> Edit</button>
																	<a class="dropdown-item ticket-delete" href="{{route('ticketdestroy',$TicketsModels->id)}}" onclick="return confirm('Are you sure you want to permanently delete that ticket?')"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
																</div>
															</div>
														</td>
													@else	
														<td class="text-right">
															<div class="dropdown dropdown-action">
																<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
																<div class="dropdown-menu dropdown-menu-right">
																	<button type="button" class="dropdown-item viewtickets" value="{{$TicketsModels->id}}"><i class="fa fa-eye" aria-hidden="true"></i> view</button>
																</div>
															</div>
														</td>
													@endif
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
           

            <div id="add_ticket" class="modal custom-modal fade" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Ticket</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="addtickets" action="{{route('addticket')}}" enctype="multipart/form-data">
                                @csrf
								<div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Ticket Subject</label>
                                            <input class="form-control" type="text" name="ticket_subject" id="ticket_subject">
											<span style="color:red">{{$errors->first('ticket_subject')}}</span>
										</div>
                                    </div>
									<div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Priority</label>
                                            <select class="form-control" name="priority" id="priority">
                                                <option value="">--Select--</option>
                                                <option value="High">High</option>
                                                <option value="Medium">Medium</option>
                                                <option value="Low">Low</option>
                                            </select>
											<span style="color:red">{{$errors->first('priority')}}</span>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">                                  
                                    <!--<div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Client</label>
                                            <input type="text" class="form-control" name="client" id="client">									
											<span style="color:red">{{$errors->first('client')}}</span>
                                        </div>
                                    </div>-->
									<div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Assign Staff</label>
                                            <select class="form-control" name="assign_staff" id="assign_staff">
                                                <option value="">--Select--</option>
                                                @foreach($allstaff as $allstaffs)
													<option value="{{$allstaffs->uid}}">{{$allstaffs->name}} {{$allstaffs->last_name}}</option>
												@endforeach                                          
                                            </select>
											<span style="color:red">{{$errors->first('assign_staff')}}</span>
                                        </div>
                                    </div>
									<div class="col-sm-6">
                                        <div class="form-group">
                                            <label>CC</label>									
											<select class="form-control" name="cc" id="cc">
												<option value="">--Select--</option>
												@foreach($allstaff as $allstaffs)
													<option value="{{$allstaffs->uid}}">{{$allstaffs->name}} {{$allstaffs->last_name}}</option>
												@endforeach                                          
											</select>
											<span style="color:red">{{$errors->first('cc')}}</span>
                                        </div>
                                    </div>
                                </div>                                                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea class="form-control" name="description" id="description" rows="5" cols="10" placeholder="Enter the message here.."></textarea>
											<span style="color:red">{{$errors->first('description')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Upload Files</label>
                                            <input class="form-control" type="file" name="file" id="file">
											<span style="color:red">{{$errors->first('file')}}</span>
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

            <div id="edit_ticket" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Ticket</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="updateticket" action="{{route('updatetickets')}}" enctype="multipart/form-data">
                                @csrf
								<input type="hidden" name="update_id" id="update_id">
								<div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Ticket Subject</label>
                                            <input class="form-control" type="text" name="ticket_issue" id="ticket_issue">										
										</div>
                                    </div>
									<div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Priority</label>
                                            <select class="form-control" name="prioritys" id="prioritys">
                                                <option value="">-</option>
                                                <option value="High">High</option>
                                                <option value="Medium">Medium</option>
                                                <option value="Low">Low</option>
                                            </select>
											<span style="color:red">{{$errors->first('priority')}}</span>
                                        </div>
                                    </div>
                                   
                                </div>
                                <div class="row">                              
                                    <!--<div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Client</label>
                                            <input type="text" class="form-control" name="clients" id="clients">											
											<span style="color:red">{{$errors->first('client')}}</span>
                                        </div>
                                    </div>-->
									 <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Assign Staff</label>
                                            <select class="form-control" name="assignstaff" id="assignstaff">
                                                <option value="">-</option>
                                                 @foreach($allstaff as $allstaffs)
													<option value="{{$allstaffs->uid}}">{{$allstaffs->name}} {{$allstaffs->last_name}}</option>
												 @endforeach  
                                            </select>
											<span style="color:red">{{$errors->first('assign_staff')}}</span>
                                        </div>
                                    </div>
									<div class="col-sm-6">
                                        <div class="form-group">
                                            <label>CC</label>
											 <select class="form-control" name="ccs" id="ccs">
                                                <option value="">-</option>
                                                 @foreach($allstaff as $allstaffs)
													<option value="{{$allstaffs->uid}}">{{$allstaffs->name}} {{$allstaffs->last_name}}</option>
												 @endforeach  
                                            </select>						
											<span style="color:red">{{$errors->first('cc')}}</span>
                                        </div>
                                    </div>
                                </div>                                      
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea class="form-control" name="descriptions" id="descriptions" rows="5" cols="10"></textarea>
											<span style="color:red">{{$errors->first('description')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Upload Files (optional)</label>
                                            <input class="form-control" type="file" name="files" id="files">
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


			
			<div id="view_ticket" class="modal custom-modal fade" role="dialog">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">View Ticket</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="post" id="updateticket" action="#" enctype="multipart/form-data">
                                @csrf
								<!--<input type="hidden" name="update_id" id="update_id">-->
								<div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Ticket Subject</label>
                                            <input class="form-control" type="text" name="view_ticket_issue" id="view_ticket_issue">										
										</div>
                                    </div>
                                 
									<div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Priority</label>
                                            <select class="form-control" name="view_prioritys" id="view_prioritys">
                                                <option value="">-</option>
                                                <option value="High">High</option>
                                                <option value="Medium">Medium</option>
                                                <option value="Low">Low</option>
                                            </select>
											<span style="color:red">{{$errors->first('priority')}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">                              
                                    <!--<div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Client</label>
                                            <input type="text" class="form-control" name="clients" id="clients">											
											<span style="color:red">{{$errors->first('client')}}</span>
                                        </div>
                                    </div>-->
									<div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Assign Staff</label>
                                            <select class="form-control" name="view_assignstaff" id="view_assignstaff">
                                                <option value="">-</option>
                                                 @foreach($allstaff as $allstaffs)
													<option value="{{$allstaffs->name}} {{$allstaffs->last_name}}">{{$allstaffs->name}} {{$allstaffs->last_name}}</option>
												 @endforeach  
                                            </select>
											<span style="color:red">{{$errors->first('assign_staff')}}</span>
                                        </div>
                                    </div>
									<div class="col-sm-6">
                                        <div class="form-group">
                                            <label>CC</label>
											<input type="text" class="form-control" name="view_ccs" id="view_ccs">										
											<span style="color:red">{{$errors->first('cc')}}</span>
                                        </div>
                                    </div>
                                </div>
                                                   
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea class="form-control" name="view_descriptions" id="view_descriptions" rows="4" cols="10"></textarea>
											<span style="color:red">{{$errors->first('description')}}</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Upload Files (optional)</label>
                                            <input class="form-control" type="file" name="files" id="files">
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="submit-section">
                                    <button class="btn btn-primary submit-btn">Submit</button>
                                </div>-->
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
			
@endsection
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>-->