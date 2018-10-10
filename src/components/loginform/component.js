/**
 * Components
 */
import erroricon from '../error-icon';
import spinner from '../spinner';

/**
 * Classes
 */
import login from '../../library/login.js';

/**
 * The component's defintion
 */
export default {
    components: { erroricon, spinner },
    data: () => ({
        email: '',
        password: '',
        showErrorIcon: false,
        showForm: true,
        showSpinner: false,
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
            switch (api.make_request(this.email, this.password)) {
                case true:
                    break;

                default:
                    this.showSpinner   = false;
                    this.showErrorIcon = true;

                    setTimeout(() => {
                        this.showErrorIcon = false;
                        this.showForm      = true;
                    }, 500);
            }
        }
    }
};
