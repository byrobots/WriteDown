/**
 * Internal
 */
import store from '../../../store'

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
    data.csrf = store.state.csrf
    return axios.post('/api/tags/store', qs.stringify(data))
  }
};
