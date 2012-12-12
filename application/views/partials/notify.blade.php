@if(Session::has('error') || Session::has('success'))
<div class="row-fluid">
	<div class="span12">
		@if(Session::has('error'))
			<div class="alert alert-error">
				<a href="#" class="close" data-dismiss="alert">×</a>
				{{ Session::get('error') }}
			</div>
		@endif

		@if(Session::has('success'))
			<div class="alert alert-success">
				<a href="#" class="close" data-dismiss="alert">×</a>
				{{ Session::get('success') }}
			</div>
		@endif
	</div>
</div>
@endif