@extends('layouts._layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<hr class="spacer small" />
		<form class="clearfix" action="{{route('character.store')}}" method="POST">
			{{csrf_field()}}
			<div class="col-xs-12 col-md-3 form-group">
				<label class="form-label" for="name">Character Name</label>
				<input class="form-control form-input" type="text" name="name" />
			</div>
			<div class="col-xs-offset-11 col-xs-1">
				<input type="submit" value="Save" />
			</div>
			<div class="col-xs-6">
				@include('character.partials._left')
			</div>
			<div id="vue-1" class="col-xs-6 right section">			
				@include('character.partials._right')
			</div>
		</form>
	</div>
	<hr class="spacer small" />
</div> 
<script>
	
	var name 				= '{{$character->name}}';
	@if(!is_null($character->race))
		var race 			= '{{$character->race->name}}';
	@else
		var race 			= '';
	@endif
	@if(!is_null($character->class))
		var char_class 		= '{{$character->class->name}}';
	@else
		var char_class 		= '';
	@endif
	var subrace 			= '{{$character->subrace}}';
	var strength 			= '{{$character->strength}}';
	var dexterity 			= '{{$character->dexterity}}';
	var constitution 		= '{{$character->constitution}}';
	var hp_max 				= '{{$character->hp_max}}';
	var hp_current 			= '{{$character->hp_current}}';
	var speed 				= '{{$character->speed()}}';
	var darkvision 			= '{{$character->darkvision}}';
	var passive_perception 	= '{{$character->passive_perception()}}';
	var ac 					= '{{$character->getArmorClass()}}';
	var speed 				= '{{$character->race->speed}}';
	var proficiency_bonus	= '{{$character->prof_bonus()}}';
	@if(is_null($character->race->darkvision))
		var darkvision 		= 'No';
	@else
		var darkvision 		= '{{$character->race->darkvision}}ft';
	@endif
	var saving_throws		= @json($character->getSavingThrows());
	var skills				= @json($character->getSkills());
	console.log(skills);
	
</script>  
@endsection