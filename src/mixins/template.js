/**
 * Default mixin for all pages.
 */
export default {
  computed: {
    /**
     * Get the generated CSRF token to use when making requests.
     *
     * @return {String}
     */
    csrf () {
      return this.$store.state.csrf
    },

    /**
     * Return the page's title.
     *
     * @return {String}
     */
    pagetitle () {
      return this.$store.state.pagetitle
    }
  }
}
