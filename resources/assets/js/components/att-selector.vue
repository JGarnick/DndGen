<template>
<div>
    <div class="att-header">{{gAtt.abbr}}</div>
    <div class="d-flex">
        <div class="att-input-container">
            <template v-if="displayOnly">
                <div>{{value}}</div>
            </template>
            <template v-else>
                <input type="text" class="att-input" :name="gAtt.name" @input="validate" :disabled="disabled" @change="changeVal" v-model="attOb.charVal.val">
                <button class="increase" @click.stop="increaseVal"><span>+</span></button>
                <button class="decrease" @click.stop="decreaseVal"><span>-</span></button>
            </template>
        </div>
    </div>
</div>
</template>

<script>
import {mixin} from "./../mixins.js";
export default {
    props: ["attOb", "disabled", "displayOnly", "total"],
    mixins: [mixin],
    data(){
        return {
            gAtt: this.$store.state.data.cattributes[this.attOb.attIndex],
        }
    },
    methods: {
        increaseVal(el){
            this.$emit("increaseAtt", this.gAtt, this.attOb);
        },
        decreaseVal(el){
            this.$emit("decreaseAtt", this.gAtt, this.attOb);
        },
        changeVal(el){
            this.$emit("changeVal", this.attOb, el.data, this.gAtt);
        },
        validate(el){
            this.$emit("validate", this.attOb, el.data);
        }
    },
    computed: {
        value(){
            if(this.total){
                return this.getTotal(this.gAtt.abbr.toLowerCase(), this.attOb.charVal.val);
            }
            
        }
    }
}
</script>