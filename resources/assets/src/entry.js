import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

const requireComponent = require.context(
    // The relative path of the components folder
    '../js/components',
    // Whether or not to look in subfolders
    false,
    // The regular expression used to match base component filenames
    /.+.(vue)/
);

requireComponent.keys().forEach(fileName => {
    const componentConfig = requireComponent(fileName)
    const componentName = "v-" + fileName.replace(/^\.\/(.*)\.\w+$/, '$1').toLowerCase();
    
    Vue.component(
        componentName,
        componentConfig.default || componentConfig
    );
});
$(document).ready(() => {
    const store = new Vuex.Store({
        char: {
            level: 1,
            name: "Test",
            race: "human",
            subrace: false,
            cclass: "barbarian",
            p_bonus: 2,
            ac: 13,
            hp_max: 13,
            hp_current: 13,
            str: 15,
            dex: 14,
            con: 13,
            int: 12,
            wis: 10,
            cha: 8,
            proficiencies: [],
            saves: ["str", "con"],
            darkvision: false,
            speed: 30,
            passive_perception: 10,
            num_atks: 1
        }
    });

    var app = new Vue({
        el: "#vue-1",
        data(){
            return {
                left_tabs: [
                    {title: "Race", active: true},
                    {title: "Ability Scores", active: false},
                    {title: "Background", active: false},
                    {title: "Class / Level", active: false},
                    {title: "Spells", active: false},
                    {title: "Proficiencies", active: false},
                    {title: "Equipment", active: false},
                ],
                right_tabs: [
                    {title: "Summary", active:true},
                    {title: "Combat", active:false},
                    {title: "Proficiencies", active:false},
                    {title: "Spells", active:false},
                    {title: "Features", active:false},
                    {title: "Equipment", active:false},
                ]
            }
        },
    });
    
});
