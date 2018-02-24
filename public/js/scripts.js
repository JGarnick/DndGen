$(document).ready(function() {

	Vue.component("greeting", {
		template: "<h1>Welcome Message!</h1>"
	});
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

			$('#selectable-race button').on("click", function(){
				var previous_race = app.race;
				var race = $(this)[0].innerText;
				app.race = race;
				setAttributes(race, previous_race);
				$('#selectable-race button').each(function(){
					$(this).removeClass('ui-selected');
				});
				$(this).addClass("ui-selected");
				showHideSubraces();
			});

			function setAttributes(race, previous_race)
			{
				//first reset attributes the previous race gave bonuses to
				if(previous_race !== ""){
					$.each(app.race_data[previous_race]["race_asi"], function(key, value){
						//key = "Constitution, value = [amount => 2, att_id => 3]
						app.ability_scores[key]["amount"] -= value["amount"];
						app.setAbilityModifier(key);
					});
				}
				//then add the new bonuses
				$.each(app.race_data[race]["race_asi"], function(key, value){
					//key = "Constitution, value = [amount => 2, att_id => 3]
					app.ability_scores[key]["amount"] += value["amount"];
					app.setAbilityModifier(key);
				});
			}
			$(function(){setAttributes(app.race, "");})
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
				var selected = $(this).hasClass("ui-selected");

				$('#selectable-sub-race button').each(function(){
					$(this).removeClass('ui-selected');
				});
				if(!selected){
					$(this).addClass("ui-selected");
				}
				if(selected){
					app.subrace = $(this).innerText;
				}
			});

			$("[data-type='ability-score']").each(function(){
				var name = $(this).attr("name");
				$(this).attr("name", "ability_scores[" + name + "]");
			});

			$("[data-type='skill']").each(function(){
				var name = $(this).attr("name");
				$(this).attr("name", "skills[" + name + "]");
			});

			$("#ability-scores-wrapper").accordion({
				heightStyle: "content",

			});

		},
        data: {
            character:          window.character,
			race_data:			window.race_data,
			level:				window.level,
            name: 				"",
            char_class: 		window.char_class,
            race: 				window.race,
			hp_max: 			window.hp_max,
			hp_current: 		window.hp_current,
			passive_perception: window.passive_perception,
			speed: 				window.speed,
			darkvision: 		window.darkvision,
			ac:					window.ac,
			saving_throws:		window.saving_throws,
			skills:				window.skills,
			proficiency_bonus:	window.proficiency_bonus,
			ability_scores:		window.ability_scores,
			subrace:			"",
			ability_points:		27,
        },
		filters: {
			lowercase: function(value){
				if (!value) return ''
				value = value.toString()
				return value.toLowerCase()
			}
		},
        methods: {
			buyPoint: function(index){
				//When purchasing the next point, you must first refund the amount of the current attribute, then spend the point.
				var attempt 			= this.ability_scores[index].amount + 1; //Current stat + 1
				var paid				= this.getPointCost(this.ability_scores[index].amount); //Amount you've invested in your skill points so far
				var cost 				= this.getPointCost(attempt); //How much moving to the next point will cost
				var current_score_cost 	= this.getPointCost(this.ability_scores[index].amount); //How much the current amount cost

				if(attempt <= 15  && this.ability_points !== 0)
				{
					this.ability_points += current_score_cost;
					this.ability_points -= cost;
					this.ability_scores[index].amount += 1;
					this.setAbilityModifier(index);
					this.ability_scores[index].points_purchased++;
				}

			},
			refundPoint: function(index){
				var attempt = this.ability_scores[index].amount - 1;
				var paid 	= this.getPointCost(this.ability_scores[index].amount);
				var cost	= this.getPointCost(attempt);

				if(attempt >= 8)
				{
					this.ability_points += paid;
					this.ability_points -= cost;
					this.ability_scores[index].amount = attempt;
					this.setAbilityModifier(index);
					this.ability_scores[index].points_purchased--;
				}
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
			// changeRace: function(event){
			// 	this.race = event.target.innerText;
			// },
			// changeSubRace: function(event){
			// 	this.subrace = event.target.innerText;
			// },
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
