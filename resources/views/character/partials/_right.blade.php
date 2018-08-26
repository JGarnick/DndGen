<div id="right-tabs" class="right-section">
	<ul>
		<li><a href="#tab-right-1">Summary</a></li>
		{{-- <li><a href="#tab-right-2">Combat</a></li>
		<li><a href="#tab-right-3">Proficiencies</a></li>
		<li><a href="#tab-right-4">Spells</a></li>
		<li><a href="#tab-right-5">Features</a></li>
		<li><a href="#tab-right-6">Equipment</a></li> --}}
	</ul>
	<div id="tab-right-1" class="row">
		<h4 class="text-center">Ability Scores</h4>
		<div v-for="(value, index) in ability_scores" v-if="value.id !== 7" class="col-xs-2 text-center">
			<h3>@{{value.abbr}}</h3>
			<h3 class="no-top">@{{value.amount}}</h3>
			<div><small>mod</small></div>
			<small>
				<span v-if="value.mod > 0">+</span><span>@{{ability_scores[index].mod}}</span>
			</small>
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
				@{{character.ac}}
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
				@{{character.hp_current}}/@{{character.hp_max}}
			</h4>
		</div>
		<div class="col-xs-6 text-center">
			<h3>Skills</h3>
			<div class="skills-wrapper">
				<div v-for="skill, index in char_skills">
					<span>@{{skill.name}} (@{{skill.attribute_abbr}})</span>
					<span><span><template v-if="skill.total > 0">@{{skill.operator}}</template></span>@{{skill.bonus}}</span>
				</div>
			</div>
		</div>
		<div class="col-xs-6 text-center">
			<h3>Speed</h3>
			<h4>
				@{{character.speed}}
			</h4>
		</div>
		<div class="col-xs-6 text-center">
			<h3>Saving Throws</h3>
			<h4>
				<div style="width:50%;margin:0 auto;">
					<div v-for="save in saving_throws">
						<span class="col-xs-6">@{{save.name}}</span>
						<span class="col-xs-6"><span v-if="save.total > 0">@{{save.operator}}</span>@{{save.total}}</span>
					</div>
				</div>
			</h4>
		</div>
		<div class="col-xs-6 text-center">
			<h3>Darkvision</h3>
			<h4>
				@{{character.darkvision}}
			</h4>
		</div>
	</div>

	{{-- <div id="tab-right-2">
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
	</div> --}}
</div>
