/**
 * External
 */
import flatPickr from 'vue-flatpickr-component'
import * as SimpleMDE from 'simplemde'
import Vue from 'vue'

/**
 * Internal
 */
import store from '../../../store'

/**
 * Components
 */
import errorIcon from '../../error-icon'
import spinner from '../../spinner'
import successIcon from '../../success-icon'

/**
 * Classes
 */
import API from '../../../library/api'

/**
 * The component.
 */
export default {
  components: { errorIcon, flatPickr, spinner, successIcon },
  data: () => ({
    action: '',
    errors: {
      title: null,
      publishAt: null,
      excerpt: null,
      body: null
    },
    post: {
      id: '',
      title: '',
      defaultSlug: 'Add a title to generate the URL',
      slug: '',
      publishAt: '',
      excerpt: '',
      body: ''
    },
    editor: null,
    showErrorIcon: false,
    showForm: true,
    showSpinner: false,
    showSuccessIcon: false
  }),
  methods: {
    /**
     * Get the predicted slug base don the post's title.
     */
    predictedSlug: function () {
      // If the post object is set don't re-generate the slug.
      // TODO: Allow slugs to set manually, or changed.
      if (store.state.post !== null) {
        return
      }

      const data = { title: this.post.title }
      if (data.title.length === 0) {
        this.post.slug = this.post.defaultSlug
        return
      }

      API.slug().predicted(data)
        .then(response => { this.post.slug = response.data.data })
        .catch(this.post.slug = 'Failed to get slug.')
    },

    /**
     * Try to store the post.
     *
     * @param {Object} event
     */
    attemptStore (event) {
      event.preventDefault()
      this.showForm = false
      this.showSpinner = true

      // Get the content from MDE (bindings don't work properly with it)
      // and clear any existing errors.
      this.clearErrors()
      this.post.body = this.editor.value()

      // Now make the API request.
      const data = {
        body: this.post.body,
        excerpt: this.post.excerpt,
        publish_at: this.post.publishAt,
        title: this.post.title
      }

      if (store.state.post !== null) {
        // Post is set in the store, update the existing record.
        API.post().update(store.state.post.id, data)
          .then(this.successfulStore)
          .catch(response => this.failedStore(response))
        return
      }

      // Create
      API.post().store(data)
        .then(this.successfulStore)
        .catch(response => this.failedStore(response))
    },

    /**
     * Handles a successful store attempt.
     */
    successfulStore () {
      this.showSpinner = false
      this.showSuccessIcon = true

      setTimeout(() => {
        window.location.href = '/admin/posts'
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
      this.errors.title = typeof response.data.title !== 'undefined'
        ? `The post's title ${response.data.title[0]}.` : null

      this.errors.excerpt = typeof response.data.excerpt !== 'undefined'
        ? `The excerpt ${response.data.excerpt[0]}.` : null

      this.errors.publishAt = typeof response.data.publish_at !== 'undefined'
        ? `The "Publish at" field ${response.data.publish_at[0]}.` : null

      this.errors.body = typeof response.data.body !== 'undefined'
        ? `The body ${response.data.body[0]}.` : null

      // After a moment show the form with the errors.
      setTimeout(() => {
        this.showErrorIcon = false
        this.showForm = true

        // Wait until the DOM is loaded and re-initialise the editor.
        Vue.nextTick().then(() => this.startEditor())
      }, 500)
    },

    /**
     * Turn the post's body content field into a fancy editor.
     */
    startEditor () {
      this.editor = new SimpleMDE({
        element: document.getElementById('post-body')
      })

      this.editor.value(this.post.body)
    },

    /**
     * Clear out any existing errors.
     */
    clearErrors () {
      this.errors.body = null
      this.errors.excerpt = null
      this.errors.publishAt = null
      this.errors.title = null
    }
  },

  /**
     * When the component is mounted set the default slug and start the fancy
     * content editor.
     */
  mounted () {
    this.post.slug = this.post.defaultSlug

    // If the post is available in the global store use the data provided.
    if (store.state.post !== null) {
      let publishAt = ''
      if (store.state.post.publish_at !== null) {
        publishAt = new Date(store.state.post.publish_at.date)
      }

      this.post.id = store.state.post.id
      this.post.title = store.state.post.title
      this.post.slug = store.state.post.slug
      this.post.publishAt = publishAt
      this.post.excerpt = store.state.post.excerpt
      this.post.body = store.state.post.body
    }

    this.startEditor()
  }
}
