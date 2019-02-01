/**
 * External
 */
import Vue from 'vue';
import flatPickr from 'vue-flatpickr-component';

/**
 * Components
 */
import errorIcon from '../error-icon';
import spinner from '../spinner';
import successIcon from '../success-icon';

/**
 * Classes
 */
import API from '../../library/api';

/**
 * The component's defintion
 */
export default {
    components: {errorIcon, flatPickr, spinner, successIcon},
    data: () => ({
        action: '',
        dateTimeConfig: {
            altInput: true,
            dateFormat: 'Y-m-d H:i:S',
            enableTime: true,
            time_24hr: true,
        },
        errors: {
            body: null,
            excerpt: null,
            publishAt: null,
            title: null,
        },
        post: {
            body: '',
            defaultSlug: 'Add a title to generate the URL',
            excerpt: '',
            publishAt: '',
            slug: '',
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
         * Get the predicted slug base don the post's title.
         */
        predictedSlug: function () {
            const data = {title: this.post.title};

            if (0 === data.title.length) {
                this.post.slug = this.post.defaultSlug;
                return;
            }

            API.slug().predicted(data)
                .then(response => this.post.slug = response.data.data)
                .catch(response => this.post.slug = 'Failed to get slug.');
        },

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
            const data = {
                body: this.post.body,
                excerpt: this.post.excerpt,
                publish_at: this.post.publishAt,
                title: this.post.title,
            };

            API.post().store(data)
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
                window.location.href = '/admin/posts';
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
                `The post\'s title ${response.data.title[0]}.` : null;

            this.errors.excerpt = 'undefined' !== typeof response.data.excerpt ?
                `The excerpt ${response.data.excerpt[0]}.` : null;

            this.errors.publishAt = 'undefined' !== typeof response.data.publish_at ?
                `The "Publish at" field ${response.data.publish_at[0]}.` : null;

            this.errors.body = 'undefined' !== typeof response.data.body ?
                `The body ${response.data.body[0]}.` : null;

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
            this.errors.body      = null;
            this.errors.excerpt   = null;
            this.errors.publishAt = null;
            this.errors.title     = null;
        },
    },
    mounted: function () {
        this.post.slug = this.post.defaultSlug;
        this.startEditor();
    }
};
