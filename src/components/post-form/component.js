/**
 * External
 */
import Vue from 'vue';

/**
 * Components
 */
import errorIcon from '../error-icon';
import spinner from '../spinner';
import successIcon from '../success-icon';

/**
 * Classes
 */
import Post from '../../library/post.js';

/**
 * The component's defintion
 */
export default {
    components: {errorIcon, spinner, successIcon},
    data: () => ({
        action: '',
        errors: {
            body: '',
            excerpt: '',
            title: '',
        },
        post: {
            body: '',
            excerpt: '',
            slug: 'Add a title to generate the URL',
            title: '',
        },
        editor: null,
        showErrorIcon: false,
        showForm: true,
        showSpinner: false,
        showSuccessIcon: false,
    }),
    methods: {
        /**
         * Try to store the post.
         */
        attemptStore: function () {
            event.preventDefault();
            this.showForm    = false;
            this.showSpinner = true;

            // Get the content from MDE (bindings don't work properly with it)
            // and clear any existing errors.
            this.clearErrors();
            this.post.body = this.editor.value();

            // Now make the API request.
            const api = new Post();
            api.store(this.post.title, this.post.excerpt, this.post.body)
                .then(response => this.successfulStore())
                .catch(response => this.failedStore(response));
        },

        /**
         * Handles a successful store attempt.
         */
        successfulStore: function () {
            this.showSpinner     = false;
            this.showSuccessIcon = true;

            setTimeout(() => {
                // TODO: Send the user somewhere.
            }, 500);
        },

        /**
         * Handle a failed store attempt.
         *
         * @param {object} error The response from the API request.
         */
        failedStore: function (error) {
            this.showSpinner   = false;
            this.showErrorIcon = true;
            const response     = error.response.data;

            // Set errors
            this.errors.title = 'undefined' !== typeof response.data.title ?
                `The post\'s title ${response.data.title[0]}.` : '';

            this.errors.excerpt = 'undefined' !== typeof response.data.excerpt ?
                `The excerpt ${response.data.excerpt[0]}.` : '';

            this.errors.body = 'undefined' !== typeof response.data.body ?
                `The body ${response.data.body[0]}.` : '';

            // After a moment show the form with the errors.
            setTimeout(() => {
                this.showErrorIcon = false;
                this.showForm      = true;

                // Wait until the DOM is loaded and re-initialise the editor.
                Vue.nextTick().then(() => this.startEditor());
            }, 500);
        },

        /**
         * Turn the post's body content field into a fancy editor.
         */
        startEditor: function () {
            this.editor = new SimpleMDE({
                element: document.getElementById('post-body'),
            });

            this.editor.value(this.post.body);
        },

        /**
         * Clear out any existing errors.
         */
        clearErrors: function () {
            this.errors.body    = '';
            this.errors.excerpt = '';
            this.errors.title   = '';
        },
    },
    mounted: function () {
        this.startEditor();
    }
};
