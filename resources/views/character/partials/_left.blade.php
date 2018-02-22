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
		<h2 class="text-center">Ability Scores/Feats</h2>
		<h3 class="">Abilities Variant</h2>
		<h4 class=""><i>select 1</i></h4>
		<div id="ability-scores-wrapper">
			<h4>Manual Entry</h4>
			<div class="row">				
				<div class="col-xs-2" v-for="(value, index) in ability_scores" v-if="value.id !== 7">				
					<div class="row text-center">
						<div class="col-xs-12">
							<h4>@{{ability_scores[index].abbr}}</h4>
						</div>
						<div style="margin-bottom:7px;" class="col-xs-12">
							<small>base</small>
						</div>
						<div class="col-xs-12">
							<input min="0" max="30" class="form-control text-center input-medium" v-model="ability_scores[index].amount" @change="setAbilityModifier(index)" type="number" />
						</div>
					</div>
				</div>
			</div>
			<h4>Point Buy</h4>
			<div class="row">
				<div class="col-xs-2" v-for="(value, index) in ability_scores" v-if="value.id !== 7">
					<div class="row text-center">
						<div class="col-xs-12">
							<h4>@{{ability_scores[index].abbr}}</h4>
						</div>
						<div style="margin-bottom:7px;" class="col-xs-12">
							<small>base</small>
						</div>
						<div class="col-xs-12">
							<input min="0" max="30" class="form-control text-center input-medium" v-model="ability_scores[index].amount" @change="setAbilityModifier(index)" type="text" readOnly />
						</div>
					</div>
					<div class=" text-center" >				
						<h4>+</h4>
					</div>
				</div>
				<div class="col-xs-12">
					<div style="margin-top:10px;"><p class="pull-left">Point Buys</p><p class="pull-right"><b>@{{ability_points}}</b> <em>remaining</em></p></div>
				</div>
				<div class="col-xs-2" v-for="(value, index) in ability_scores" v-if="value.id !== 7">
					<div class="text-center" >				
						<div><small>bought</small></div>
						<div>@{{ability_scores[index].points_purchased}}</div>
						<div><span><button v-on:click="buyPoint(index)" type="button" role="button">+</button></span><span><button v-on:click="refundPoint(index)" type="button" role="button">-</button></span></div>
					</div>
				
					<div class="text-center" >
						<h4>+</h4>
					</div>
					
					<div class="text-center" >
						<div><small>race</small></div>
						<div>0</div>
					</div>
					
					<div class="text-center" >
						<h4>+</h4>
					</div>
					
					<div class="text-center" >
						<div><small>other</small></div>
						<div>0</div>
					</div>
					
					<div class="text-center" >
						<h4>=</h4>
					</div>
				
					<div class="text-center" >
						<div><small>total</small></div>
						<div>@{{ability_scores[index].amount}}</div>
						<div><small>mod</small></div>
						<div><small v-if="ability_scores[index].mod > 0">+</small><small>@{{ability_scores[index].mod}}</small></div>
					</div>	
				</div>
				
			</div>			
		</div>
		
		
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