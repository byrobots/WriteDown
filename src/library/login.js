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
 * Makes asyncronous login requests with a supplied username and password.
 */
export default class login {
    /**
     * Entry point for usage. Takes an email and password and requests a login.
     *
     * @param {string} email
     * @param {string} password
     *
     * @return {boolean} TRUE if login is successful, otherwise FALSE.
     */
    async make_request (email, password) {
        try {
            const data = {
                csrf: store.state.csrf,
                email: email,
                password: password,
            };

            await axios.post('/api/login', qs.stringify(data));
            return true;
        } catch (error) {
            return false;
        }
    }
};
