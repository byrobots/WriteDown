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

            const api = new Post();
            api.store(this.title, this.excerpt, this.body)
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
                `The title ${response.data.title[0]}.` : '';

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
        }
    },
    mounted: function () {
        this.startEditor();
    }
};
