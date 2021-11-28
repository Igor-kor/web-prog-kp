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


Vue.component('coin-block', require('./components/coin/CoinBlock.vue').default);
Vue.component('coin-list', require('./components/coin/CoinsList.vue').default);
Vue.component('coin-user-list', require('./components/coinuser/CoinUserList.vue').default);
Vue.component('coin-user-block', require('./components/coinuser/CoinUserBlock.vue').default);
Vue.component('coin-new', require('./components/coin/CoinNew.vue').default);
Vue.component('coin-update', require('./components/coin/CoinUpdate.vue').default);
Vue.component('coin-page', require('./components/coin/CoinPage.vue').default);
Vue.component('coin-desc', require('./components/coin/CoinDesc.vue').default);
Vue.component('image-upload', require('./components/ImageUpload.vue').default);
Vue.component('coin-inputs', require('./components/coin/CoinInputs.vue').default);
Vue.component('coin-user-page', require('./components/coinuser/CoinUserPage.vue').default);
Vue.component('coin-user-update', require('./components/coinuser/CoinUserUpdate.vue').default);
Vue.component('coin-user-inputs', require('./components/coinuser/CoinUserInputs.vue').default);
Vue.component('coin-user-new', require('./components/coinuser/CoinUserNew.vue').default);

Vue.component('mark-list', require('./components/mark/MarkList.vue').default);
Vue.component('mark-block', require('./components/mark/MarkBlock.vue').default);
Vue.component('mark-desc', require('./components/mark/MarkDesc.vue').default);
Vue.component('mark-page', require('./components/mark/MarkPage.vue').default);
Vue.component('mark-new', require('./components/mark/MarkNew.vue').default);
Vue.component('mark-inputs', require('./components/mark/MarkInputs.vue').default);
Vue.component('mark-update', require('./components/mark/MarkUpdate.vue').default);
Vue.component('mark-user-list', require('./components/markuser/MarkUserList.vue').default);
Vue.component('mark-user-block', require('./components/markuser/MarkUserBlock.vue').default);
Vue.component('mark-user-new', require('./components/markuser/MarkUserNew.vue').default);
Vue.component('mark-user-page', require('./components/markuser/MarkUserPage.vue').default);
Vue.component('mark-user-update', require('./components/markuser/MarkUserUpdate.vue').default);
Vue.component('mark-user-inputs', require('./components/markuser/MarkUserInputs.vue').default);

import Multiselect from 'vue-multiselect';
Vue.component('multiselect', Multiselect);

Vue.prototype.$userId = document.querySelector("meta[name='user_id']").getAttribute('content');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import VuePictureSwipe from 'vue-picture-swipe';
Vue.component('vue-picture-swipe', VuePictureSwipe);

const app = new Vue({
    el: '#app',
});



