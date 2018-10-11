/**
 * External
 */
import Vue from 'vue';

/**
 * Internal
 */
import footerSignoff from '../../components/footer-signoff';
import login from './login.vue';
import loginForm from '../../components/login-form';
import store from '../../store';

import './style.scss';

if (document.getElementById('login-page')) {
    new Vue({
        el: '#login-page',
        beforeMount () {
            store.commit('csrf', this.$el.attributes['data-csrf'].value);
            store.commit('pagetitle', this.$el.attributes['data-pagetitle'].value);
        },
        render: h => h(login),
        store: store,
    });
}
