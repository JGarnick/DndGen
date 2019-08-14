<template>
    <a class="race selectable" :class="activeClass" @click.prevent="setActive">
        {{race.name}}
    </a>
</template>

<script>

export default {
    props: ["race", "active"],
    methods: {
        setActive(){
            this.$emit("setActive", this.race.id, this.racial_bonuses);
        }
    },
    computed:{
        activeClass: function(){
            if( this.active ){
                return "active";
            }

            return "";
        },
        racial_bonuses: function(){
            return this.race.bonuses;
        }
    }
}
</script>