<div id="right-tabs" class="right-section">
	<ul>
		<li><a href="#tab-right-1">Summary</a></li>
		<li><a href="#tab-right-2">Combat</a></li>
		<li><a href="#tab-right-3">Proficiencies</a></li>
		<li><a href="#tab-right-4">Spells</a></li>
		<li><a href="#tab-right-5">Features</a></li>
		<li><a href="#tab-right-6">Equipment</a></li>
	</ul>
	<div id="tab-right-1" class="row">
		<h4 class="text-center">Ability Scores</h4>
		<div class="col-xs-2 text-center">
			<h3>STR</h3>
			<h3 class="no-top">@{{strength}}</h3>
			<div><small>mod</small></div>
			<div>
				<small>
					@if($character->getAbilityModifier($character->strength) > 0)
						+{{$character->getAbilityModifier($character->strength)}}
					@else
						{{$character->getAbilityModifier($character->strength)}}
					@endif
				</small>
			</div>
		</div>
		<div class="col-xs-2 text-center">
			<h3>DEX</h3>
			<h3 class="no-top">@{{dexterity}}</h3>
			<div><small>mod</small></div>
			<div>
				<small>
				<span v-if="getAbilityModifier(dexterity) > 0">+</span>
				<span>@{{getAbilityModifier(dexterity)}}</span>
				</small>
			</div>
		</div>
		<div class="col-xs-2 text-center">
			<h3>CON</h3>
			<h3 class="no-top">@{{constitution}}</h3>
			<div><small>mod</small></div>
			<div>
				<small>
					<span v-if="getAbilityModifier(constitution) > 0">+</span>
					<span>@{{getAbilityModifier(constitution)}}</span>
				</small>
			</div>
		</div>
		<div class="col-xs-2 text-center">
			<h3>WIS</h3>
			<h3 class="no-top">{{$character->wisdom}}</h3>
			<div><small>mod</small></div>
			<div>
				<small>
					@if($character->getAbilityModifier($character->wisdom) > 0)
						+{{$character->getAbilityModifier($character->wisdom)}}
					@else
						{{$character->getAbilityModifier($character->wisdom)}}
					@endif
				</small>
			</div>
		</div>
		<div class="col-xs-2 text-center">
			<h3>INT</h3>
			<h3 class="no-top">{{$character->intelligence}}</h3>
			<div><small>mod</small></div>
			<div>
				<small>
					@if($character->getAbilityModifier($character->intelligence) > 0)
						+{{$character->getAbilityModifier($character->intelligence)}}
					@else
						{{$character->getAbilityModifier($character->intelligence)}}
					@endif
				</small>
			</div>
		</div>
		<div class="col-xs-2 text-center">
			<h3>CHA</h3>
			<h3 class="no-top">{{$character->charisma}}</h3>
			<div><small>mod</small></div>
			<div>
				<small>
					@if($character->getAbilityModifier($character->charisma) > 0)
						+{{$character->getAbilityModifier($character->charisma)}}
					@else
						{{$character->getAbilityModifier($character->charisma)}}
					@endif
				</small>
			</div>
		</div>
		<hr class="spacer small" />
		<div class="col-xs-6 text-center">
			<h3>Proficiency Bonus</h3>
			<h4>
				<span v-if="proficiency_bonus > 0">+</span>@{{proficiency_bonus}}
			</h4>
		</div>
		<div class="col-xs-6 text-center">
			<h3>Armor Class</h3>
			<h4>
				@{{ac}}
			</h4>
		</div>
		<div class="col-xs-6 text-center">
			<h3>Passive Perception</h3>
			<h4>
				@{{passive_perception}}
			</h4>
		</div>
		<div class="col-xs-6 text-center">
			<h3>Max Hit Points</h3>
			<h4>
				@{{hp_current}}/@{{hp_max}}
			</h4>
		</div>
		<div class="col-xs-6 text-center">
			<h3>Skills</h3>
			<div class="row">
				<div class="skills-wrapper">
					<div v-for="skill in skills">
						<span class="col-xs-9">@{{skill.name}}(@{{skill.abbr}})</span>
						<span class="col-xs-3">@{{skill.total}}</span>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-6 text-center">
			<h3>Speed</h3>
			<h4>
				@{{speed}}
			</h4>
		</div>
		<div class="col-xs-6 text-center">
			<h3>Saving Throws</h3>
			<h4>
				<div style="width:50%;margin:0 auto;">
					<div v-for="(item, index) in saving_throws">
						<span class="col-xs-6">@{{index}}</span>
						<span class="col-xs-6">@{{item}}</span>
					</div>					
				</div>								
			</h4>
		</div>
		<div class="col-xs-6 text-center">
			<h3>Darkvision</h3>
			<h4>
				@{{darkvision}}
			</h4>
		</div>
	</div>	
	
	<div id="tab-right-2">
		<p>Ability Scores/Feats</p>
	</div>
	<div id="tab-right-3">
		<p>Background</p>
	</div>
	<div id="tab-right-4">
		<p>Class/Level</p>
	</div>
	<div id="tab-right-5">
		<p>Spells</p>
	</div>
	<div id="tab-right-6">
		<p>Proficiencies</p>
	</div>
</div>