<template>
    <div class="column col-6">
        <div class="tabgroup">
            <template v-for="( tab, index) in tabs">				
                <v-tab :key="'t-'+index" :tab="tab" class="tab"></v-tab>						
            </template>
        </div>
        <template v-for="( tab, index) in tabs">				
            <v-tabcontent :key="'tc-'+index" v-show="tab.active" class="tab-content"></v-tabcontent>
        </template>
    </div>
</template>

<script>
export default {
    props: ["tabs"],
}
</script>