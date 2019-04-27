/**
 * Internal
 */
import API from '../../../library/api'
import errorIcon from '../../error-icon'
import spinner from '../../spinner'
import successIcon from '../../success-icon'

/**
 * The component.
 */
export default {
  components: { errorIcon, spinner, successIcon },
  data: () => ({
    errors: { name: null },
    tag: { name: '' },
    showErrorIcon: false,
    showForm: true,
    showSpinner: false,
    showSuccessIcon: false
  }),
  methods: {
    /**
     * Try to store the tag.
     *
     * @param {Object} event
     */
    attemptStore (event) {
      event.preventDefault()
      this.showForm = false
      this.showSpinner = true

      // Clear any existing errors.
      this.clearErrors()

      // Now make the API request.
      const data = { name: this.tag.name }
      API.tag().store(data)
        .then(this.successfulStore)
        .catch(response => this.failedStore(response))
    },

    /**
     * Handles a successful store attempt.
     *
     * @param {Object} response The API's response.
     */
    successfulStore (response) {
      this.showSpinner = false
      this.showSuccessIcon = true

      setTimeout(() => {
        this.showSuccessIcon = false
        this.showForm = true
        this.$parent.tags.push(response.data.data)
      }, 500)
    },

    /**
     * Handle a failed store attempt.
     *
     * @param {Object} error The response from the API request.
     */
    failedStore (error) {
      this.showSpinner = false
      this.showErrorIcon = true
      const response = error.response.data

      // Set errors
      this.errors.name = typeof response.data.name !== 'undefined'
        ? `The tag name ${response.data.name[0]}.` : null

      // After a moment show the form with the errors.
      setTimeout(() => {
        this.showErrorIcon = false
        this.showForm = true
      }, 500)
    },

    /**
     * Clear out any existing errors.
     */
    clearErrors () {
      this.errors.tag = null
    }
  }
}
