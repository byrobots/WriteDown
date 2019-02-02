/**
 * External
 */
import Vue from 'vue';

/**
 * Internal
 */
import postIndex from './post-index.vue';
import instance from '../../mixins/instance.js';

if (document.getElementById('post-index')) {
    new Vue({
        el: '#post-index',
        mixins: [instance],
        render: h => h(postIndex),
    });
}
