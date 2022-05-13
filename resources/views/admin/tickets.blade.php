@extends('layouts.admin')
@section('content')

		@if(session()->has('Open'))
			<div class="alert alert-success">
			{{session()->get('Open')}}
			</div>
		@endif	
		@if(session()->has('reopened'))
			<div class="alert alert-success">
			{{session()->get('reopened')}}
			</div>
		@endif	
		@if(session()->has('Onhold'))
			<div class="alert alert-success">
			{{session()->get('Onhold')}}
			</div>
		@endif	
		@if(session()->has('Closed'))
			<div class="alert alert-success">
			{{session()->get('Closed')}}
			</div>
		@endif	
		@if(session()->has('Inprogress'))
			<div class="alert alert-success">
			{{session()->get('Inprogress')}}
			</div>
		@endif	
		@if(session()->has('ticketdeclined'))
			<div class="alert alert-success">
			{{session()->get('ticketdeclined')}}
			</div>
		@endif	
				
				<div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Tickets</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Tickets</li>
                            </ul>
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
                                            <span class="d-block">Total Tickets</span>
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
                                        <div id="ticketTable_wrapper" class="dataTables_wrapper no-footer"><div class="dataTables_length" id="ticketTable_length"></div><div id="ticketTable_filter" class="dataTables_filter"></div>
										
										<table class="table table-striped custom-table mb-0" id="admintickets" role="grid" aria-describedby="ticketTable_info">
                                            <thead>
                                                <tr role="row"><th class="sorting" tabindex="0" aria-controls="ticketTable" rowspan="1" colspan="1" aria-label="Ticket Id: activate to sort column ascending" style="width: 67.3438px;">Ticket Id</th><th class="sorting" tabindex="0" aria-controls="ticketTable" rowspan="1" colspan="1" aria-label="Ticket Subject: activate to sort column ascending" style="width: 111.938px;">Subject</th><th class="sorting" tabindex="0" aria-controls="ticketTable" rowspan="1" colspan="1" aria-label="Assigned Staff: activate to sort column ascending" style="width: 159.797px;">Assigned To</th>
												
												<th class="sorting" tabindex="0" aria-controls="ticketTable" rowspan="1" colspan="1" aria-label="Assigned Staff: activate to sort column ascending" style="width: 159.797px;">Description</th>
												
												<th class="sorting" tabindex="0" aria-controls="ticketTable" rowspan="1" colspan="1" aria-label="Created Date: activate to sort column ascending" style="width: 120.688px;">Ticket Date</th><th class="sorting" tabindex="0" aria-controls="ticketTable" rowspan="1" colspan="1" aria-label="Last Reply: activate to sort column ascending" style="width: 112.625px;">Last Reply</th><th class="sorting" tabindex="0" aria-controls="ticketTable" rowspan="1" colspan="1" aria-label="Priority: activate to sort column ascending" style="width: 81px;">Priority</th><th class="text-center sorting" tabindex="0" aria-controls="ticketTable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 81px;">Status</th></tr>
                                            </thead>
												<tbody>
													@foreach($TicketsModel as $TicketsModels)
														<tr class="odd">
															<td class="ticket_id">{{$TicketsModels->id}}</td>
															<td>{{$TicketsModels->ticket_subject}}</td>
															<td>
																<h2 class="table-avatar">
																	<a href="#">{{$TicketsModels->name}} {{$TicketsModels->last_name}}</a>
																</h2>
															</td>
															<td>
																<button type="button" class="dropdown-item ticket-descri" value="{{$TicketsModels->id}}">{{Str::limit($TicketsModels->description, 8)}}</button>	
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
																		<a class="dropdown-item" href="{{route('adminticketopen',$TicketsModels->id)}}"><i class="fa fa-dot-circle-o text-info"></i> Open</a>
																		<a class="dropdown-item" href="{{route('adminreopened',$TicketsModels->id)}}"><i class="fa fa-dot-circle-o text-info"></i> Reopened</a>
																		<a class="dropdown-item" href="{{route('adminOnhold',$TicketsModels->id)}}"><i class="fa fa-dot-circle-o text-danger"></i> On Hold</a>
																		<a class="dropdown-item" href="{{route('adminClosed',$TicketsModels->id)}}"><i class="fa fa-dot-circle-o text-success"></i> Closed</a>
																		<a class="dropdown-item" href="{{route('adminInprogress',$TicketsModels->id)}}"><i class="fa fa-dot-circle-o text-success"></i> In Progress</a>
																		<a class="dropdown-item" href="{{route('adminticketdeclined',$TicketsModels->id)}}"><i class="fa fa-dot-circle-o text-danger"></i> Decline</a>
																	</div>
																</div>
															</td>														
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
				
				
	<div id="tickets_view" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Show Ticket</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<p class="ticketsall text-left">
					</p>
				</div>
			</div>
		</div>
	</div> 		
@endsection