<template>
    <div>
        <h3>Attributes</h3>
        <div class="d-flex flex-column">
            <div class="atts-container display-only">
                <v-att-selector v-for="(attOb, index) in charAtts" :attOb="attOb" :key="'att-'+index" :display-only="true" :total="true"></v-att-selector>
            </div>
            <div class="d-flex mods-container">
                <div v-for="(attOb, index) in charAtts" :key="'mod-'+index" class="mod-container">
                    <div>Mod</div>
                    <div>{{getMod(getTotal(getAtt(attOb), attOb.charVal.val))}}</div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {char, mixin} from "../../../mixins.js"
export default {
    props: [],
    mixins: [char, mixin],
    data(){
        return {
            
        }
    },
    methods: {
        getAtt(attOb){
            return this.$store.state.data.cattributes[attOb.attIndex].abbr.toLowerCase();            
        }
    }
}
</script>