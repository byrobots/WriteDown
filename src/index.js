/**
 * External
 */
import Navigo from 'navigo';
import Vue from 'vue';

/**
 * Internal
 */
import routes from './routes';
import store from './store';

import './sass/style.scss';

/**
 * Initialise the Vue app.
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
        ViewComponent: { render: h => h() },
    },

    /**
     * Standard data that will always be present.
     */
    beforeMount () {
        store.commit('csrf', writedown.csrf || null);
        store.commit('pagetitle', writedown.pagetitle || null);
    },

    /**
     * Render the page.
     */
    render(h) { return h(this.ViewComponent) },
});

/*
 * Set-up routes.
 */
const router = new Navigo(window.location.hostname);

Object.keys(routes).forEach((path) => {
    router.on(path, () => app.ViewComponent = routes[path]).resolve();
});
