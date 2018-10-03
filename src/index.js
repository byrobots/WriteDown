import Vue from 'vue';
import Form from './Form.vue';
import './style.scss';

// Mount the app
const app = new Vue({
    el: '#app',
    render: h => h(Form)
});
