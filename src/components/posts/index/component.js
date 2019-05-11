/**
 * Internal
 */
import API from '../../../library/api'
import getFullHours from '../../../helpers/get-full-hours.js'
import getFullMinutes from '../../../helpers/get-full-minutes.js'
import getFullSeconds from '../../../helpers/get-full-seconds.js'
import pagination from '../../pagination'
import store from '../../../store'

/**
 * The component
 */
export default {
  components: { pagination },
  data: () => ({
    componentKey: 0,
    postPagination: [],
    posts: []
  }),
  methods: {
    /**
     * Use the response from the API call to populate the posts list.
     */
    populateList () {
      this.posts.forEach((post) => {
        // If we have a publish_at value convert it to a DateTime
        // object. We'll then use that to establish if a post is
        // unpublished, published or scheduled to be published.
        if (post.publish_at !== null) {
          const dateObject = new Date(post.publish_at.date)
          post.publish_at = dateObject
          post.date_string = `${dateObject.toLocaleDateString()} at
            ${getFullHours(dateObject)}:${getFullMinutes(dateObject)}:${getFullSeconds(dateObject)}.`
        }
      })
    },

    /**
     * Confirm the user wants to delete the post. When confirmed the post
     * will be deleted.
     *
     * @param {Object} event The click event, which will contain the element
     *                       that was clicked.
     */
    confirmDelete (event) {
      event.preventDefault()

      if (window.confirm('Are you sure? This can not be undone.')) {
        const postID = event.currentTarget.getAttribute('data-post')

        // Delete from database.
        API.post().delete(postID)
          .then(() => {
            // Delete from the page.
            const index = event.target.getAttribute('data-index')
            this.posts.splice(index, 1)
          })
          .catch(() => { /* TODO: Error message */ })
      }
    },

    /**
     * Called when the pagination component emits the `gotoPage` event. Will
     * request the post index API endpoint and request the selected page.
     *
     * @param {Integer} page The page to request.
     */
    gotoPage (page) {
      API.post().index(page)
        .then((response) => {
          // Update the store.
          store.commit('posts', response.data.data)
          store.commit('postPagination', response.data.meta)

          // Force the pagination component to be re-rendered.
          this.populateList()
          this.componentKey++
        }).catch(() => { /* TODO: Error message */ })
    }
  },

  /**
   * When the view is loaded we'll run some transformations on the post data so
   * it can be worked with in the view itself.
   */
  mounted: function () {
    this.postPagination = store.getters.postPagination
    this.posts = store.getters.posts

    this.populateList()
  }
}
