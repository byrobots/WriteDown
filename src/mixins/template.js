/**
 * Internal
 */
import store from '../store';

/**
 * Default mixin for all pages.
 */
export default {
    computed: {
        pagetitle () {
            return this.$store.state.pagetitle;
        }
    },
};
