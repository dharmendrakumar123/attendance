@extends('layouts.admin')
@section('content')

	<div class="chat-main-row">
		<div class="chat-main-wrapper">
			<div class="col-lg-7 message-view task-view task-left-sidebar">
				<div class="row my-3 bg-light p-4">
					<div class="col-md-12">
						<form>
							<div class="form-group">
								<label>Select Project</label>
								<select class="form-control">
									<option>School Administration</option>
									<option>Project name</option>
									<option>Project nAme</option>
								</select>
							</div>
						</form>
					</div>
				</div>
				<div class="chat-window">
					<div class="fixed-header">
						<div class="navbar">
							<div class="float-left mr-auto">
								<div class="add-task-btn-wrapper">
									<span class="add-task-btn btn btn-white btn-sm">
										Add Task
									</span>
								</div>
							</div>
							<a class="task-chat profile-rightbar float-right" id="task_chat" href="#task_window"><i class="fa fa fa-comment"></i></a>
							<ul class="nav float-right custom-menu">
								<li class="nav-item dropdown dropdown-action">
									<a href="tasks.html" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-cog"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="javascript:void(0)">Pending Tasks</a>
										<a class="dropdown-item" href="javascript:void(0)">Completed Tasks</a>
										<a class="dropdown-item" href="javascript:void(0)">All Tasks</a>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="chat-contents">
						<div class="chat-content-wrap">
							<div class="chat-wrap-inner">
								<div class="chat-box">
									<div class="task-wrapper">
										<div class="task-list-container">
											<div class="task-list-body">
												<ul id="task-list">
													<li class="task">
														<div class="task-container">
															<span class="task-action-btn task-check">
																<span class="action-circle large complete-btn" title="Mark Complete">
																<i class="fa fa-check"></i>
															</span>
															</span>
															<span class="task-label" contenteditable="true">Patient appointment booking</span>
															<span class="task-action-btn task-btn-right">
																<span class="action-circle large" title="Assign">
																   <i class="fa fa-user-plus"></i>
																</span>
															<span class="action-circle large delete-btn" title="Delete Task">
																	<i class="fa fa-trash-o"></i>
																</span>
															</span>
														</div>
													</li>
													<li class="task">
														<div class="task-container">
															<span class="task-action-btn task-check">
																<span class="action-circle large complete-btn" title="Mark Complete">
																	<i class="fa fa-check"></i>
																</span>
															</span>
															<span class="task-label" contenteditable="true">Appointment booking with payment gateway</span>
															<span class="task-action-btn task-btn-right">
																<span class="action-circle large" title="Assign">
																	<i class="fa fa-user-plus"></i>
																</span>
															<span class="action-circle large delete-btn" title="Delete Task">
																<i class="fa fa-trash-o"></i>
															</span>
															</span>
														</div>
													</li>
													<li class="completed task">
														<div class="task-container">
															<span class="task-action-btn task-check">
																<span class="action-circle large complete-btn" title="Mark Complete">
																	<i class="fa fa-check"></i>
																</span>
															</span>
															<span class="task-label">Doctor available module</span>
															<span class="task-action-btn task-btn-right">
																<span class="action-circle large" title="Assign">
																	 <i class="fa fa-user-plus"></i>
																</span>
															<span class="action-circle large delete-btn" title="Delete Task">
																	<i class="fa fa-trash-o"></i>
																</span>
															</span>
														</div>
													</li>
													<li class="task">
														<div class="task-container">
															<span class="task-action-btn task-check">
																<span class="action-circle large complete-btn" title="Mark Complete">
																	<i class="fa fa-check"></i>
																</span>
															</span>
															<span class="task-label" contenteditable="true">Patient and Doctor video conferencing</span>
															<span class="task-action-btn task-btn-right">
																<span class="action-circle large" title="Assign">
																	<i class="fa fa-user-plus"></i>
																</span>
															<span class="action-circle large delete-btn" title="Delete Task">
																	<i class="fa fa-trash-o"></i>
																</span>
															</span>
														</div>
													</li>
													<li class="task">
														<div class="task-container">
															<span class="task-action-btn task-check">
																<span class="action-circle large complete-btn" title="Mark Complete">
																	 <i class="fa fa-check"></i>
																</span>
															</span>
															<span class="task-label" contenteditable="true">Private chat module</span>
															<span class="task-action-btn task-btn-right">
																<span class="action-circle large" title="Assign">
																	<i class="fa fa-user-plus"></i>
																</span>
															<span class="action-circle large delete-btn" title="Delete Task">
																<i class="fa fa-trash-o"></i>
															</span>
															</span>
														</div>
													</li>
													<li class="task">
														<div class="task-container">
															<span class="task-action-btn task-check">
																<span class="action-circle large complete-btn" title="Mark Complete">
																	<i class="fa fa-check"></i>
																</span>
															</span>
															<span class="task-label" contenteditable="true">Patient Profile add</span>
															<span class="task-action-btn task-btn-right">
																<span class="action-circle large" title="Assign">
																	<i class="fa fa-user-plus"></i>
																</span>
															<span class="action-circle large delete-btn" title="Delete Task">
																	<i class="fa fa-trash-o"></i>
																</span>
															</span>
														</div>
													</li>
												</ul>
											</div>
											<div class="task-list-footer">
												<div class="new-task-wrapper">
													<textarea id="new-task" placeholder="Enter new task here. . ."></textarea>
													<span class="error-message hidden">You need to enter a task first</span>
													<span class="add-new-task-btn btn" id="add-task">Add Task</span>
													<span class="btn" id="close-task-panel">Close</span>
												</div>
											</div>
										</div>
									</div>
									<div class="notification-popup hide">
										<p>
											<span class="task"></span>
											<span class="notification-text"></span>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5 message-view task-chat-view task-right-sidebar" id="task_window">
				<div class="chat-window">
					<div class="fixed-header">
						<div class="navbar">
							<div class="task-assign">
								<a class="task-complete-btn" id="task_complete" href="javascript:void(0);">
									<i class="fa fa-check"></i> Mark Complete
								</a>
							</div>
							<ul class="nav float-right custom-menu">
								<li class="dropdown dropdown-action">
									<a href="tasks.html" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="javascript:void(0)">Delete Task</a>
										<a class="dropdown-item" href="javascript:void(0)">Settings</a>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="chat-contents task-chat-contents">
						<div class="chat-content-wrap">
							<div class="chat-wrap-inner">
								<div class="chat-box">
									<div class="chats">
										<h4>Hospital Administration Phase 1</h4>
										<div class="task-header">
											<div class="assignee-info">
												<a href="tasks.html#" data-toggle="modal" data-target="#assignee">
													<div class="avatar">
														<img alt="" src="assets/images/avatar-02.jpg">
													</div>
													<div class="assigned-info">
														<div class="task-head-title">Assigned To</div>
														<div class="task-assignee">John Doe</div>
													</div>
												</a>
												<span class="remove-icon">
													<i class="fa fa-close"></i>
												</span>
											</div>
											<div class="task-due-date">
												<a href="tasks.html#" data-toggle="modal" data-target="#assignee">
													<div class="due-icon">
														<span>
															<i class="fa fa-calendar"></i>
														</span>
													</div>
													<div class="due-info">
														<div class="task-head-title">Due Date</div>
														<div class="due-date">Mar 26, 2019</div>
													</div>
												</a>
												<span class="remove-icon">
													<i class="fa fa-close"></i>
												</span>
											</div>
										</div>
										<hr class="task-line">
										<div class="task-desc">
											<div class="task-desc-icon">
												<i class="fa fa-list"></i>
											</div>
											<div class="task-textarea">
												<textarea class="form-control" placeholder="Description"></textarea>
											</div>
										</div>
										<hr class="task-line">
										<div class="task-information">
											<span class="task-info-line"><a class="task-user" href="tasks.html#">Lesley Grauer</a> <span class="task-info-subject">created task</span></span>
											<div class="task-time">Jan 20, 2019</div>
										</div>
										<div class="task-information">
											<span class="task-info-line"><a class="task-user" href="tasks.html#">Lesley Grauer</a> <span class="task-info-subject">added to Hospital Administration</span></span>
											<div class="task-time">Jan 20, 2019</div>
										</div>
										<div class="task-information">
											<span class="task-info-line"><a class="task-user" href="tasks.html#">Lesley Grauer</a> <span class="task-info-subject">assigned to John Doe</span></span>
											<div class="task-time">Jan 20, 2019</div>
										</div>
										<hr class="task-line">
										<div class="task-information">
											<span class="task-info-line"><a class="task-user" href="tasks.html#">John Doe</a> <span class="task-info-subject">changed the due date to Sep 28</span> </span>
											<div class="task-time">9:09pm</div>
										</div>
										<div class="task-information">
											<span class="task-info-line"><a class="task-user" href="tasks.html#">John Doe</a> <span class="task-info-subject">assigned to you</span></span>
											<div class="task-time">9:10pm</div>
										</div>
										<div class="chat chat-left">
											<div class="chat-avatar">
												<a href="https://smarthr.dreamguystech.com/light/profile.html" class="avatar">
													<img alt="" src="assets/images/avatar-02.jpg">
												</a>
											</div>
											<div class="chat-body">
												<div class="chat-bubble">
													<div class="chat-content">
														<span class="task-chat-user">John Doe</span> <span class="chat-time">8:35 am</span>
														<p>I'm just looking around.</p>
														<p>Will you tell me something about yourself? </p>
													</div>
												</div>
											</div>
										</div>
										<div class="completed-task-msg"><span class="task-success"><a href="tasks.html#">John Doe</a> completed this task.</span> <span class="task-time">Today at 9:27am</span></div>
										<div class="chat chat-left">
											<div class="chat-avatar">
												<a href="https://smarthr.dreamguystech.com/light/profile.html" class="avatar">
													<img alt="" src="assets/images/avatar-02.jpg">
												</a>
											</div>
											<div class="chat-body">
												<div class="chat-bubble">
													<div class="chat-content">
														<span class="task-chat-user">John Doe</span> <span class="file-attached">attached 3 files <i class="fa fa-paperclip"></i></span> <span class="chat-time">Feb 17, 2019 at 4:32am</span>
														<ul class="attach-list">
															<li><i class="fa fa-file"></i> <a href="tasks.html#">project_document.avi</a></li>
															<li><i class="fa fa-file"></i> <a href="tasks.html#">video_conferencing.psd</a></li>
															<li><i class="fa fa-file"></i> <a href="tasks.html#">landing_page.psd</a></li>
														</ul>
													</div>
												</div>
											</div>
										</div>
										<div class="chat chat-left">
											<div class="chat-avatar">
												<a href="https://smarthr.dreamguystech.com/light/profile.html" class="avatar">
													<img alt="" src="assets/images/avatar-16.jpg">
												</a>
											</div>
											<div class="chat-body">
												<div class="chat-bubble">
													<div class="chat-content">
														<span class="task-chat-user">Jeffery Lalor</span> <span class="file-attached">attached file <i class="fa fa-paperclip"></i></span> <span class="chat-time">Yesterday at 9:16pm</span>
														<ul class="attach-list">
															<li class="pdf-file"><i class="fa fa-file-pdf-o"></i> <a href="tasks.html#">Document_2016.pdf</a></li>
														</ul>
													</div>
												</div>
											</div>
										</div>
										<div class="chat chat-left">
											<div class="chat-avatar">
												<a href="https://smarthr.dreamguystech.com/light/profile.html" class="avatar">
													<img alt="" src="assets/images/avatar-16.jpg">
												</a>
											</div>
											<div class="chat-body">
												<div class="chat-bubble">
													<div class="chat-content">
														<span class="task-chat-user">Jeffery Lalor</span> <span class="file-attached">attached file <i class="fa fa-paperclip"></i></span> <span class="chat-time">Today at 12:42pm</span>
														<ul class="attach-list">
															<li class="img-file">
																<div class="attach-img-download"><a href="tasks.html#">avatar-1.jpg</a></div>
																<div class="task-attach-img"><img src="assets/images/user.jpg" alt=""></div>
															</li>
														</ul>
													</div>
												</div>
											</div>
										</div>
										<div class="task-information">
											<span class="task-info-line">
											<a class="task-user" href="tasks.html#">John Doe</a>
											<span class="task-info-subject">marked task as incomplete</span>
											</span>
											<div class="task-time">1:16pm</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="chat-footer">
						<div class="message-bar">
							<div class="message-inner">
								<a class="link attach-icon" href="tasks.html#"><img src="assets/images/attachment.png" alt=""></a>
								<div class="message-area">
									<div class="input-group">
										<textarea class="form-control" placeholder="Type message..."></textarea>
										<span class="input-group-append">
										<button class="btn btn-primary" type="button"><i class="fa fa-send"></i></button>
										</span>
									</div>
								</div>
							</div>
						</div>
						<div class="project-members task-followers">
							<span class="followers-title">Followers</span>
							<a class="avatar" href="tasks.html#" data-toggle="tooltip" title="" data-original-title="Jeffery Lalor">
								<img alt="" src="assets/images/avatar-16.jpg">
							</a>
							<a class="avatar" href="tasks.html#" data-toggle="tooltip" title="" data-original-title="Richard Miles">
								<img alt="" src="assets/images/avatar-09.jpg">
							</a>
							<a class="avatar" href="tasks.html#" data-toggle="tooltip" title="" data-original-title="John Smith">
								<img alt="" src="assets/images/avatar-10.jpg">
							</a>
							<a class="avatar" href="tasks.html#" data-toggle="tooltip" title="" data-original-title="Mike Litorus">
								<img alt="" src="assets/images/avatar-05.jpg">
							</a>
							<a href="tasks.html#" class="followers-add" data-toggle="modal" data-target="#task_followers"><i class="fa fa-plus"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	<div id="assignee" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Assign to this task</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="input-group m-b-30">
						<input placeholder="Search to add" class="form-control search-input" type="text">
						<span class="input-group-append">
						<button class="btn btn-primary">Search</button>
						</span>
					</div>
					<div>
						<ul class="chat-user-list">
							<li>
								<a href="tasks.html#">
									<div class="media">
										<span class="avatar"><img alt="" src="assets/images/avatar-09.jpg"></span>
										<div class="media-body align-self-center text-nowrap">
											<div class="user-name">Richard Miles</div>
											<span class="designation">Web Developer</span>
										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="tasks.html#">
									<div class="media">
										<span class="avatar"><img alt="" src="assets/images/avatar-10.jpg"></span>
										<div class="media-body align-self-center text-nowrap">
											<div class="user-name">John Smith</div>
											<span class="designation">Android Developer</span>
										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="tasks.html#">
									<div class="media">
										<span class="avatar">
										<img alt="" src="assets/images/avatar-16.jpg">
										</span>
										<div class="media-body align-self-center text-nowrap">
											<div class="user-name">Jeffery Lalor</div>
											<span class="designation">Team Leader</span>
										</div>
									</div>
								</a>
							</li>
						</ul>
					</div>
					<div class="submit-section">
						<button class="btn btn-primary submit-btn">Assign</button>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div id="task_followers" class="modal custom-modal fade" role="dialog">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Add followers to this task</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="input-group m-b-30">
						<input placeholder="Search to add" class="form-control search-input" type="text">
						<span class="input-group-append">
						<button class="btn btn-primary">Search</button>
						</span>
					</div>
					<div>
						<ul class="chat-user-list">
							<li>
								<a href="tasks.html#">
									<div class="media">
										<span class="avatar"><img alt="" src="assets/images/avatar-16.jpg"></span>
										<div class="media-body media-middle text-nowrap">
											<div class="user-name">Jeffery Lalor</div>
											<span class="designation">Team Leader</span>
										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="tasks.html#">
									<div class="media">
										<span class="avatar"><img alt="" src="assets/images/avatar-08.jpg"></span>
										<div class="media-body media-middle text-nowrap">
											<div class="user-name">Catherine Manseau</div>
											<span class="designation">Android Developer</span>
										</div>
									</div>
								</a>
							</li>
							<li>
								<a href="tasks.html#">
									<div class="media">
										<span class="avatar"><img alt="" src="assets/images/avatar-26.jpg"></span>
										<div class="media-body media-middle text-nowrap">
											<div class="user-name">Wilmer Deluna</div>
											<span class="designation">Team Leader</span>
										</div>
									</div>
								</a>
							</li>
						</ul>
					</div>
					<div class="submit-section">
						<button class="btn btn-primary submit-btn">Add to Follow</button>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection