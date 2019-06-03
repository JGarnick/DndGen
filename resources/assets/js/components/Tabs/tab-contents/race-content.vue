<template>
    <div class="races-container d-flex flex-wrap">
        <v-race-selectable v-for="(race, index) in races" :key="index" :race="race" :active="isActive(race)" @setActive="setActive"></v-race-selectable>
    </div>
</template>

<script>
import { mapActions } from 'vuex';
export default {
    props: [],
    data(){
        return {
            races: this.$store.state.data.races,
            activeRace: races['4']
        }
    },
    methods: {
        isActive: function(race){
            return this.activeRace.id == race.id;
        },
        setActive(id){
            this.activeRace = this.races[id];
            this.changeRace(this.activeRace.name);
        },
        ...mapActions([ // spread operator so that other methods can still be added.
            'changeRace'
        ])
    }
}
</script>