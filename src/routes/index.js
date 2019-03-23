/**
 * Views
 */
import LoginView from '../views/Login.vue'
import PostCreate from '../views/Posts/Create.vue'
import PostEdit from '../views/Posts/Edit.vue'
import PostList from '../views/Posts/List.vue'
import Tags from '../views/Tags.vue'

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
