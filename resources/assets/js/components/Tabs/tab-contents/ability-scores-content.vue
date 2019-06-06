<template>
    <div class="atts-container">
        <v-att-selector v-for="(attOb, index) in charAtts" :attOb="attOb" :key="index"></v-att-selector>
    </div>
</template>

<script>
import { mapActions } from 'vuex';
export default {
    props: [],
    data(){
        return {
            charAtts: [
                {attIndex:1, charVal:this.$store.state.char.str},
                {attIndex:2, charVal:this.$store.state.char.dex},
                {attIndex:3, charVal:this.$store.state.char.con},
                {attIndex:4, charVal:this.$store.state.char.int},
                {attIndex:5, charVal:this.$store.state.char.wis},
                {attIndex:6, charVal:this.$store.state.char.cha},
            ]
        }
    },
    mounted(){
        console.log(this.$store.state.data);
    },
    ...mapActions([ // spread operator so that other methods can still be added.
        'changeStr',
        'changeDex',
        'changeCon',
        'changeInt',
        'changeWis',
        'changeCha'
    ]),
}
</script>