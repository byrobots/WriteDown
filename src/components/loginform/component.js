/**
 * Components
 */
import erroricon from '../error-icon';
import spinner from '../spinner';
import successicon from '../success-icon';

/**
 * Classes
 */
import login from '../../library/login.js';

/**
 * The component's defintion
 */
export default {
    components: { erroricon, spinner, successicon },
    data: () => ({
        email: '',
        password: '',
        showErrorIcon: false,
        showForm: true,
        showSpinner: false,
        showSuccessIcon: false,
    }),
    methods: {
        /**
         * Submits data provided by the user to see if it's valid.
         */
        attemptLogin (event) {
            event.preventDefault();
            this.showForm    = false;
            this.showSpinner = true;

            const api = new login();
            api.make_request(this.email, this.password)
                .then((response) => {
                    // Login OK. Show the success icon briefly before sending
                    // the user on their way.
                    this.showSpinner     = false;
                    this.showSuccessIcon = true;
                }).catch((response) => {
                    // Bad login details. Show the error icon before providing
                    // the form for another attempt.
                    this.showSpinner   = false;
                    this.showErrorIcon = true;

                    setTimeout(() => {
                        this.showErrorIcon = false;
                        this.showForm      = true;
                    }, 500);
                });
        }
    }
};
