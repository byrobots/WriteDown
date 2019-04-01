/**
 * Internal
 */
import API from '../../../library/api'
import store from '../../../store'
import tagForm from '../form'

/**
 * The component
 */
export default {
  components: { tagForm },
  data: () => ({
    formVisible: false,
    tags: []
  }),
  methods: {
    /**
     * Toggle the tag form's visiblity.
     *
     * @param {Object} event The click event.
     */
    toggleForm (event) {
      event.preventDefault()
      this.formVisible = !this.formVisible
    },

    /**
     * Confirm the user wants to delete the tag before deleting it.
     *
     * @param {Object} event The click event, which will contain the element
     *                       that was clicked.
     */
    confirmDelete (event) {
      event.preventDefault()

      if (window.confirm('Are you sure? This can not be undone.')) {
        const tagID = event.currentTarget.getAttribute('data-tag')

        // Delete from database.
        API.tag().delete(tagID)
          .then(() => {
            // Delete from the page.
            const index = event.srcElement.getAttribute('data-index')
            this.tags.splice(index, 1)
          })
          .catch(() => { /* TODO: Error message */ })
      }
    }
  },

  /**
   * Once the component is mounted grab the tags from the store.
   */
  mounted: function () {
    this.tags = store.state.tags
  }
}
