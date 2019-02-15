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
     * Retrieve available posts.
     *
     * TODO: Handle pagination.
     *
     * @return {Promise}
     */
    index () {
        return axios.get('/api/posts');
    }

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
     * Get a single post.
     *
     * @param {Integer} postId
     *
     * @return {Promise}
     */
    get (postId) {
        return axios.get(`/api/posts/${postId}`);
    }

    /**
     * Delete a post.
     *
     * @param {Integer} postID
     *
     * @return {Promise}
     */
    delete (postID) {
        const data = {csrf: store.state.csrf};
        return axios.post(`/api/posts/${postID}/delete`, qs.stringify(data));
    }
};
