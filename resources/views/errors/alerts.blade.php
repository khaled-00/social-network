
@if($errors->any())
<div class="container">
	<div class="row">
		<div class="col-md-12 alert alert-danger" role="alert">
		    <strong>Warning!</strong> 
		    @foreach($errors->all() as $error)
				<p>{{$error}}</p>
			@endforeach
		</div>
	</div>
</div>
@endif

@if(Session::has('flash_message'))
<div class="container">
	<div class="row">
		<div class="col-md-12 alert alert-success" role="alert">
			<strong>Well done!</strong> 
			<p>{{Session::get('flash_message')}}</p>
		</div>
	</div>
</div>
@endif

@if(Session::has('flash_error'))
<div class="container">
	<div class="row">
		<div class="col-md-12 alert alert-danger" role="alert">
			<strong>Warning!</strong> 
			<p>{{Session::get('flash_error')}}</p>
		</div>
	</div>
</div>
@endif
