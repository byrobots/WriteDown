/**
 * External
 */
import Vue from 'vue';

/**
 * Internal
 */
import footersignoff from '../../components/footer-signoff';
import login from './login.vue';
import loginform from '../../components/loginform';
import store from '../../store';

import './style.scss';

new Vue({
    beforeMount () {
        store.commit('csrf', this.$el.attributes['data-csrf'].value);
        store.commit('pagetitle', this.$el.attributes['data-pagetitle'].value);
    },
    el: '#login-page',
    render: h => h(login),
    store: store,
});
