/**
 * External
 */
 import Vue from 'vue';
 import Vuex from 'vuex';

 import 'es6-promise/auto';

 /**
  * Internal.
  */
 import getters from './getters';
 import mutations from './mutations';

/**
 * Set-up our Single Source of Truth.
 */
Vue.use(Vuex);

const store = new Vuex.Store({
    getters: getters,
    mutations: mutations,
    state: {},
});

export default store;
