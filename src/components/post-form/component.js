/**
 * Components
 */
import errorIcon from '../error-icon';
import spinner from '../spinner';
import successIcon from '../success-icon';

/**
 * Classes
 */
import Login from '../../library/post.js';

/**
 * The component's defintion
 */
export default {
    components: { errorIcon, spinner, successIcon },
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
        attemptStore: function () {
            //
        }
    },
    mounted: function () {
        this.editor = new SimpleMDE({
            element: document.getElementById('post-body'),
        });
    }
};
