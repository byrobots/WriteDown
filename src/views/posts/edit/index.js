/**
 * External
 */
import Vue from 'vue';

/**
 * Internal
 */
import API from '../../../library/api';
import instance from '../../../mixins/instance.js';
import postEdit from './post-edit.vue';
import store from '../../../store';

if (document.getElementById('post-edit')) {
    new Vue({
        beforeMount () {
            const postId = this.$el.attributes['data-post-id'].value;
            API.post().get(postId)
                .then((response) => store.commit('post', response.data.data))
                .catch(/* TODO: Error message */);
        },
        el: '#post-edit',
        mixins: [instance],
        render: h => h(postEdit),
    });
}
