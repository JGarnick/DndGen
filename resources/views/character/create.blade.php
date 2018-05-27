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
				<input v-model="name" class="form-control form-input" type="text" name="name" />
			</div>

			<div class="" id="character-inputs">
				<label>Level</label>
				<input name="level" :value="level" />
				<label>Name</label>
				<input name="name" :value="name" />
				<label>Race</label>
				<input name="race" :value="race" />
				<label>Subrace</label>
				<input name="subrace" :value="subrace" />
				<label>Class</label>
				<input name="class" :value="char_class" />
				<label>HP Max</label>
				<input name="hp_max" :value="hp_max" />
				<label>HP Current</label>
				<input name="hp_current" :value="hp_current" />
				<label>Speed</label>
				<input name="speed" :value="speed" />
				<label>Darkvision</label>
				<input name="darkvision" :value="darkvision" />
				<label>Passive Perception</label>
				<input name="passive_perception" :value="passive_perception" />
				<label>AC</label>
				<input name="ac" :value="ac" />
				<label>Prof Bonus</label>
				<input name="proficiency_bonus" :value="proficiency_bonus" />
				<span v-for="(value, index) in ability_scores">
					<label>@{{value.abbr}}</label>
					<input data-type="ability-score" :name="value.full_name | lowercase" :value="ability_scores[index].amount" />
				</span>
				<span v-for="(value, index) in skills" >
					<label>@{{value.name}}</label>
					<input data-type="skill" :name="value.name" :value="skills[index].total"/>
				</span>
				<span v-for="(value, index) in saving_throws" >
					<label>@{{value.name}} save</label>
					<input data-type="save" :name="value.name" :value="skills[index].total"/>
				</span>

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

	var character			= @json($character);
	var level					= character.level;
	var name 					= character.name;
	var race 					= '{{$character->race->name}}';
	var char_class 			= '{{$character->char_class->name}}';
	var hp_max 				= character.hp_max;
	var hp_current 			= character.hp_current;
	var speed 					= '{{$character->speed()}}';
	var passive_perception 	= '{{$character->passive_perception()}}';
	var ac 						= '{{$character->getArmorClass()}}';
	var proficiency_bonus	= '{{$character->prof_bonus()}}';
	@if(is_null($character->race->darkvision))
		var darkvision 		= 'No';
	@else
		var darkvision 		= '{{$character->race->darkvision}}ft';
	@endif
	var saving_throws		= @json($character->getSavingThrows());
	var skills					= @json($character->getSkills());
	var ability_scores		= @json($character->getAbilityScores());
	var	race_data			= @json($race_data);
	var classes				= @json($classes);

</script>
@endsection
