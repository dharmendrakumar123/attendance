@extends('employeelayouts.admin')
@section('content')
	<div class="chat-main-row">
		<div class="chat-main-wrapper">
			
			<div class="col-lg-5 message-view task-chat-view task-right-sidebar" id="task_window">
				<div class="chat-window">
					
					<div class="chat-contents task-chat-contents">
						<div class="chat-content-wrap">
							<div class="chat-wrap-inner">
								<div class="chat-box">
									<div class="chats">
										<h4>Hospital Administration Phase 1</h4>
										<div class="task-header">
											<div class="assignee-info">
												<a href="tasks.html#" data-toggle="modal" data-target="#assignee">
													<div class="assigned-info">
														<div class="task-head-title">Assigned To</div>
														<div class="task-assignee">John Doe</div>
													</div>
												</a>
											</div>
										</div>
										<hr class="task-line">
										
										<hr class="task-line">
										<div class="live_chate">
											@foreach($get_message as $get_messages)	
											<div class="task-information">
												<span class="task-info-line" style="font-size: 13px;">{{$get_messages->message}}</span>
											</div>
											@endforeach
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="chat-footer">
						<div class="message-bar">
							<div class="message-inner">
								<form action="{{route('emplsendchat')}}" method="post">
									@csrf
									<div class="message-area">	
										<div class="input-group">
											<textarea class="form-control" name="message" id="message" placeholder="Type message..." spellcheck="false"></textarea><grammarly-extension data-grammarly-shadow-root="true" style="position: absolute; top: 0px; left: 0px; pointer-events: none; z-index: 3;" class="cGcvT"></grammarly-extension><grammarly-extension data-grammarly-shadow-root="true" style="mix-blend-mode: darken; position: absolute; top: 0px; left: 0px; pointer-events: none; z-index: 3;" class="cGcvT"></grammarly-extension>
											<span class="input-group-append">
												<button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-send"></i></button>
											</span>
										</div>
									</div>
								</form>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection