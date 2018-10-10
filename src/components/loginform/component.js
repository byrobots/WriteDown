/**
 * Components
 */
import spinner from '../spinner';

/**
 * Classes
 */
import login from '../../library/login.js';

/**
 * The component's defintion
 */
export default {
    components: { spinner },
    data: () => ({
        email: '',
        password: '',
        showSpinner: false,
    }),
    methods: {
        attemptLogin (event) {
            // Prevent the default submit action and show the spinner component
            event.preventDefault();
            this.showSpinner = true;

            const api = new login();
            switch (api.make_request(this.email, this.password)) {
                case true:
                    break;

                default:
            }
        }
    }
};
