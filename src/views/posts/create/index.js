/**
 * External
 */
import Vue from 'vue';

/**
 * Internal
 */
import postCreate from './post-create.vue';
import instance from '../../../mixins/instance.js';

if (document.getElementById('post-create')) {
    new Vue({
        el: '#post-create',
        mixins: [instance],
        render: h => h(postCreate),
    });
}
