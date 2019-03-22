/**
 * Internal
 */
import Auth from './endpoints/auth.js'
import Post from './endpoints/post.js'
import Slug from './endpoints/slug.js'

/**
 * Contains the code for work with our API endpoints.
 */
export default {
  auth () {
    return new Auth()
  },

  post () {
    return new Post()
  },

  slug () {
    return new Slug()
  }
}
