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
      return this.$store.getters.csrf
    },

    /**
     * Return the page's title.
     *
     * @return {String}
     */
    pagetitle () {
      return this.$store.getters.pagetitle
    }
  }
}
