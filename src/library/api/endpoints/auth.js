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
 * Makes asyncronous login requests with a supplied username and password.
 */
export default class Auth {
    /**
     * Entry point for usage. Takes an email and password and requests a login.
     *
     * @param {string} email
     * @param {string} password
     *
     * @returns {Promise} Will throw an error if login fails.
     */
    async login (email, password) {
        const data = {
            csrf: store.state.csrf,
            email: email,
            password: password,
        };

        return await axios.post('/api/login', qs.stringify(data));
    }
};
