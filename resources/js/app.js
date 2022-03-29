require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('index.banner', require('./components/page/Banner').default);
Vue.component('header.header', require('./components/page/Header').default);


import router from "./router";

const app = new Vue({
    el: '#blog',
    router
});
