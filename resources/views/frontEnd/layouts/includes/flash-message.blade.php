<div class="flash-message">
	@if ($message = Session::get('success'))
	<div class="alert alert-success alert-block fadeoutalert">
		<button type="button" class="close" data-dismiss="alert">×</button>	
	       <span><i class="fas fa-check"></i></span> <strong>{{ $message }}</strong>
	</div>
	@endif

	@if ($message = Session::get('error'))
	<div class="alert alert-danger alert-block fadeoutalert">
		<button type="button" class="close" data-dismiss="alert">×</button>	
	         <span><i class="fas fa-times"></i></span><strong>{{ $message }}</strong>
	</div>
	@endif

	@if ($message = Session::get('warning'))
	<div class="alert alert-warning alert-block fadeoutalert">
		<button type="button" class="close" data-dismiss="alert">×</button>	
		<span><i class="fas fa-exclamation-triangle"></i></span><strong>{{ $message }}</strong>
	</div>
	@endif

	@if ($message = Session::get('info'))
	<div class="alert alert-info alert-block fadeoutalert">
		<button type="button" class="close" data-dismiss="alert">×</button>	
		<span><i class="fas fa-info"></i></span> <strong>{{ $message }}</strong>
	</div>

	@endif

	@if ($errors->any())

	<div class="alert alert-danger fadeoutalert">
		<button type="button" class="close" data-dismiss="alert">×</button>	
		<span><i class="far fa-frown"></i></span><strong>Please check the form below for errors</strong>
	</div>

	@endif
</div>