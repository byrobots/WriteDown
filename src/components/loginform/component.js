/**
 * Components
 */
import spinner from '../spinner';

/**
 * Classes
 */
import Do_Login from '../../classes/do-login.js';

export default {
    components: { spinner },
    data () {
        return {
            showSpinner: false,
        };
    },
    methods: {
        attemptLogin (event) {
            event.preventDefault();
            this.showSpinner = true;

            const login = new Do_Login;
            login.make_request();
        }
    },
};
