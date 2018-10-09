/**
 * External
 */
 import Vue from 'vue';
 import Vuex from 'vuex';

 import 'es6-promise/auto';

/**
 * Set-up our Single Source of Truth.
 */
Vue.use(Vuex);

const store = new Vuex.Store({
    getters: {
        csrf: state => {
            return state.csrf;
        },
        pagetitle: state => {
            return state.pagetitle;
        }
    },
    mutations: {
        csrf (state, value) {
                state.csrf = value;
        },
        pagetitle (state, value) {
            state.pagetitle = value;
        }
    },
    state: {},
});

export default store;
