/**
 * External
 */
import Vue from 'vue';

/**
 * Internal
 */
import store from '../../store';
import login from './login.vue';
import loginform from '../../components/loginform';
import footersignoff from '../../components/footer-signoff';
import './style.scss';

new Vue({
    beforeMount () {
        store.commit('pagetitle', this.$el.attributes['data-pagetitle'].value);
    },
    components: { loginform },
    el: '#login-page',
    render: h => h(login),
    store: store,
});
