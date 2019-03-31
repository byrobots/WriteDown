/**
 * External
 */
import Vue from 'vue'

/**
 * Internal
 */
import API from '../../../library/api'
import errorIcon from '../../error-icon'
import spinner from '../../spinner'
import store from '../../../store'
import successIcon from '../../success-icon'

/**
 * The component.
 */
export default {
  components: { errorIcon, spinner, successIcon },
  data: () => ({
    errors: { tag: null },
    tag: { tag: '' },
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
      const data = { tag: this.tag.tag }
      API.tag().store(data)
        .then(this.successfulStore)
        .catch(response => this.failedStore(response))
    },

    /**
     * Handles a successful store attempt.
     */
    successfulStore () {
      this.showSpinner = false
      this.showSuccessIcon = true

      setTimeout(() => { }, 500)
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
      this.errors.tag = typeof response.data.tag !== 'undefined'
        ? `The tag ${response.data.title[0]}.` : null

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
