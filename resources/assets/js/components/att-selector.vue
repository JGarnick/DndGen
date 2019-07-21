<template>
<div>
    <div class="att-header">{{gAtt.abbr}}</div>
    <div class="d-flex">
        <div class="att-input-container">
            <template v-if="displayOnly">
                <div>{{attOb.charVal.val}}</div>
            </template>
            <template v-else>
                <input type="text" class="att-input" :name="gAtt.name" @input="validate" :disabled="disabled" @change="changeVal" v-model="attOb.charVal.val">
                <button class="increase" @click.stop="increaseVal"><span>+</span></button>
                <button class="decrease" @click.stop="decreaseVal"><span>-</span></button>
            </template>
        </div>
    </div>
    <div class="mod-container">
        <div>Mod</div>
        <div>{{attOb.charVal.mod}}</div>
    </div>
</div>
</template>

<script>

export default {
    props: ["attOb", "disabled", "displayOnly"],
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
    }
}
</script>