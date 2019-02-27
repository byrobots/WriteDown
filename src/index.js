/**
 * External
 */
import Vue from 'vue';
import Page from 'page';

/**
 * Internal
 */
import store from './store';
import routes from './routes';

import './sass/style.scss';

/**
 * Initialise the Vue app.
 *
 * Routing based on:
 * https://github.com/chrisvfritz/vue-2.0-simple-routing-example/tree/pagejs
 */
const app = new Vue({
    /**
     * Element to render the view in.
     *
     * @var {String}
     */
    el: '#app',

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
        ViewComponent: {},
    },

    /**
     * Standard data that will always be present.
     */
    beforeMount () {
        store.commit('csrf', this.$el.attributes['data-csrf'].value);
        store.commit('pagetitle', this.$el.attributes['data-pagetitle'].value);
    },

    /**
     * Render the page.
     */
    render (h) {
        return h(this.ViewComponent);
    },
});

/**
 * Set-up routes.
 */
Object.keys(routes).forEach((component, path) => {
    Page(path, () => app.ViewComponent = component);
});

Page('*', () => app.ViewComponent = require('./views/404.vue'));
Page();
