@extends('layouts._layout')

@section('content')
<div class="container-fluid">
	<div class="row" id="vue-1">
		
		<form action="{{route('character.store')}}" class="col-12 pad-t-15" method="POST">
			{{csrf_field()}}
			<div class="col-12 form-group">
				<label class="form-label" for="name">Character Name</label>
				<input v-model="$store.state.char.name" class="form-control form-input" type="text" name="name" />
			</div>

			<div class="col-offset-11 col-1">
				<input type="submit" value="Save" />
			</div>
		</form>
		
		<div class="tab-container col-12 pad-t-15">
			<v-tabcolumn :tabs="left_tabs"></v-tabcolumn>
			<v-tabcolumn :tabs="right_tabs"></v-tabcolumn>
		</div>
	</div>
	
	
</div>
<script>
	window.races = @json($races);
	window.skills = @json($skills);

</script>
@endsection
