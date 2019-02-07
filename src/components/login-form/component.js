/**
 * Internal
 */
import API from '../../library/api';
import errorIcon from '../error-icon';
import spinner from '../spinner';
import successIcon from '../success-icon';

export default {
    components: {
        errorIcon,
        spinner,
        successIcon,
    },
    data: () => ({
        /**
         * The email entered in the form that identifies who the user is trying
         * to login as.
         *
         * @type {String}
         */
        email: '',

        /**
         * The password the user is trying to use to authenticate themselves.
         *
         * @type {String}
         */
        password: '',

        /**
         * Should the error icon be shown?
         *
         * @type {Boolean}
         */
        showErrorIcon: false,

        /**
         * Should the form be shown?
         *
         * @type {Boolean}
         */
        showForm: true,

        /**
         * Should the spinner be shown?
         *
         * @type {Boolean}
         */
        showSpinner: false,

        /**
         * Should the success icon be shown?
         *
         * @type {Boolean}
         */
        showSuccessIcon: false,
    }),
    methods: {
        /**
         * Submits the data provided by the user to see if it's valid.
         */
        attemptLogin (event) {
            event.preventDefault();

            // Toggle what the user sees - in this case, the form gets hidden
            // and the spinner icons gets show.
            this.showForm    = false;
            this.showSpinner = true;

            // Attempt the login.
            API.auth().login(this.email, this.password)
                .then(this.successfulLogin)
                .catch(this.failedLogin);
        },

        /**
         * Handles a successful login attempt.
         */
        successfulLogin () {
            // Hiden the spinner and show the success icon.
            this.showSpinner     = false;
            this.showSuccessIcon = true;

            // Program in a slight delay so the user actually gets a chance to
            // see the result before being re-directed.
            setTimeout(() => {
                window.location.href = '/admin/posts';
            }, 500);
        },

        /**
         * Handles a failed login attempt.
         */
        failedLogin () {
            // Hide the spinner and show the error icon.
            this.showSpinner   = false;
            this.showErrorIcon = true;

            // After a delay hide the error icon and re-show the form.
            setTimeout(() => {
                this.showErrorIcon = false;
                this.showForm      = true;
            }, 500);
        },
    }
};
