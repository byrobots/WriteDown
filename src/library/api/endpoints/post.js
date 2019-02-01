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
     * @param {object} data
     *
     * @returns {Promise}
     */
    async store (data) {
        data.csrf = store.state.csrf;
        return await axios.post('/api/posts/store', qs.stringify(data));
    }
};
