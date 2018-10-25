/**
 * External
 */
const axios = require('axios');
const qs    = require('qs');

/**
 * Internal
 */
import store from '../store';

/**
 * Make requests to the posts endpoint.
 */
export default class Post {
    /**
     * Attempt to store a new post.
     *
     * @param {string} title
     * @param {string} excerpt
     * @param {string} body
     *
     * @returns {Promise}
     */
    async store (title, excerpt, body) {
        const data = {
            body: body,
            csrf: store.state.csrf,
            excerpt: excerpt,
            title: title,
        };

        return await axios.post('/api/posts/store', qs.stringify(data));
    }
};
