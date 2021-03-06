@extends('layouts.admin-template')
@section('title')
	@lang("User Roles")
@endsection

@section('content')
	<div class="row">
		@include('admin.settings-menu')

		<div class="col-sm-9">
			<ul class="nav nav-tabs nav-fill" role="tablist">
				<li class="nav-item" role="presentation">
					<a class="nav-link active show" href="#roles" aria-controls="home" role="tab" data-toggle="tab"
					   aria-selected="true">
						<em class="fa fa-key fa-fw"></em>Roles</a>
				</li>
				<li class="nav-item" role="presentation">
					<a class="nav-link" href="#notes" aria-controls="profile" role="tab" data-toggle="tab"
					   aria-selected="false">
						<em class="fa fa-clipboard fa-fw"></em>Notes</a>
				</li>
			</ul>
			<div class="tab-content p-0">
				<div class="tab-pane active show" id="roles" role="tabpanel">
					<br/>
					<div class="row">
						<div class="col-sm-4">
							<div class="card card-default">
								<div class="card-body">
									<div class="">
										<strong>@lang("Roles")</strong>
										<a href="#" data-toggle="tooltip" title="Add a role"
										   class="pull-right create-role-btn"><i class="fa fa-plus"></i></a>
									</div>
									<div id="roles">
										<input class="search form-control input-sm" placeholder="Search"/><br/>
										<i>@lang("double a role click to edit")</i>
										<ul class="list dd-list">
											@foreach($roles as $role)
												<li class="dd-item" id="{{$role->id}}" data-toggle="tooltip"
													title="{{$role->desc}}">
													<a href="#" class="role" id="{{$role->id}}">
														{{ucwords($role->display_name)}}
														<span class="pull-right"><i class="fa fa-chevron-right"
																					style="opacity: 0.2;"></i> </span>
													</a>
												</li>
											@endforeach
										</ul>
										<ul class="pagination"></ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="card card-default">
								<div class="card-body">
									@lang("Modules")
									<a href="#" data-toggle="tooltip" title="Register a module"
									   class="pull-right register-module-btn"><i
												class="fa fa-plus"></i></a>

									<div id="modules">

									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="card card-default">
								<div class="card-body">
									<strong>@lang("Permissions")</strong><br/>
									<div id="permissions">

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane" id="notes" role="tabpanel">
					<div class="card card-default mb-12">
						<div class="card-body">
							@lang("When you create new modules, add them here and assign permissions. For example if module is")
							<code>@lang("users")</code>, @lang("then permissions are generated as")
							<code>@lang("create-users")</code>
							<code>@lang("read-users")</code>
							<code>@lang("update-users")</code>
							<code>@lang("delete-users")</code>.
							@lang("In your module code, you can define access using")
							<div class="row">
								<div class="col-sm-5">
									<code>
										if(\Trust::can('create-users')<br/>
										&nbsp; &nbsp; &nbsp;---your code here---<br/>
										&nbsp;endif
									</code>
								</div>
								<div class="col-sm-2">or</div>
								<div class="col-sm-5">
									<code>
										&commat;if(permission('create-users')<br/>
										&nbsp; &nbsp; &nbsp;---your code here---<br/>
										&nbsp;&commat;endif
									</code>
								</div>
							</div>

							<p>
								@lang("Default modules")<br/>
								<code>@lang("users")</code><br/>
								<code>@lang("gifts")</code><br/>
								<code>@lang("ministries")</code><br/>
								<code>@lang("sermons")</code><br/>
								<code>@lang("events")</code><br/>
								<code>@lang("birthdays")</code><br/>
								<code>@lang("tickets")</code><br/>
								<code>@lang("mail")</code><br/>
								<code>@lang("blog")</code><br/>
								<code>@lang("logs")</code><br/>
								<code>@lang("settings")</code>
							</p>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>
@endsection
@push('scripts')
	<script src="/plugins/listjs/listjs.min.js"></script>
	<script src="/js/roles.js"></script>
@endpush

@push('modals')

	<div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel"><i class="fa fa-plus-circle"></i> @lang("New Role")
					</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>

				</div>
				{!! Form::open(['url'=>'/roles']) !!}
				<div class="modal-body">
					<label>@lang("Name")<i class="small">@lang("(no spaces or special characters)")</i></label>
					{!! Form::text('name',null,['class'=>'form-control']) !!}
					<label>@lang("Display name")</label>
					{!! Form::text('display_name',null,['class'=>'form-control']) !!}
					<label>@lang("Description")</label>
					{!! Form::textarea('description',null,['rows'=>2,'class'=>'form-control']) !!}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-inverse" data-dismiss="modal">Close</button>
					<button class="btn btn-primary">@lang("Submit")</button>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>


	<div class="modal fade" id="modulesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">@lang("New Module")</h4>

					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
								aria-hidden="true">&times;</span>
					</button>
				</div>
				{!! Form::open(['url'=>route('modules.store'),'method'=>'post']) !!}
				<div class="modal-body">
					<label>Name<i class="small">(no spaces or special characters)</i></label>
					{!! Form::text('name',null,['required'=>'required','class'=>'form-control']) !!}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-inverse" data-dismiss="modal">Close</button>
					<button class="btn btn-primary">@lang("Submit")</button>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
@endpush