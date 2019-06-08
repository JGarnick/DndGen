<template>
    <div>
        <div class="section" :class="{collapsed:point_buy_collapsed}" @click="expand_collapse">
            <div class="section-heading">Point Buy</div>
            <div v-show="!point_buy_collapsed">Points: {{points}}</div>
            <div class="atts-container point-buy" v-show="!point_buy_collapsed">
                <v-att-selector v-for="(attOb, index) in charAtts" :attOb="attOb" :key="index" @increaseAtt="increase" @decreaseAtt="decrease" @changeVal="changeVal" @validate="validate"></v-att-selector>
            </div>
        </div>

        <div class="section" :class="{collapsed:manual_entry_collapsed}" @click="expand_collapse">
            <div class="section-heading">Manual Entry</div>
            <div class="atts-container manual-entry" v-show="!manual_entry_collapsed">
                <v-att-selector v-for="(attOb, index) in charAtts" :attOb="attOb" :key="index" @increaseAtt="increase" @decreaseAtt="decrease" @changeVal="changeVal" @validate="validate"></v-att-selector>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex';
export default {
    props: [],
    data(){
        return {
            point_buy_collapsed: false,
            manual_entry_collapsed: true,
            charAtts: [
                {attIndex:1, charVal:this.$store.state.char.str},
                {attIndex:2, charVal:this.$store.state.char.dex},
                {attIndex:3, charVal:this.$store.state.char.con},
                {attIndex:4, charVal:this.$store.state.char.int},
                {attIndex:5, charVal:this.$store.state.char.wis},
                {attIndex:6, charVal:this.$store.state.char.cha},
            ],
            points: 27
        }
    },
    methods: {
        expand_collapse(){
            this.point_buy_collapsed = !this.point_buy_collapsed;
            this.manual_entry_collapsed = !this.manual_entry_collapsed;

            if(!this.point_buy_collapsed){
                this.resetAttributes();
            }
        },
        ...mapActions([ // spread operator so that other methods can still be added.
            'changeStr',
            'changeDex',
            'changeCon',
            'changeInt',
            'changeWis',
            'changeCha'
        ]),
        resetAttributes(){
            /*
                str: 15,
                dex: 14,
                con: 13,
                int: 12,
                wis: 10,
                cha: 8,
            */
            let vm = this;
            this.charAtts.forEach(function(ob){
                switch(ob.attIndex){
                    case 1:
                        ob.charVal = 15;
                        vm.changeStr(15);
                        break;
                    case 2:
                        ob.charVal = 14;
                        vm.changeDex(14);
                        break;
                    case 3:
                        ob.charVal = 13;
                        vm.changeCon(13);
                        break;
                    case 4:
                        ob.charVal = 12;
                        vm.changeInt(12);
                        break;
                    case 5:
                        ob.charVal = 10;
                        vm.changeWis(10);
                        break;
                    case 6:
                        ob.charVal = 8;
                        vm.changeCha(8);
                        break;
                }
           });
        },
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
        },
        getPointValue(value){
            switch(value){
                case 8:
                    return 0;
                    break;
                case 9:
                    return 1;
                    break;
                case 10:
                    return 2;
                    break;
                case 11:
                    return 3;
                    break;
                case 12:
                    return 4;
                    break;
                case 13:
                    return 5;
                    break;
                case 14:
                    return 7;
                    break;
                case 15:
                    return 9;
                    break;
                
            }
        }
    }
}
</script>