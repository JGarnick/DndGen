<template>
    <div class="column col-6">
        <div class="tabgroup" role="tabgroup">
            <template v-for="( tab, index) in tabs">				
                <v-tab @setActive="setActive" :key="'t-'+index" :tab="tab" :id="index"></v-tab>						
            </template>
        </div>
        <template v-for="( tab, index) in tabs">				
            <v-tabcontent :key="'tc-'+index" v-show="tab.active" ></v-tabcontent>
        </template>
    </div>
</template>

<script>
export default {
    props: ["tabs"],
    methods: {
        setActive: function(id){
            this.tabs.forEach(function(t){
                t.active = false;
            });

            this.tabs[id].active = true;
        },
    }
}
</script>