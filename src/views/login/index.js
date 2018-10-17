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
import instance from '../../mixins/instance.js';

import './style.scss';

if (document.getElementById('login')) {
    new Vue({
        el: '#login',
        mixins: [instance],
        render: h => h(login),
    });
}
