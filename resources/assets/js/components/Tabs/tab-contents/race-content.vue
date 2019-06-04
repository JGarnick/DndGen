<template>
    <div>
        <h3>Choose a race</h3>
        <div class="d-flex flex-wrap races-container">
            <v-race-selectable v-for="(race, index) in races" :key="index" :race="race" :active="isActiveRace(race)" @setActive="setActiveRace"></v-race-selectable>
        </div>
        <div class="spacer sm"></div>
        <h3>Choose a Subrace</h3>
        <div class="d-flex flex-wrap races-container">
            <v-race-selectable v-for="(race, index) in activeSubraces()" :key="index" :race="race" :active="isActiveSubrace(race)" @setActive="setActiveSubrace"></v-race-selectable>
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex';
export default {
    props: [],
    data(){
        return {
            races: this.$store.state.data.races,
            subraces: this.$store.state.data.subraces,
            activeRace: races['4'],
            activeSubrace: false
        }
    },
    mounted(){

    },
    watch: {
        activeRace: function(){
            this.activeSubraces();
        }
    },
    methods: {
        isActiveRace: function(race){
            return this.activeRace.id == race.id;
        },
        isActiveSubrace: function(race){
            if(this.activeSubrace !== false){
                return this.activeSubrace.id == race.id;
            }
            return false;
        },
        setActiveRace(id){
            this.activeRace = this.races[id];
            this.changeRace(this.activeRace.name);
        },
        setActiveSubrace(id){
            this.activeSubrace = this.subraces[id];
            
            this.changeSubrace(this.activeSubrace.name);
        },
        ...mapActions([ // spread operator so that other methods can still be added.
            'changeRace',
            'changeSubrace'
        ]),
        activeSubraces(){
            let returnMe = {};
            for(let ob in subraces){
                let sub = subraces[ob];
                
                if(sub.parent_race_id == this.activeRace.id){
                    returnMe[ob] = subraces[ob];
                }
            }

            return returnMe;
        }
    }
}
</script>