/**
 * External
 */
const axios = require('axios');
const qs    = require('qs');

/**
 * Internal
 */
import store from '../../../store';

/**
 * Make requests to the posts endpoint.
 */
export default class Post {
    /**
     * Attempt to store a new post.
     *
     * @param {Object} data
     *
     * @return {Promise}
     */
    store (data) {
        data.csrf = store.state.csrf;
        return axios.post('/api/posts/store', qs.stringify(data));
    }

    /**
     * Update a single post.
     *
     * @param {Integer} postID
     * @param {Object}  data
     *
     * @return {Promise}
     */
    update (postId, data) {
        data.csrf = store.state.csrf;
        return axios.post(`/api/posts/${postId}/update`, qs.stringify(data));
    }

    /**
     * Delete a post.
     *
     * @param {Integer} postID
     *
     * @return {Promise}
     */
    delete (postID) {
        const data = { csrf: store.state.csrf };
        return axios.post(`/api/posts/${postID}/delete`, qs.stringify(data));
    }
};
