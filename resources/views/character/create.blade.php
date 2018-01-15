@extends('layouts._layout')

@section('content')
<div class="container-fluid">
	<div class="row" id="vue-1">
		<hr class="spacer small" />
		<form class="clearfix" action="{{route('character.store')}}" method="POST">
			{{csrf_field()}}
			<div class="col-xs-12 col-md-3 form-group">
				<label class="form-label" for="name">Character Name</label>
				<input v-model="name" class="form-control form-input" type="text" name="name" />
			</div>
			<div id="character-inputs">
				<input name="name" :value="name" />
				<input name="race" :value="race" />
				<input name="subrace" :value="subrace" />
				<input name="class" :value="char_class" />
				<input name="strength" :value="ability_scores.strength" />
				<input name="hp_max" :value="hp_max" />
				<input name="hp_current" :value="hp_current" />
				<input name="speed" :value="speed" />
				<input name="darkvision" :value="darkvision" />
				<input name="passive_perception" :value="passive_perception" />
				<input name="ac" :value="ac" />
				<input name="proficiency_bonus" :value="proficiency_bonus" />
				<input v-for="(value, index) in ability_scores" data-type="ability-score" :name="value.full_name | lowercase" :value="ability_scores[index].amount" />
			</div>
			<div class="col-xs-offset-11 col-xs-1">
				<input type="submit" value="Save" />
			</div>			
		</form>
		<div class="col-xs-6">
			@include('character.partials._left')
		</div>
		<div class="col-xs-6 right section">			
			@include('character.partials._right')
		</div>
	</div>
	<hr class="spacer small" />
</div> 
<script>	
	var name 				= '{{$character->name}}';
	var race 				= '{{$character->race->name}}';
	var char_class 			= '{{$character->char_class->name}}';
	var hp_max 				= '{{$character->hp_max}}';
	var hp_current 			= '{{$character->hp_current}}';
	var speed 				= '{{$character->speed()}}';
	var passive_perception 	= '{{$character->passive_perception()}}';
	var ac 					= '{{$character->getArmorClass()}}';
	var proficiency_bonus	= '{{$character->prof_bonus()}}';
	@if(is_null($character->race->darkvision))
		var darkvision 		= 'No';
	@else
		var darkvision 		= '{{$character->race->darkvision}}ft';
	@endif
	var saving_throws		= @json($character->getSavingThrows());
	var skills				= @json($character->getSkills());
	var ability_scores		= @json($character->getAbilityScores());
	
	
</script>  
@endsection