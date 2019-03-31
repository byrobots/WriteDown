/**
 * Internal
 */
import tagForm from '../form'
import store from '../../../store'

/**
 * The component
 */
export default {
  components: { tagForm },
  data: () => ({
    formVisible: false,
    tags: null
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
    }
  },

  /**
   * Once the component is mounted grab the tags from the store.
   */
  mounted: function () {
    this.tags = store.state.tags
  }
}
