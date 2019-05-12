/**
 * Internal
 */
import API from '../../../library/api'
import pagination from '../../pagination'
import store from '../../../store'

/**
 * The component
 */
export default {
  components: { pagination },
  computed: {
    /**
     * Returns the current post list from the store.
     *
     * @return {Array}
     */
    posts () {
      return store.getters.posts
    },

    /**
     * Return post pagination data.
     *
     * @return {Object}
     */
    postPagination () {
      return store.getters.postPagination
    }
  },
  data: () => ({ componentKey: 0 }),
  methods: {
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
            // TODO: Request an updated list from the API.
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
  }
}
