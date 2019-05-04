/**
 * Views
 */
import LoginView from '../views/login.vue'
import PostCreate from '../views/Posts/create.vue'
import PostEdit from '../views/Posts/edit.vue'
import PostList from '../views/Posts/list.vue'
import Tags from '../views/tags.vue'

/**
 * Define routes.
 *
 * @var {Object}
 */
export default {
  'admin/login': LoginView,

  /**
   * Routes for posts.
   */
  'admin/posts': PostList,
  'admin/posts/new': PostCreate,
  'admin/posts/:id/edit': PostEdit,

  /**
   * Routes for tags.
   */
  'admin/tags': Tags
}
