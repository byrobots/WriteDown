/**
 * External
 */
import Vue from 'vue';

/**
 * Internal
 */
import index from './index.vue';
import mixin from '../../mixins/pages.js';

import './style.scss';

if (document.getElementById('post-index')) {
    new Vue({
        el: '#post-index',
        mixins: [mixin],
        render: h => h(index),
    });
}
