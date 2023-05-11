@if(count($errors)>0)
<!-- list of errors in form -->

@foreach ($errors->all() as $error)
	<div class="alert alert-danger alert-dismissible fade show m-1">

		<strong>Внимание!!! </strong> {{$error}}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	    <span aria-hidden="true">&times;</span>
	  </button>
	</div>
@endforeach
@endif