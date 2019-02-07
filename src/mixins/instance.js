/**
 * Internal
 */
import store from '../store';

/**
 * Default mixin for all instances.
 */
export default {
    beforeMount () {
        // The generated CSRF token to use with requests.
        store.commit('csrf', this.$el.attributes['data-csrf'].value);

        // The page's title.
        store.commit('pagetitle', this.$el.attributes['data-pagetitle'].value);
    },
    store: store,
};
