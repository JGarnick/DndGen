<template>
    <div>
        <h3>Attributes</h3>
        <div class="atts-container display-only">
            <v-att-selector v-for="(attOb, index) in charAtts" :attOb="attOb" :key="index" :display-only="true"></v-att-selector>
        </div>
    </div>
</template>

<script>
export default {
    props: [],
    data(){
        return {
            
        }
    },
    computed: {
        charAtts(){
            return [
                {attIndex:1, charVal:this.$store.state.char.str},
                {attIndex:2, charVal:this.$store.state.char.dex},
                {attIndex:3, charVal:this.$store.state.char.con},
                {attIndex:4, charVal:this.$store.state.char.int},
                {attIndex:5, charVal:this.$store.state.char.wis},
                {attIndex:6, charVal:this.$store.state.char.cha},
            ]
        }
    }
}
</script>