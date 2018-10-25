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
     * @param {string} publishAt
     *
     * @returns {Promise}
     */
    async store (title, excerpt, body, publishAt) {
        const data = {
            body: body,
            csrf: store.state.csrf,
            excerpt: excerpt,
            publish_at: publishAt,
            title: title,
        };

        return await axios.post('/api/posts/store', qs.stringify(data));
    }
};
