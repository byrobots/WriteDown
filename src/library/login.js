/**
 * External
 */
const axios = require('axios');

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
            await axios.post('/api/login', {
                csrf: store.state.csrf,
                email: email,
                password: password,
            }, {
                withCredentials: true,
            });

            return true;
        } catch (error) {
            console.log(error);
            return false;
        }
    }
};
