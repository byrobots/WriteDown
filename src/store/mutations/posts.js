/**
 * Internal
 */
import getFullHours from '../../helpers/get-full-hours.js'
import getFullMinutes from '../../helpers/get-full-minutes.js'
import getFullSeconds from '../../helpers/get-full-seconds.js'

export default (state, value) => {
  value.forEach((post) => {
    // If we have a publish_at value convert it to a DateTime object. We'll then
    // use that to establish if a post is unpublished, published or scheduled to
    // be published.
    if (post.publish_at !== null) {
      post.publish_at = new Date(post.publish_at.date)
      post.date_string = `${post.publish_at.toLocaleDateString()} at ` +
        `${getFullHours(post.publish_at)}:${getFullMinutes(post.publish_at)}:${getFullSeconds(post.publish_at)}.`
    }
  })

  state.posts = value
}
