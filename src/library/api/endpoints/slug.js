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
 * Make requests to the slugs endpoint.
 */
export default class Slug {
    /**
     * Attempt to get the predicted slug of a post based on it's title.
     *
     * @param {object} data
     *
     * @returns {Promise}
     */
    async predicted (data) {
        data.csrf = store.state.csrf;
        return await axios.post('/api/slugs/predicted', qs.stringify(data));
    }
};
