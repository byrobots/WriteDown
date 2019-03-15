/**
 * Views
 */
import LoginView from '../views/Login.vue';
import PostCreate from '../views/Posts/Create.vue';
import PostList from '../views/Posts/List.vue';

/**
 * Define routes.
 *
 * @var {Object}
 */
export default {
    '/admin/login': LoginView,

    /**
     * Routes for posts.
     */
    '/admin/posts/new': PostCreate,
    '/admin/posts': PostList,
};
