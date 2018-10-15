/**
 * External
 */
import Vue from 'vue';

/**
 * Internal
 */
import index from './index.vue';
import instance from '../../mixins/instance.js';
import Post from '../../library/post.js';
import store from '../../store';

import './style.scss';

if (document.getElementById('post-index')) {
    new Vue({
        el: '#post-index',
        mixins: [instance],
        beforeMount () {
            const api = new Post();
            api.index()
                .then((response) => {
                    store.commit('posts', response.data.data);
                }).catch((response) => {
                    // TODO
                });
        },
        render: h => h(index),
    });
}
