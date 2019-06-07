<template>
    <div class="atts-container">
        <v-att-selector v-for="(attOb, index) in charAtts" :attOb="attOb" :key="index" @increaseAtt="increase" @decreaseAtt="decrease" @changeVal="changeVal" @validate="validate"></v-att-selector>
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
    methods: {
        ...mapActions([ // spread operator so that other methods can still be added.
            'changeStr',
            'changeDex',
            'changeCon',
            'changeInt',
            'changeWis',
            'changeCha'
        ]),
        increase(global, local){
            //get the ability, get the value, check against min and max, update character ability
            
            let att = global.abbr.toLowerCase();
            local.charVal++;
            local.charVal = this.verifyRange(local.charVal);
            this.changeCharAttribute(att, local.charVal);
        },
        decrease(global, local){
            let att = global.abbr.toLowerCase();
            local.charVal--;
            local.charVal = this.verifyRange(local.charVal);
            this.changeCharAttribute(att, local.charVal);
        },
        validate(local, data){
            if( isNaN( parseInt(data) ) ){
                local.charVal = local.charVal.slice(0, -1);
                return;
            }
        },
        changeVal(local, data, global){
            let att = global.abbr.toLowerCase();
            local.charVal = this.verifyRange(local.charVal);
            this.changeCharAttribute(att, local.charVal);
        },
        changeCharAttribute(global, payload){
            switch(global){
                case "str":
                    this.changeStr(payload);
                    break;
                case "dex":
                    this.changeDex(payload);
                    break;
                case "con":
                    this.changeCon(payload);
                    break;
                case "wis":
                    this.changeWis(payload);
                    break;
                case "int":
                    this.changeInt(payload);
                    break;
                case "cha":
                    this.changeCha(payload);
                    break;
            }
        },
        verifyRange(value){
            if(parseInt(value) > 18){
                value = 18;
            }

            if(parseInt(value) < 8){
                value = 8;
            }

            return value;
        }
    }
}
</script>