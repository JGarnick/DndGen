<div id="left-tabs" class="left-section">
	<ul>
		<li><a href="#tab-1">Race</a></li>
		<li><a href="#tab-2">Ability Scores/Feats</a></li>
		<li><a href="#tab-3">Background</a></li>
		<li><a href="#tab-4">Class/Level</a></li>
		<li><a href="#tab-5">Spells</a></li>
		<li><a href="#tab-6">Proficiencies</a></li>
		<li><a href="#tab-7">Equipment</a></li>
	</ul>
	<div id="tab-1" class="row">
		<h2 class="col-xs-offset-1">Race</h2>
		<h4 class="col-xs-offset-1"><i>select 1</i></h4>
		<hr class="spacer-small" />
		<div id="selectable-race" class="clearfix selectable race-wrapper">
			@foreach($races AS $race)
				<button type="button" name="race" value="{{$race->id}}" v-on:click="changeRace"
					@if($race->subraces->count() > 0)
						data-has-subrace="true"
					@else
						data-has-subrace="false"
					@endif
					class="col-xs-6 tab-interactable ui-widget-content @if(!is_null($character->race) AND $character->race->id === $race->id)ui-selected @endif">{{$race->name}}
				</button>
			@endforeach
		</div>
		
		<div class="subrace-wrapper">
			<h2 class="col-xs-offset-1">Sub Race</h2>
			<h4 class="col-xs-offset-1"><i>select 1</i></h4>
			<div id="selectable-sub-race" class="clearfix selectable">
				@foreach($subraces AS $subrace)
					<button v-on:click="changeSubRace" type="button" data-parent-race="{{$subrace->parentRace->name}}" class="col-xs-6 tab-interactable ui-widget-content @if(!is_null($character->subrace) AND $character->subrace->id === $subrace->id)ui-selected @endif">{{$subrace->name}}</span>
				@endforeach
			</div>
		</div>
	</div>	
	
	<div id="tab-2">
		<p>Ability Scores/Feats</p>
	</div>
	<div id="tab-3">
		<p>Background</p>
	</div>
	<div id="tab-4">
		<p>Class/Level</p>
	</div>
	<div id="tab-5">
		<p>Spells</p>
	</div>
	<div id="tab-6">
		<p>Proficiencies</p>
	</div>
	<div id="tab-7">
		<p>Equipment</p>
	</div>
</div>