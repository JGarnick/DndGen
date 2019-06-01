import Vue from 'vue';
// import Vuex from 'vuex';
// Vue.use(Vuex);

const requireComponent = require.context(
    // The relative path of the components folder
    '../js/components',
    // Whether or not to look in subfolders
    false,
    // The regular expression used to match base component filenames
    /.+.(vue)/
);

requireComponent.keys().forEach(fileName => {

    const componentConfig = requireComponent(fileName)

    const componentName = "v-" + fileName.replace(/^\.\/(.*)\.\w+$/, '$1').toLowerCase();
    
    Vue.component(
        componentName,
        componentConfig.default || componentConfig
    )

});
$(document).ready(() => {
    var app = new Vue({
        el: "#vue-1",
        data(){
            return {
    
            }
        },
    });
    
});
