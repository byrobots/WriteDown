/**
 * Internal
 */
import store from '../../../store'

/**
 * External
 */
const axios = require('axios')
const qs = require('qs')

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
  login (email, password) {
    const data = {
      csrf: store.getters.csrf,
      email: email,
      password: password
    }

    return axios.post('/api/login', qs.stringify(data))
  }
};
