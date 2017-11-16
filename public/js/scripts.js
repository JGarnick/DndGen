$(document).ready(function() {
    $('#character-table').DataTable({});

    $('#left-tabs').tabs({
        active: 0,
    });
    $('#right-tabs').tabs({
        active: 0,
    });

    $('#selectable-race').selectable({
        selected: showHideSubraces,

    });

    function showHideSubraces() {
        var race = $('.ui-selected')[0].innerText;

        if ($($('.ui-selected')[0]).attr('data-has-subrace') === 'true') {
            $('.subrace-wrapper').show();

            $('#selectable-sub-race span').each(function() {
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
    $('#selectable-sub-race').selectable();

    var app = new Vue({
        el: '#app',
        data: {
            name: window.name,
            char_class: window.char_class,
            race: window.race,
            strength: window.strength,
            dexterity: window.dexterity,
            constitution: window.constitution,
        },
        methods: {
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
    })

});