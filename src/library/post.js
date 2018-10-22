/**
 * External
 */
const axios = require('axios');

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
     * @returns {Promise}
     */
    async store () {
        return await axios.post('/api/posts/store');
    }
};
