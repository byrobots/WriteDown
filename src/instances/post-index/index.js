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
        /**
         * Add the Post's ID to the store so it can be retrieved later.
         */
        beforeMount () {
            store.commit('postID', this.$el.attributes['data-post-id'].value);
        },
        el: '#post-index',
        mixins: [instance],
        render: h => h(postIndex),
    });
}
