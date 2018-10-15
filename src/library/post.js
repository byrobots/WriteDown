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
     * Get the posts index.
     *
     * @returns {Promise}
     */
    async index () {
        return await axios.get('/api/posts');
    }
};
