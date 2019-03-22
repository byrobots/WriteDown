/**
 * External
 */
import Vue from 'vue'
import Vuex from 'vuex'

/**
 * Internal
 */
import getters from './getters'
import mutations from './mutations'

/**
 * Set-up WriteDown's data store.
 */
Vue.use(Vuex)

const store = new Vuex.Store({
  getters: getters,
  mutations: mutations,
  state: {}
})

export default store
