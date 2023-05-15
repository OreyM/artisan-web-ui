import Vue from 'vue';
import Vuex from 'vuex';

/* Artisan */
import cache from './artisan/cache';
import database from './artisan/database';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {},
    mutations: {},
    getters: {},
    actions: {},
    modules: {
        cache,
        database,
    },
});
