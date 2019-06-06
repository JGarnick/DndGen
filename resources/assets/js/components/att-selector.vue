<template>
<div class="att-input-container">
    <input type="text" class="att-input" :name="gAtt.name" :value="attOb.charVal" @input="changeVal" @change="verifyRange">
    <button class="increase" @click.stop="increaseVal"><span>+</span></button>
    <button class="decrease" @click.stop="decreaseVal"><span>-</span></button>
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
    mounted(){
        
    },
    methods: {
        increaseVal(el){
            console.log(el.target);

        },
        decreaseVal(el){

        },
        changeVal(el){
            if( isNaN( parseInt(el.data) ) ){
                el.target.value = el.target.value.slice(0, -1);
            }
        },
        verifyRange(el){
            if(parseInt(el.target.value) > 30){
                el.target.value = 30;
            }

            if(parseInt(el.target.value) < 8){
                el.target.value = 8;
            }
        }
    },
    computed:{
        
    }
}
</script>