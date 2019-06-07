<template>
<div>
    <div class="att-header">{{gAtt.abbr}}</div>
    <div class="d-flex">
        <div class="att-input-container">
            <input type="text" class="att-input" :name="gAtt.name" @input="validate" @change="changeVal" v-model="attOb.charVal">
            <button class="increase" @click.stop="increaseVal"><span>+</span></button>
            <button class="decrease" @click.stop="decreaseVal"><span>-</span></button>
        </div>
    </div>
</div>
</template>

<script>

export default {
    props: ["attOb"],
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
    computed:{
        
    }
}
</script>