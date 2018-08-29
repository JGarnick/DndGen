$(document).ready(function() {
    var app = new Vue({
        el: '#vue-1',
		mounted: function(){
			$('#character-table').DataTable({});

			$('#left-tabs').tabs({
				active: 0,
			});
			$('#right-tabs').tabs({
				active: 0,
			});

			$(".skill").on("click", function(){
				if($(this).hasClass("disabled")){return;}
				$(this).find("input").attr("checked", function(index, attr){
					return attr == "checked" ? false : "checked";
				});
				$(this).toggleClass("selected");
				
				var max_allowed = Number(app.class_data[app.char_class].skills_granted);
				var num_selected = $("#tab-6 .proficiency-wrapper .skill.selected").length;
				
				if(num_selected >= max_allowed){
					$("#tab-6 .proficiency-wrapper .skill:not(.selected)").addClass("disabled");
					$("#tab-6 .proficiency-wrapper .skill:not(.selected) input").each(function(index){
						$(this).prop("disabled", true);
					});
				}else{
					$("#tab-6 .proficiency-wrapper .skill").removeClass("disabled");
					$("#tab-6 .proficiency-wrapper .skill:not(.selected) input").each(function(index){
						$(this).prop("disabled", false);
					});
				}
				
				var name = $(this).find("input").attr("id");
				app.setSkillProficiency(name);
			});
			
			
			$('#selectable-race button').on("click", function(){
				var previous_race = app.race;
				var race_name = $(this)[0].innerText;
				app.race = race_name;
				setRaceAttributes(race_name, previous_race);

				var subrace_name = app.subrace;
				if(subrace_name !== ""){
					//Changing race while subrace is selected, must reset the subrace bonuses by passing the current subrace as a previous subrace
					setSubraceAttributes("", subrace_name, true, previous_race);
				}

				app.subrace = "";
				$('#selectable-race button').each(function(){
					$(this).removeClass('ui-selected');
				});
				$(this).addClass("ui-selected");
				showHideSubraces();
			});

			function setRaceAttributes(name, previous)
			{
				//first reset attributes the previous race gave bonuses to
				if(previous !== ""){
					$.each(app.race_data[previous]["race_asi"], function(key, value){
						//key = "Constitution, value = [amount => 2, att_id => 3]
						app.ability_scores[key]["amount"] -= value["amount"];
						app.setAbilityModifier(key);
					});
				}
				//then add the new bonuses
				$.each(app.race_data[name]["race_asi"], function(key, value){
					//key = "Constitution, value = [amount => 2, att_id => 3]
					app.ability_scores[key]["amount"] += value["amount"];
					app.setAbilityModifier(key);
				});
				app.computeCharacterSkills();
			}

			function setSubraceAttributes(subrace_name, previous_subrace, race_change = false, previous_race = "")
			{
				//If changing race, we need to provide the previous race so we can reset the bonuses it's selected subrace provided
				if(race_change && previous_race !== ""){
					$.each(app.race_data[previous_race]["subraces"][previous_subrace]["subrace_asi"], function(key, value){
						//key = "Constitution, value = [amount => 2, att_id => 3]
						app.ability_scores[key]["amount"] -= value["amount"];
						app.setAbilityModifier(key);
					});

					$('#selectable-sub-race button').each(function(){
						$(this).removeClass('ui-selected');
					});

					return;
				}

				if(previous_subrace !== "" ){
					$.each(app.race_data[app.race].subraces[previous_subrace].subrace_asi, function(key, value){
						//key = "Constitution, value = [amount => 2, att_id => 3]
						if(key in app.ability_scores){
							app.ability_scores[key].amount -= value["amount"];
							app.setAbilityModifier(key);
						}
						
					});
				}
				if(subrace_name !== "" && previous_subrace !== subrace_name){
					$.each(app.race_data[app.race].subraces[subrace_name].subrace_asi, function(key, value){
						//key = Wisdom, value = [ amount => 1, att_id => 4 ]
						if(key in app.ability_scores){
							app.ability_scores[key].amount += value["amount"];
							app.setAbilityModifier(key);
						}
					});
				}
				app.computeCharacterSkills();
				return;
			}
			$(document).ready( function(){
				setRaceAttributes(app.race, "");
			});
			function showHideSubraces() {
				var race = $('.ui-selected')[0].innerText;
				if ($($('.ui-selected')[0]).attr('data-has-subrace') === 'true') {
					$('.subrace-wrapper').show();

					$('#selectable-sub-race button').each(function() {
						if ($(this).attr('data-parent-race') == race) {
							$(this).show();
						} else {
							$(this).hide();
						}
					});
				} else {
					$('.subrace-wrapper').hide();
				}
			};

			showHideSubraces();

			$('#selectable-sub-race button').on("click", function(){
				var previous = app.subrace;
				var name = $(this)[0].innerText;

				$('#selectable-sub-race button').each(function(){
					$(this).removeClass('ui-selected'); //removes the selected class from all the buttons
				});
				if(app.subrace === name){
					app.subrace = "";
					$(this).removeClass("ui-selected");
				}else{
					app.subrace = name;
					$(this).addClass("ui-selected");
				}
				setSubraceAttributes(name, previous); //adjusts the player's stats based on subrace
			});

			$("[data-type='ability-score']").each(function(){
				var name = $(this).attr("name");
				$(this).attr("name", "ability_scores[" + name + "]");
			});

			$("#ability-scores-wrapper").accordion({
				heightStyle: "content",

			});
			
			$("[data-abs='constitution']").on("change", function(){ app.computeHp(); });
		},
        data: {
            character:          window.character,
			char_skills:		window.char_skills,
			race_data:			window.race_data,
			class_data:			window.class_data,
            char_class: 		window.char_class,
            race: 				window.race,
			passive_perception: window.passive_perception,
			speed: 				window.speed,
			darkvision: 		window.darkvision,
			allSkills:			window.allSkills,
			proficiency_bonus:	window.proficiency_bonus,
			ability_scores:		window.ability_scores,
			subrace:			"",
			ability_points:		27,
			classes:			window.classes,
			player_name:		"",
        },
		filters: {
			lowercase: function(value){
				if (!value) return ''
				value = value.toString()
				return value.toLowerCase()
			},
			uppercase: function(value){
				if (!value) return ''
				value = value.toString()
				return value.toUpperCase()
			}
		},
        methods: {
			calculateSaves(){
				var saves = this.class_data[this.char_class].proficiencies.saves;
				var save_atts = [];
				for ( save in saves ){
					save_atts.push(saves[save].name);
				}
				var saving_throws = [];
				
				for(att in this.ability_scores){
					var bonus = Number(this.ability_scores[att].mod);
					var proficient = 0;
					if( save_atts.includes(att) ){
						bonus += Number(this.proficiency_bonus);
						proficient = 1;
					}
					saving_throws.push( {"name" : att, "bonus" : bonus, "proficient": proficient} );
				}
				return saving_throws;
			},
			setSkillProficiency:function(name){
				this.char_skills[name].proficient = this.char_skills[name].proficient == 0 ? 1 : 0;
				var bonus = this.ability_scores[this.char_skills[name].attribute].mod;
				if(this.char_skills[name].proficient == 1){ bonus += this.getProficiencyBonus(); }
				this.char_skills[name].bonus = bonus;
			},
			multi_function1:function(index){
				this.setAbilityModifier(index);
				this.computeCharacterSkills();
			},
			computeCharacterSkills:function(){
				for(index in this.char_skills){
					var skill = this.char_skills[index];
					var mod = this.ability_scores[skill.attribute].mod;
					skill.bonus = mod;
					if(skill.proficient == 1){ console.log("here"); skill.bonus = mod + this.getProficiencyBonus(); }					
				}
			},
			getAverageOfHitDie: function(){
				var base = Number(class_data[this.char_class].hit_die.base);
				switch(base){
					case 6:
						return 4;
						break;
					case 8:
						return 5;
						break;
					case 10:
						return 6;
						break;
					case 12:
						return 7;
						break;
				}
			},
			computeHp: function(){
				var con_mod = this.ability_scores["Constitution"].mod;
				var hp_base = class_data[this.char_class].hit_die.base;
				var hp_at_level_1 = hp_base + con_mod;
				if(this.character.level == 1){
					this.character.hp_max = hp_at_level_1;
					this.character.hp_current = hp_at_level_1;
				}else{
					var average = this.getAverageOfHitDie();
					this.character.hp_max =  hp_base + (Number(this.character.level) * con_mod) + ( ( (Number(this.character.level) - 1) * average) );
					this.character.hp_current = this.character.hp_max;
				}
			},
			changeClass: function(){
				this.computeHp();
				this.computeCharacterSkills();
			},
			changeLevel: function(){
				this.computeHp();
				this.proficiency_bonus = this.getProficiencyBonus();
				this.computeCharacterSkills();
			},
			getProficiencyBonus: function(){
				if(this.character.level > 0 && this.character.level < 5)
				{
					return 2;
				}

				if(this.character.level > 4 && this.character.level < 9)
				{
					return 3;
				}

				if(this.character.level > 8 && this.character.level < 13)
				{
					return 4;
				}

				if(this.character.level > 12 && this.character.level < 17)
				{
					return 5;
				}

				if(this.character.level > 16 && this.character.level < 21)
				{
					return 6;
				}
			},
			//For calculating the minimum attribute value based on current race and subrace
			getBaseAttributeValue: function(attribute){
				var base = 8;
				var bonus = this.getComputedAsiByAttribute(attribute);
				return base + bonus;
			},
			//Resets point buy stats
			resetBaseStats: function(){
				$.each(this.ability_scores, function(index, value){
						value.amount = 8;
						value.mod = -1;
						value.points_purchased = 0;
				});
				$.each(this.race_data[this.race].race_asi, function(key, value){
					if(key in app.ability_scores){
						app.ability_scores[key].amount = 8 + value.amount;
						app.ability_scores[key].mod = app.getAbilityModifier(app.ability_scores[key].amount);
					}
				});

				if(this.subrace !== ""){
					$.each(this.race_data[this.race].subraces[this.subrace].subrace_asi, function(key, value){
						if(key in app.ability_scores){
							app.ability_scores[key].amount += value["amount"];
							app.ability_scores[key].mod = app.getAbilityModifier(app.ability_scores[key].amount);
						}
					});
				}
				this.ability_points = 27;
				this.computeCharacterSkills();
			},
			//Return all attributes and their bonuses for current race and subrace
			getAsiData: function(){
				var asi_data = [];
				$.each(app.race_data[app.race]["race_asi"], function(key, value){
					asi_data[key] = value["amount"];
				});
				
				$.each( app.race_data[app.race]["subraces"][app.subrace]["subrace_asi"], function(key2, val2){
					asi_data[key2] = val2["amount"];
				});
				
				return asi_data;
			},
			//Return the specific ASI bonus by attribute, including racial and subracial bonuses
			getComputedAsiByAttribute: function(attribute){
				var bonus = 0;
				if(typeof this.race_data[this.race].race_asi !== "undefined"){
					var race_asi = this.race_data[this.race].race_asi;
					if(attribute in race_asi){
						var bonus = race_asi[attribute].amount;
					}
				}
				
				if(this.subrace){
					var subrace_asi = this.race_data[this.race].subraces[this.subrace].subrace_asi;
					if(attribute in subrace_asi){ bonus += subrace_asi[attribute].amount }
				}
			
				return bonus;
			},
			
			//Point buy function for adding 1 to a stat
			buyPoint: function(index){
				//When purchasing the next point, you must first refund the amount of the current attribute, then spend the point.
				var attempt 			= this.ability_scores[index].amount + 1; //Current stat + 1
				//var paid				= this.getPointCost(this.ability_scores[index].amount); //Amount you've invested in your skill points so far
				var cost 				= this.getPointCost(attempt); //How much moving to the next point will cost
				var current_score_cost 	= this.getPointCost(this.ability_scores[index].amount); //How much the current amount cost
				if(this.getBaseAttributeValue(index) === this.ability_scores[index].amount){
					current_score_cost = 0;
				}

				if(attempt <= 15  && this.ability_points !== 0)
				{
					this.ability_points += current_score_cost;
					this.ability_points -= cost;
					this.ability_scores[index].amount += 1;
					this.setAbilityModifier(index);
					this.ability_scores[index].points_purchased++;
				}
				this.computeCharacterSkills();
			},
			refundPoint: function(index){
				//Attempt represents the number the user is trying to achieve by refunding
				//Logic: Get the point cost of the current score (i.e. 9 = 1)
				//Paid represents what would have had to be spent to get to the current score. This logic has fallacies based on racial bonuses
				var attempt = this.ability_scores[index].amount - 1;
				var paid 	= this.getPointCost(this.ability_scores[index].amount);
				var cost	= this.getPointCost(attempt);
				var minimum_amt = this.getBaseAttributeValue(index);//Get 8 + racial and subracial ASI.

				if(attempt >= 8 && attempt >= minimum_amt)
				{
					this.ability_points += paid;
					if(attempt !== minimum_amt){ this.ability_points -= cost; }
					this.ability_scores[index].amount = attempt;
					this.setAbilityModifier(index);
					this.ability_scores[index].points_purchased--;
				}
				this.computeCharacterSkills();
			},
			getPointCost: function(num){
				switch(num){
					case 8:
						return 0
						break;
					case 9:
						return 1
						break;
					case 10:
						return 2
						break;
					case 11:
						return 3
						break;
					case 12:
						return 4
						break;
					case 13:
						return 5
						break;
					case 14:
						return 7
						break;
					case 15:
						return 9
						break;
				}
			},
			setAbilityModifier: function(index){
				var newMod = this.getAbilityModifier(this.ability_scores[index].amount);
				this.ability_scores[index].mod = newMod;
			},
            getAbilityModifier: function($stat) {
                if ($stat === '1' || $stat === 1) {
                    return -5;
                }

                if ( $stat === '2' || $stat === '3' || $stat === 2 || $stat === 3 ) {
                    return -4;
                }

                if ( $stat === '4' || $stat === '5' || $stat === 4 || $stat === 5 ) {
                    return -3;
                }

                if ( $stat === '6' || $stat === '7' || $stat === 6 || $stat === 7 ) {
                    return -2;
                }

                if ( $stat === '8' || $stat === '9' || $stat === 8 || $stat === 9 ) {
                    return -1;
                }

                if ( $stat === '10' || $stat === '11' || $stat === 10 || $stat === 11 ) {
                    return 0;
                }

                if ( $stat === '12' || $stat === '13' || $stat === 12 || $stat === 13 ) {
                    return 1;
                }

                if ( $stat === '14' || $stat === '15' || $stat === 14 || $stat === 15 ) {
                    return 2;
                }

                if ( $stat === '16' || $stat === '17' || $stat === 16 || $stat === 17 ) {
                    return 3;
                }

                if ( $stat === '18' || $stat === '19' || $stat === 18 || $stat === 19 ) {
                    return 4;
                }

                if ( $stat === '20' || $stat === '21' || $stat === 20 || $stat === 21 ) {
                    return 5;
                }

                if ( $stat === '22' || $stat === '23' || $stat === 22 || $stat === 23 ) {
                    return 6;
                }

                if ( $stat === '24' || $stat === '25' || $stat === 24 || $stat === 25 ) {
                    return 7;
                }

                if ( $stat === '26' || $stat === '27' || $stat === 26 || $stat === 27 ) {
                    return 8;
                }

                if ( $stat === '28' || $stat === '29' || $stat === 28 || $stat === 29 ) {
                    return 9;
                }

                if ( $stat === '30' || $stat === 30 ) {
                    return 10;
                }
            }
        }
    });

});
