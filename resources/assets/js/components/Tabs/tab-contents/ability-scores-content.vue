<template>
    <div>
        <div class="section" :class="{collapsed:point_buy_collapsed}" >
            <div class="section-heading point-buy" @click="expand_collapse">Point Buy</div>
            <div v-show="!point_buy_collapsed">Points: {{points}}</div>
            <div class="atts-container " v-show="!point_buy_collapsed">
                <v-att-selector v-for="(attOb, index) in charAtts" :disabled="true" :attOb="attOb" :key="index" @increaseAtt="increasePB" @decreaseAtt="decreasePB" @changeVal="changeVal" @validate="validate" :display-only="false"></v-att-selector>
            </div>
        </div>

        <div class="section" :class="{collapsed:manual_entry_collapsed}" >
            <div class="section-heading manual-entry" @click="expand_collapse" >Manual Entry</div>
            <div class="atts-container " v-show="!manual_entry_collapsed">
                <v-att-selector v-for="(attOb, index) in charAtts" :attOb="attOb" :disabled="false" :key="index" @increaseAtt="increase" @decreaseAtt="decrease" @changeVal="changeVal" @validate="validate" :display-only="false"></v-att-selector>
            </div>
        </div>
        <div class="misc-row d-flex">
            <span v-for="(a, b) in charAtts" :key="b">+</span>
        </div>
        <div class="center">Racial Bonuses ({{getRace('name')}})</div>
        <div class="misc-row d-flex">
            <span v-for="(att, i) in charAtts" :key="i">{{bonus(getAtt(att.attIndex).abbr.toLowerCase(), 'race')}}</span>
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex';
import { mixin } from '../../../../src/mixins.js'; 
export default { 
    props: [], 
    mixins: [mixin],  
    data(){
        return {
            point_buy_collapsed: true,
            manual_entry_collapsed: false,
            charAtts: [
                {attIndex:1, charVal:this.$store.state.char.str},
                {attIndex:2, charVal:this.$store.state.char.dex},
                {attIndex:3, charVal:this.$store.state.char.con},
                {attIndex:4, charVal:this.$store.state.char.int},
                {attIndex:5, charVal:this.$store.state.char.wis},
                {attIndex:6, charVal:this.$store.state.char.cha},
            ],
            points: 27,
        }
    },
    methods: {
        getAtt(attIndex){
            return this.$store.state.data.cattributes[attIndex];
        },
        expand_collapse(el){
            this.point_buy_collapsed = !this.point_buy_collapsed;
            this.manual_entry_collapsed = !this.manual_entry_collapsed;
            
            if(this.point_buy_collapsed){
                this.resetAttributes();
            }else{
                this.setAttributesBase();
                this.points = 27;
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
        setAttributesBase(){
            /*
                str: 8,
                dex: 8,
                con: 8,
                int: 8,
                wis: 8,
                cha: 8
            */
            let vm = this;
            this.charAtts.forEach(function(ob){
                switch(ob.attIndex){
                    case 1:
                        ob.charVal.val = 8;
                        ob.charVal.mod = -1;
                        vm.changeStr({val: ob.charVal.val, mod: ob.charVal.mod});
                        break;
                    case 2:
                        ob.charVal.val = 8;
                        ob.charVal.mod = -1;
                        vm.changeDex({val: ob.charVal.val, mod: ob.charVal.mod});
                        break;
                    case 3:
                        ob.charVal.val = 8;
                        ob.charVal.mod = -1;
                        vm.changeCon({val: ob.charVal.val, mod: ob.charVal.mod});
                        break;
                    case 4:
                        ob.charVal.val = 8;
                        ob.charVal.mod = -1;
                        vm.changeInt({val: ob.charVal.val, mod: ob.charVal.mod});
                        break;
                    case 5:
                        ob.charVal.val = 8;
                        ob.charVal.mod = -1;
                        vm.changeWis({val: ob.charVal.val, mod: ob.charVal.mod});
                        break;
                    case 6:
                        ob.charVal.val = 8;
                        ob.charVal.mod = -1;
                        vm.changeCha({val: ob.charVal.val, mod: ob.charVal.mod});
                        break;
                }
           });
        },
        resetAttributes(){
            /*
                str: 15,
                dex: 14,
                con: 13,
                int: 12,
                wis: 10,
                cha: 8
            */
            let vm = this;
            this.charAtts.forEach(function(ob){
                switch(ob.attIndex){
                    case 1:
                        ob.charVal.val = 15;
                        ob.charVal.mod = 2;
                        vm.changeStr({val: ob.charVal.val, mod: ob.charVal.mod});
                        break;
                    case 2:
                        ob.charVal.val = 14;
                        ob.charVal.mod = 2;
                        vm.changeDex({val: ob.charVal.val, mod: ob.charVal.mod});
                        break;
                    case 3:
                        ob.charVal.val = 13;
                        ob.charVal.mod = 1;
                        vm.changeCon({val: ob.charVal.val, mod: ob.charVal.mod});
                        break;
                    case 4:
                        ob.charVal.val = 12;
                        ob.charVal.mod = 1;
                        vm.changeInt({val: ob.charVal.val, mod: ob.charVal.mod});
                        break;
                    case 5:
                        ob.charVal.val = 10;
                        ob.charVal.mod = 0;
                        vm.changeWis({val: ob.charVal.val, mod: ob.charVal.mod});
                        break;
                    case 6:
                        ob.charVal.val = 8;
                        ob.charVal.mod = -1;
                        vm.changeCha({val: ob.charVal.val, mod: ob.charVal.mod});
                        break;
                }
           });
        },
        increasePB(global, local){
            let att = global.abbr.toLowerCase();
            
            //Before actually reducing the value, test it and make sure there are enough points to detract
            let test = local.charVal.val + 1;
            if(test > 15){ return; }
            let point_cost = this.getPointValue(parseInt(test));
            let refund = this.getPointValue(parseInt(local.charVal.val));
            let points_after = (this.points + refund) - point_cost;

            if( points_after >= 0 ){
                this.points += refund;
                this.points -= point_cost;
                local.charVal.val++;
                local.charVal.mod = this.getMod(local.charVal.val);
                
                this.changeCharAttribute(att, {val: local.charVal.val, mod: local.charVal.mod});
            }
        },
        increase(global, local){
            //get the ability, get the value, check against min and max, update character ability
            
            let att = global.abbr.toLowerCase();
            local.charVal.val++;
            local.charVal.val = this.verifyRange(local.charVal.val);
            local.charVal.mod = this.getMod(local.charVal.val);
            console.log(local.charVal.mod);
            this.changeCharAttribute(att, {val: local.charVal.val, mod: local.charVal.mod});
        },
        decrease(global, local){
            let att = global.abbr.toLowerCase();
            local.charVal.val--;
            local.charVal.val = this.verifyRange(local.charVal.val);
            local.charVal.mod = this.getMod(local.charVal.val);
            console.log(local.charVal.mod);
            this.changeCharAttribute(att, {val: local.charVal.val, mod: local.charVal.mod});
        },
        decreasePB(global, local){
            let att = global.abbr.toLowerCase();

            //Before actually reducing the value, test it and make sure there are enough points to detract
            let test = local.charVal.val - 1;
            if(test < 8){ return; }
            let point_cost = this.getPointValue(parseInt(test));
            let refund = this.getPointValue(parseInt(local.charVal.val));
            let points_after = (this.points + refund) - point_cost;
            if( points_after <= 27 ){
                this.points += refund;
                this.points -= point_cost;
                local.charVal.val--;
                local.charVal.mod = this.getMod(local.charVal.val);
                this.changeCharAttribute(att, {val: local.charVal.val, mod: local.charVal.mod});
            }
        },
        validate(local, data){
            if( isNaN( parseInt(data) ) ){
                local.charVal.val = local.charVal.val.slice(0, -1);
                return;
            }
        },
        changeVal(local, data, global){
            let att = global.abbr.toLowerCase();
            local.charVal.val = this.verifyRange(local.charVal.val);
            local.charVal.mod = this.getMod(local.charVal.val);
            this.changeCharAttribute(att, {val: local.charVal.val, mod: local.charVal.mod});
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
    },
    
}
</script>