@extends('layouts._layout')

@section('content')
<div class="container-fluid">
	<div class="row" id="vue-2"></div>
	<div class="row" id="vue-1">
		<hr class="spacer small" />
		<form class="clearfix" action="{{route('character.store')}}" method="POST">
			{{csrf_field()}}
			<div class="col-xs-12 col-md-3 form-group">
				<label class="form-label" for="name">Character Name</label>
				<!-- <input v-model="character.name" class="form-control form-input" type="text" name="name" /> -->
			</div>

			<div class="col-xs-offset-11 col-xs-1">
				<input type="submit" value="Save" />
			</div>
		</form>
		<div class="col-xs-6">
			
		</div>
		<div class="col-xs-6 right section">
			
		</div>
		
	</div>
	<hr class="spacer small" />
	
</div>
<script>

	

</script>
@endsection
