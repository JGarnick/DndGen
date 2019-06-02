<template>
    <a role="tab" aria-controls="" class="tab" :class="active" @click="setActive">
        {{tab.title}}
    </a>
</template>

<script>
export default {
    props: ["tab", "id"],
    methods: {
        setActive(e){
            this.$emit("setActive", this.id);
        }
    },
    computed: {
        active: function(){
            if(this.tab.active){
                return "active";
            }else{
                return "";
            }
        }
    }
}
</script>