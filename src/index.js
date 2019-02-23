/**
 * External
 */
import Vue from 'vue';

/**
 * Internal
 */
import './sass/style.scss';
import store from './store';

/**
 * Views
 */
import LoginView from './views/login.vue';
import PostCreate from './views/posts/create.vue';
import PostList from './views/posts/list.vue';

/**
 * Define routes. Links a path to a view by way of `key: value` pairs.
 *
 * @var {Array}
 */
const routes = {
    '/admin/login': LoginView,
    '/admin/posts/new': PostCreate,
    '/admin/posts': PostList,
};

new Vue({
    /**
     * Contains the data store.
     *
     * @var {Object}
     */
    store: store,

    /**
     * The instance's data.
     *
     * @var {Object}
     */
    data: {
        /**
         * The current route. Used to decide which view to render.
         *
         * @link https://vuejs.org/v2/guide/routing.html
         * @var  {String}
         */
        currentRoute: window.location.pathname,
    },

    /**
     * Computed variables.
     *
     * @var {Object}
     */
    computed: {
        /**
         * Returns the view component to render.
         *
         * @return {Object}
         */
        ViewComponent () {
            // TODO: NotFound view.
            return routes[this.currentRoute] || NotFound;
        }
    },

    /**
     * Standard data that will always be present.
     */
    beforeMount () {
        // The generated CSRF token to use with requests.
        store.commit('csrf', this.$el.attributes['data-csrf'].value);

        // The page's title.
        store.commit('pagetitle', this.$el.attributes['data-pagetitle'].value);
    },

    /**
     * Render the page.
     */
    render (h) {
        return h(this.ViewComponent);
    },
}).$mount('#app');
