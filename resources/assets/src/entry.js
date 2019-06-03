import Vue from 'vue';
import Vuex from 'vuex';
Vue.use(Vuex);

const requireComponent = require.context(
    // The relative path of the components folder
    '../js/components',
    // Whether or not to look in subfolders
    true,
    // The regular expression used to match base component filenames
    /.+.(vue)/
);

requireComponent.keys().forEach(fileName => {
    const componentConfig = requireComponent(fileName);
    fileName = fileName.split("/");
    fileName = fileName[fileName.length - 1];
    const componentName = "v-" + fileName.replace(/.vue$/, '').toLowerCase();
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
        },
        data: {
            races: window.races,
        }
    });

    var app = new Vue({
        el: "#vue-1",
        data(){
            return {
                left_tabs: [
                    {title: "Race", active: true, content: "v-race-content"},
                    {title: "Ability Scores", active: false, content: "v-ability-scores-content"},
                    {title: "Background", active: false, content: "v-background-content"},
                    {title: "Class / Level", active: false, content: "v-class-level-content"},
                    {title: "Spells", active: false, content: "v-spells-left-content"},
                    {title: "Proficiencies", active: false, content: "v-proficiencies-left-content"},
                    {title: "Equipment", active: false, content: "v-equipment-left-content"},
                ],
                right_tabs: [
                    {title: "Summary", active:true, content: "v-summary-content"},
                    {title: "Combat", active:false, content: "v-combat-content"},
                    {title: "Proficiencies", active:false, content: "v-proficiencies-right-content"},
                    {title: "Spells", active:false, content: "v-spells-right-content"},
                    {title: "Features", active:false, content: "v-features-content"},
                    {title: "Equipment", active:false, content: "v-equipment-right-content"},
                ]
            }
        },
    });
    
});
