/**
 * External
 */
import Vue from 'vue';

/**
 * Internal
 */
import login from './login.vue';

/**
 * The Vue instance
 */
new Vue({
    components: { login },
    data: () => ({
        pagetitle: '',
    }),
    el: '#login-page',
    render: h => h(login),
});
