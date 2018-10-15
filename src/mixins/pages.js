/**
 * Internal
 */
import store from '../store';

/**
 * Default mixin for all pages.
 */
export default {
    beforeMount () {
        store.commit('csrf', this.$el.attributes['data-csrf'].value);
        store.commit('pagetitle', this.$el.attributes['data-pagetitle'].value);
    },
    store: store,
};
