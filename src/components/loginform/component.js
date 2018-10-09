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
    data () {
        return {
            email: '',
            password: '',
            showSpinner: false,
        };
    },
    methods: {
        attemptLogin (event) {
            // Prevent the default submit actions and show the spinner component
            event.preventDefault();
            this.showSpinner = true;

            // Create an instance of the login class and attempt the login
            const api = new login();
            switch (api.make_request(this.email, this.password)) {
                case true:
                    break;

                default:
            }
        }
    }
};
