import Vue from 'vue';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
import store from '../store';

import TestComponent from '../components/TestComponent';
import ClearCacheComponent from '../components/navigation/ClearCacheComponent';
import CreateNewTableComponent from '../components/CreateNewTableComponent';

window._ = require('lodash');

window.axios = require('axios');
window.axios.defaults.headers.get['Content-Type'] = 'application/json;charset=utf-8';
window.axios.defaults.headers.post['Content-Type'] = 'application/json;charset=utf-8';
window.axios.defaults.baseURL = '/api/v1';
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['X-CSRF-TOKEN'] = window.CSRF.csrfToken;

Vue.config.productionTip = false;

Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

new Vue({
    el: '#app',
    store,
    components: {
        'test-component': TestComponent,
        'clear-cache': ClearCacheComponent,
        'create-new-table-component': CreateNewTableComponent,
    },
});
