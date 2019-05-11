/**
 * The component.
 */
export default {
  data: () => ({ }),
  methods: {
    /**
     * Emits an event so the parent view knows which page to request from the
     * API.
     *
     * @param {Integer} page Page to retrieve.
     */
    gotoPage (page) {
      this.$emit('gotoPage', page)
    }
  },
  props: {
    pagination: Object
  }
}
