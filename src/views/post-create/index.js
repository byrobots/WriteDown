/**
 * External
 */
import Vue from 'vue';

/**
 * Internal
 */
import postCreate from './post-create.vue';
import instance from '../../mixins/instance.js';
import wysiwyg from '../../components/wysiwyg';

import './style.scss';

if (document.getElementById('post-create')) {
    new Vue({
        el: '#post-create',
        components: {wysiwyg},
        mixins: [instance],
        render: h => h(postCreate),
    });
}
