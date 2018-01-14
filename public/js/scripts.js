$(document).ready(function() {
    $('#character-table').DataTable({});

    $('#left-tabs').tabs({
        active: 0,
    });
    $('#right-tabs').tabs({
        active: 0,
    });

    $('#selectable-race button').on("click", function(){
		$('#selectable-race button').each(function(){
			$(this).removeClass('ui-selected');
		});
		
		$(this).addClass("ui-selected");
		showHideSubraces();
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
		$('#selectable-race button').each(function(){
			$(this).removeClass('ui-selected');
		});
		
		$(this).addClass("ui-selected");
	});
	
    new Vue({
        el: '#vue-1',
        data: {
            name: 				window.name,
            char_class: 		window.char_class,
            race: 				window.race,
            strength: 			window.strength,
            dexterity: 			window.dexterity,
            constitution: 		window.constitution,
			hp_max: 			window.hp_max,
			hp_current: 		window.hp_current,
			passive_perception: window.passive_perception,
			speed: 				window.speed,
			darkvision: 		window.darkvision,
			ac:					window.ac,
			saving_throws:		window.saving_throws,
			skills:				window.skills,
        },
        methods: {
			//toggleActive: function(event){
			//	var id = event.target.value;
			//	var classesArray = [];
			//	var classes = '';
			//	
			//	//foreach over all refs
			//	for (var key in this.$refs)
			//	{
			//		var existingClasses = [];
			//		//foreach over each refs classes
			//		for(var c in this.$refs[key].classList)
			//		{
			//			//filter out only strings
			//			if(typeof this.$refs[key].classList[c] === "string" && this.$refs[key].classList[c] !== "ui-selected")
			//			{
			//				//add the string to existingClasses array. The last addition is an amalgamation of all classes, which is all I want
			//				existingClasses.push(this.$refs[key].classList[c]);
			//			}
			//		}
			//		
			//		//pop off the amalgamation
			//		existingClasses.pop();
			//		var classList = "";
			//		
			//		for(var c in existingClasses)
			//		{
			//			classList += existingClasses[c] + ' ';
			//		}
			//		
			//		this.$refs[key].classList = classList.trim();
			//	}
			//	for(var i = 0; i < this.$refs[1].classList.length; i++)
			//	{
			//		if(this.$refs[id].classList[i] !== undefined)
			//		{
			//			classesArray.push(this.$refs[id].classList[i]);
			//		}
			//	}
			//	
			//	if(!classesArray.includes("ui-selected"))
			//	{
			//		classesArray.push("ui-selected");										
			//	}
			//	else
			//	{
			//		classesArray.pop("ui-selected");
			//	}
			//	for(var i = 0; i < classesArray.length; i++)
			//	{
			//		classes = classes + ' ' + classesArray[i];
			//	}
			//	
			//	event.target.className = classes;
			//},
            getAbilityModifier: function($stat) {
                if ($stat === '1') {
                    return -5;
                }
            
                if ($stat === '2' || $stat === '3') {
                    return -4;
                }
            
                if ($stat === '4' || $stat === '5') {
                    return -3;
                }
            
                if ($stat === '6' || $stat === '7') {
                    return -2;
                }
            
                if ($stat === '8' || $stat === '9') {
                    return -1;
                }
            
                if ($stat === '10' || $stat === '11') {
                    return 0;
                }
            
                if ($stat === '12' || $stat === '13') {
                    return 1;
                }
            
                if ($stat === '14' || $stat === '15') {
                    return 2;
                }
            
                if ($stat === '16' || $stat === '17') {
                    return 3;
                }
            
                if ($stat === '18' || $stat === '19') {
                    return 4;
                }
            
                if ($stat === '20' || $stat === '21') {
                    return 5;
                }
            
                if ($stat === '22' || $stat === '23') {
                    return 6;
                }
            
                if ($stat === '24' || $stat === '25') {
                    return 7;
                }
            
                if ($stat === '26' || $stat === '27') {
                    return 8;
                }
            
                if ($stat === '28' || $stat === '29') {
                    return 9;
                }
            
                if ($stat === '30') {
                    return 10;
                }
            }
        }
    });

});