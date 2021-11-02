/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('coin-block', require('./components/CoinBlock.vue').default);
Vue.component('coin-list', require('./components/CoinsList.vue').default);
Vue.component('coin-user-list', require('./components/CoinUserList.vue').default);
Vue.component('coin-user-block', require('./components/CoinUserBlock.vue').default);
Vue.component('coin-new', require('./components/CoinNew.vue').default);
Vue.component('coin-update', require('./components/CoinUpdate.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
