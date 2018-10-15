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
import mixin from '../../mixins/pages.js';

import './style.scss';

if (document.getElementById('login-page')) {
    new Vue({
        el: '#login-page',
        mixins: [mixin],
        render: h => h(login),
    });
}
