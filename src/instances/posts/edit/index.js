/**
 * External
 */
import Vue from 'vue';

/**
 * Internal
 */
import postEdit from './post-edit.vue';
import instance from '../../../mixins/instance.js';

if (document.getElementById('post-edit')) {
    new Vue({
        el: '#post-edit',
        mixins: [instance],
        render: h => h(postEdit),
    });
}
