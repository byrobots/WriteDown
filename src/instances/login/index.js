/**
 * External
 */
import Vue from 'vue';

/**
 * Internal
 */
import login from './login.vue';
import instance from '../../mixins/instance.js';

if (document.getElementById('login')) {
    new Vue({
        el: '#login',
        mixins: [instance],
        render: h => h(login),
    });
}
