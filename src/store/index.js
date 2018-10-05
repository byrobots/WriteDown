/**
 * External
 */
 import Vue from 'vue';
 import Vuex from 'vuex';

 import 'es6-promise/auto';

/**
 * Set-up our Single Source of Truth.
 *
 * @see {@link https://vuejs.org/v2/guide/state-management.html|Vue.js documentation}
 * @var {object}
 */
Vue.use(Vuex);

const store = new Vuex.Store({
    getters: {
        pagetitle: state => {
            return state.pagetitle;
        }
    },
    mutations: {
        pagetitle (state, value) {
            state.pagetitle = value;
        }
    },
    state: {},
});

export default store;
