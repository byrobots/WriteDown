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
        editor: null,
        password: '',
        postBody: '',
        postExcerpt: '',
        postSlug: 'Add a title to generate the URL',
        postTitle: '',
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
                .catch(response => this.failedStore());
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
         */
        failedStore: function () {
            this.showSpinner   = false;
            this.showErrorIcon = true;

            // TODO: Populate error messages.

            setTimeout(() => {
                this.showErrorIcon = false;
                this.showForm      = true;
            }, 500);
        },
    },
    mounted: function () {
        this.editor = new SimpleMDE({
            element: document.getElementById('post-body'),
        });
    }
};
