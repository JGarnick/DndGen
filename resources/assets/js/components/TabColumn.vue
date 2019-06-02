<template>
    <div class="column col-6">
        <div class="tabgroup" role="tabgroup">
            <template v-for="( tab, index) in tabs">				
                <v-tab @setActive="setActive" :key="index" :tab="tab" :id="index"></v-tab>						
            </template>
        </div>
        <v-tab-content-parent :tab="activeTab" ></v-tab-content-parent>
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
    },
    computed: {
        activeTab: function(){
            let active = this.tabs.filter((t) => { return t.active; });
            return active[0];
        }
    }
}
</script>