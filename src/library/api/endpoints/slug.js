/**
 * Internal
 */
import store from '../../../store'

const axios = require('axios')
const qs = require('qs')

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
  predicted (data) {
    data.csrf = store.getters.csrf
    return axios.post('/api/slugs/predicted', qs.stringify(data))
  }
};
