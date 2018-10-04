import Vue from 'vue';

/**
 * Components.
 */
import LoginForm from './components/LoginForm.vue';

/**
 * Import general style rules.
 */
import './style.scss';

/**
 * Now we can mount the app.
 */
const app = new Vue({
    el: '#app',
    render: h => h(Form)
});
