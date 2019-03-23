/**
 * Internal
 */
import API from '../../../library/api'
import spinner from '../../spinner'
import store from '../../../store'

/**
 * The component
 */
export default {
  components: { spinner },
  data: () => ({ tags: null }),
  methods: {},

  /**
   * Once the component is mounted grab the tags from the store.
   */
  mounted: function () {
    this.tags = store.state.tags
  }
}
