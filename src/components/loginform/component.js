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
            showSpinner: false,
        };
    },
    methods: {
        attemptLogin (event) {
            // Prevent the default submit actions and show the spinner component
            event.preventDefault();
            this.showSpinner = true;

            // Create an instance of the login class and attempt the login
            const login        = new login;
            const login_result = login.make_request();

            // Act on the result
            switch (login_result) {
                case true:
                    break;

                default:
            }
        }
    }
};
