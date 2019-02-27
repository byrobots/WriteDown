/**
 * Views
 */
import LoginView from './views/Login.vue';
import PostCreate from './views/Posts/Create.vue';
import PostList from './views/Posts/List.vue';

/**
 * Define routes. Links a path to a view by way of `key: value` pairs.
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
