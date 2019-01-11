/**
 * Internal
 */
import store from '../store';

/**
 * Default mixin for all pages.
 */
export default {
    computed: {
        csrf () {
            return this.$store.state.csrf;
        },
        pagetitle () {
            return this.$store.state.pagetitle;
        }
    },
};
