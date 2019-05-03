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
 * Make requests to the tags endpoint.
 */
export default class Tag {
  /**
   * Attempt to store a new tag.
   *
   * @param {Object} data
   *
   * @return {Promise}
   */
  store (data) {
    data.csrf = store.getters.csrf
    return axios.post('/api/tags/store', qs.stringify(data))
  }

  /**
   * Delete a tag.
   *
   * @param {Integer} tagID
   *
   * @return {Promise}
   */
  delete (tagID) {
    const data = { csrf: store.getters.csrf }
    return axios.post(`/api/tags/${tagID}/delete`, qs.stringify(data))
  }
};
